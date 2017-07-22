<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cobrador;
use App\Http\Requests\ClienteRequest;
use App\Fiador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ClienteController extends Controller
{

    public function index(Request $request)
    {
        $clientes = Cliente::nombre($request->get('nombre'))
                    ->orderBy('id', 'ASC')
                    ->paginate(3);

        return view('aplicacion.cliente.index')->with('clientes', $clientes);
    }

    public function create()
    {
        $aplica_fiador = false;
        $cobrador ="";

        return view('aplicacion.cliente.create', compact('cliente' , 'cobrador'))
                    ->with('aplica_fiador', $aplica_fiador);
    }

    public function store(ClienteRequest $request)
    {

        $cliente = new Cliente();
        $cliente->cliente_nombre            = trim(strtoupper($request->cliente_nombre));
        $cliente->cliente_apellido          = trim(strtoupper($request->cliente_apellido));
        $cliente->cliente_nombre_completo   = trim(strtoupper($request->cliente_nombre . " " . $request->cliente_apellido));
        $cliente->cliente_documento         = $request->cliente_documento;
        $cliente->cliente_direccion_casa    = trim(strtoupper($request->cliente_direccion_casa));
        $cliente->cliente_direccion_trabajo = trim(strtoupper($request->cliente_direccion_trabajo));
        $cliente->cliente_lugar_trabajo     = trim(strtoupper($request->cliente_lugar_trabajo));
        $cliente->cliente_telefono          = $request->cliente_telefono;
        $cliente->cliente_celular           = $request->cliente_celular;
        $cliente->cobrador_id               = $request->cobrador_id;
        $cliente->cliente_ciudad            = $request->cliente_ciudad;
        $cliente->cliente_estado            = $request->cliente_estado;
        $cliente->user_id                   = Auth::id();
        $cliente->save();

        if ($request->aplica_fiador == "on" && $request->fiador1_nombre && $request->fiador1_apellido
            && $request->fiador1_documento && $request->fiador1_direccion_casa && $request->fiador1_telefono){

            $this->storeFiador(1, $cliente->id, $request->fiador1_nombre, $request->fiador1_apellido,
                                     $request->fiador1_documento, $request->fiador1_direccion_casa,
                                     $request->fiador1_direccion_trabajo, $request->fiador1_telefono);

        }

        if ($request->aplica_fiador == "on" && $request->fiador2_nombre && $request->fiador2_apellido
            && $request->fiador2_documento && $request->fiador2_direccion_casa && $request->fiador2_telefono){

            $this->storeFiador(2, $cliente->id, $request->fiador2_nombre, $request->fiador2_apellido,
                                    $request->fiador2_documento, $request->fiador2_direccion_casa,
                                    $request->fiador2_direccion_trabajo, $request->fiador2_telefono);
        }

       return Redirect()->route('cliente.index')
            ->with('info', 'El cliente ' . $cliente->cliente_nombre_completo . ' ha sido registrado exitosamente');
    }

    public function storeFiador($id, $cliente_id, $fiador_nombre, $fiador_apellido, $fiador_documento, $fiador_direccion_casa,
                                $fiador_direccion_trabajo  ,$fiador_telefono){

        $fiador = new Fiador();
        $fiador->id                       = $id;
        $fiador->cliente_id               = $cliente_id;
        $fiador->fiador_nombre            = trim(strtoupper($fiador_nombre));
        $fiador->fiador_apellido          = trim(strtoupper($fiador_apellido));
        $fiador->fiador_nombre_completo   = trim(strtoupper($fiador_nombre . " " . $fiador_apellido));
        $fiador->fiador_documento         = $fiador_documento;
        $fiador->fiador_direccion_casa    = trim(strtoupper($fiador_direccion_casa));
        $fiador->fiador_direccion_trabajo = trim(strtoupper($fiador_direccion_trabajo));
        $fiador->fiador_telefono          = $fiador_telefono;
        $fiador->save();
    }

    public function updateFiador($id, $cliente_id, $fiador_nombre, $fiador_apellido, $fiador_documento, $fiador_direccion_casa,
                                $fiador_direccion_trabajo  ,$fiador_telefono){

        $fiador = Fiador::where('id', $id)
                  ->where('cliente_id', $cliente_id)
                  ->get();

        if (!$fiador->isEmpty()){

            $fiador[0]->fiador_nombre            = trim(strtoupper($fiador_nombre));
            $fiador[0]->fiador_apellido          = trim(strtoupper($fiador_apellido));
            $fiador[0]->fiador_nombre_completo   = trim(strtoupper($fiador_nombre . " " . $fiador_apellido));
            $fiador[0]->fiador_documento         = $fiador_documento;
            $fiador[0]->fiador_direccion_casa    = trim(strtoupper($fiador_direccion_casa));
            $fiador[0]->fiador_direccion_trabajo = trim(strtoupper($fiador_direccion_trabajo));
            $fiador[0]->fiador_telefono          = $fiador_telefono;
            $fiador[0]->save();

        }else{
            $this->storeFiador($id, $cliente_id, $fiador_nombre, $fiador_apellido, $fiador_documento, $fiador_direccion_casa,
                $fiador_direccion_trabajo  ,$fiador_telefono);

        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $cobrador =  $cliente->cobrador;

        $fiadors = $cliente->fiadors;

        $aplica_fiador = true;

        if ($fiadors->isEmpty()){
            $aplica_fiador = false;
        }

        $fiador1 =  Fiador::where('id', 1)
                    ->where('cliente_id', $cliente->id)
                    ->get();

        $fiador2 = Fiador::where('id', 2)
                   ->where('cliente_id', $cliente->id)
                    ->get();

        return view('aplicacion.cliente.edit', compact('cliente', 'cobrador', 'fiadors'))
                    ->with('aplica_fiador', $aplica_fiador)
                    ->with('fiador1', $fiador1)
                    ->with('fiador2', $fiador2);
    }

    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);

        $cliente->cliente_nombre                = trim(strtoupper($request->cliente_nombre));
        $cliente->cliente_apellido              = trim(strtoupper($request->cliente_apellido));
        $cliente->cliente_nombre_completo       = trim(strtoupper($request->cliente_nombre . " " . $request->cliente_apellido));
        $cliente->cliente_documento             = $request->cliente_documento;
        $cliente->cliente_direccion_casa        = trim(strtoupper($request->cliente_direccion_casa));
        $cliente->cliente_direccion_trabajo     = trim(strtoupper($request->cliente_direccion_trabajo));
        $cliente->cliente_telefono              = $request->cliente_telefono;
        $cliente->cliente_celular               = $request->cliente_celular;
        $cliente->cobrador_id                   = $request->cobrador_id;
        $cliente->cliente_ciudad                = $request->cliente_ciudad;
        $cliente->cliente_estado                = $request->cliente_estado;
        $cliente->user_id                       = Auth::id();
        $cliente->save();

        if ($request->aplica_fiador == "on" && $request->fiador1_nombre && $request->fiador1_apellido && $request->fiador1_documento
            && $request->fiador1_direccion_casa && $request->fiador1_telefono){

            $this->updateFiador(1, $cliente->id, $request->fiador1_nombre, $request->fiador1_apellido,
                $request->fiador1_documento, $request->fiador1_direccion_casa,
                $request->fiador1_direccion_trabajo, $request->fiador1_telefono);

        }

        if ($request->aplica_fiador == "on" && $request->fiador2_nombre && $request->fiador2_apellido && $request->fiador2_documento
            && $request->fiador2_direccion_casa && $request->fiador2_telefono){

            $this->UpdateFiador(2, $cliente->id, $request->fiador2_nombre, $request->fiador2_apellido,
                $request->fiador2_documento, $request->fiador2_direccion_casa,
                $request->fiador2_direccion_trabajo, $request->fiador2_telefono);
        }

        return Redirect()->route('cliente.index')
            ->with('info', 'El cliente ' . $cliente->cliente_nombre_completo . ' ha sido actualizado exitosamente');

    }

    public function destroy($id)
    {
        //
    }


}
