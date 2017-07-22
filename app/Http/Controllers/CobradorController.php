<?php

namespace App\Http\Controllers;

use App\Cobrador;
use App\Http\Requests\CobradorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CobradorController extends Controller
{
    public function index(Request $request)
    {
      $cobradors = Cobrador::nombre($request->get('nombre'))
                   ->orderBy('id', 'ASC')
                   ->paginate(3);

        return view('aplicacion.cobrador.index')->with('cobradors', $cobradors);
    }

    public function create()
    {
        $cobrador = "";

        return view('aplicacion.cobrador.create', compact('cobrador'));
    }

    public function store(CobradorRequest $request)
    {
        $cobrador = new Cobrador();
        $cobrador->cobrador_nombre          = trim(strtoupper($request->cobrador_nombre));
        $cobrador->cobrador_apellido        = trim(strtoupper($request->cobrador_apellido));
        $cobrador->cobrador_nombre_completo = trim(strtoupper($request->cobrador_nombre . " " . $request->cobrador_apellido));
        $cobrador->cobrador_documento       = $request->cobrador_documento;
        $cobrador->cobrador_direccion       = trim(strtoupper($request->cobrador_direccion));
        $cobrador->cobrador_telefono        = $request->cobrador_telefono;
        $cobrador->cobrador_celular         = $request->cobrador_celular;
        $cobrador->cobrador_ciudad          = $request->cobrador_ciudad;
        $cobrador->cobrador_estado          = $request->cobrador_estado;
        $cobrador->user_id                  = Auth::id();
        $cobrador->save();

        return Redirect()->route('cobrador.index')
               ->with('info', 'El cobrador ' . $cobrador->cobrador_nombre_completo . ' ha sido registrado exitosamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cobrador = Cobrador::find($id);

        return view('aplicacion.cobrador.edit', compact('cobrador'));
    }


    public function update(CobradorRequest $request, $id)
    {
        $cobrador                           = Cobrador::find($id);
        $cobrador->cobrador_nombre          = trim(strtoupper($request->cobrador_nombre));
        $cobrador->cobrador_apellido        = trim(strtoupper($request->cobrador_apellido));
        $cobrador->cobrador_nombre_completo = trim(strtoupper($request->cobrador_nombre . " " . $request->cobrador_apellido));
        $cobrador->cobrador_documento       = $request->cobrador_documento;
        $cobrador->cobrador_direccion       = trim(strtoupper($request->cobrador_direccion));
        $cobrador->cobrador_telefono        = $request->cobrador_telefono;
        $cobrador->cobrador_celular         = $request->cobrador_celular;
        $cobrador->cobrador_ciudad          = $request->cobrador_ciudad;
        $cobrador->cobrador_estado          = $request->cobrador_estado;
        $cobrador->user_id = Auth::id();
        $cobrador->save();

        return Redirect()->route('cobrador.index')
               ->with('info', 'El cobrador ' . $cobrador->cobrador_nombre_completo . ' ha sido actualizado exitosamente');
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $cobrador = Cobrador::find($id);
            $cobrador->delete();
            $cobradores_total = Cobrador::all()->count();

            return response()->json([
                'total'   => $cobradores_total,
                'message' => $cobrador->nombre .' fue eliminado correctamente'
            ]);
        }
    }
}
