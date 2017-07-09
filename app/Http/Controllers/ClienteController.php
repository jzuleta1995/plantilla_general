<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteRequest;
use App\ItemClientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ClienteController extends Controller
{

    public function index(Request $request)
    {
        $clientes = Cliente::nombre($request->get('nombre'))->orderBy('id', 'ASC')->paginate(3);

        return view('aplicacion.cliente.index')->with('clientes', $clientes);
    }

    public function create()
    {
        $cobrador ="";
        return view('aplicacion.cliente.create', compact('clientes' , 'cobrador'));
    }

    public function store(ClienteRequest $request)
    {

        $clientes = new Cliente($request->all());

        $clientes->user_id = Auth::id();
        $clientes->save();

        if ($request->nombre_fiador1 !=''){
            $this->storeItemCliente(1, $clientes->id, $request->nombre_fiador1, $request->apellido_fiador1,
                                     $request->documento_fiador1, $request->direccion_casa_fiador1,
                                     $request->direccion_trabajo_fiador1, $request->telefono_fiador1);
        }

        if ($request->nombre_fiador2 !=''){
            $this->storeItemCliente(2, $clientes->id, $request->nombre_fiador2, $request->apellido_fiador2,
                                    $request->documento_fiador2, $request->direccion_casa_fiador2,
                                    $request->direccion_trabajo_fiador2, $request->telefono_fiador2);
        }

        return Redirect()->route('cliente.index')
            ->with('info', 'Cliente registrado  exitosamente');
    }

    public function storeItemCliente($id, $cliente_id, $nombre_fiador, $apellido_fiador, $documento_fiador, $direccion_casa_fiador, $direccion_trabajo_fiador  ,$telefono_fiador){

        $itemcliente = new ItemClientes;
        $itemcliente->id                       = $id;
        $itemcliente->cliente_id               = $cliente_id;
        $itemcliente->nombre_fiador            = $nombre_fiador;
        $itemcliente->apellido_fiador          = $apellido_fiador;
        $itemcliente->documento_fiador         = $documento_fiador;
        $itemcliente->direccion_casa_fiador    = $direccion_casa_fiador;
        $itemcliente->direccion_trabajo_fiador = $direccion_trabajo_fiador;
        $itemcliente->telefono_fiador          = $telefono_fiador;
        $itemcliente->save();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $clientes = Cliente::find($id);
        return view('aplicacion.cliente.edit', compact('clientes'));
    }

    public function update(ClienteRequest $request, $id)
    {
        $clientes = Cliente::find($id);

        // dd($users);

        $clientes->nombre                = $request->nombre;
        $clientes->apellido              = $request->apellido;
        $clientes->documento             = $request->documento;
        $clientes->direccion_casa        = $request->direccion_casa;
        $clientes->direccion_trabajo     = $request->direccion_trabajo;
        $clientes->telefono              = $request->telefono;
        $clientes->celular               = $request->celular;
        $clientes->estado                = $request->estado;

        $clientes->user_id               = Auth::id();
        $clientes->save();

        return Redirect()->route('cliente.index')
            ->with('info', 'Cliente Actualizado  exitosamente');

    }

    public function destroy($id)
    {
        //
    }

    public function general(Request $request)
    {
        return view('aplicacion.cliente.informes.general', compact('clientes'));

    }
}
