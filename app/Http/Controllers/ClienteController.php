<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\ItemClientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'ASC')->paginate(3);

        return view('aplicacion.cliente.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aplicacion.cliente.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return "Grabo exitosamente";
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Cliente::find($id);
        return view('aplicacion.cliente.edit', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);

        $users->nombre             = $request->nombre;
        $users->apellido           = $request->apellido;
        $users->documento          = $request->documento;
        $users->direccion          = $request->direccion;
        $users->telefono           = $request->telefono;
        $users->correo             = $request->correo;
        $users->pregunta_id        = $request->pregunta_id;
        $users->respuesta_secreta  = $request->respuesta_secreta;
        $users->estado             = $request->estado;

        $users->save();
        return "Usuario exitosamente";


        /* return Redirect()->route('profesors.index')
             ->with('info', 'El profesor fue actualizado');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
