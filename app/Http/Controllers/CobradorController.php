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
        $cobradors = Cobrador::nombre($request->get('nombre'))->orderBy('id', 'ASC')->paginate(3);

        return view('aplicacion.cobrador.index')->with('cobradors', $cobradors);
    }

    public function create()
    {
        return view('aplicacion.cobrador.create', compact('cobrador'));
    }

    public function store(CobradorRequest $request)
    {
        $cobradors = new Cobrador($request->all());
        $cobradors->user_id = Auth::id();


        $cobradors->save();
        return Redirect()->route('cobrador.index')
            ->with('info', 'Cobrador registrado exitosamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cobradors = Cobrador::find($id);
        return view('aplicacion.cobrador.edit', compact('cobradors'));
    }


    public function update(CobradorRequest $request, $id)
    {
        $cobradors = Cobrador::find($id);

        // dd($users);

        $cobradors->nombre      = $request->nombre;
        $cobradors->apellido    = $request->apellido;
        $cobradors->documento   = $request->documento;
        $cobradors->direccion   = $request->direccion;
        $cobradors->telefono    = $request->telefono;
        $cobradors->celular     = $request->celular;
        $cobradors->ciudad      = $request->ciudad;
        $cobradors->estado      = $request->estado;
        $cobradors->user_id     = Auth::id();

        $cobradors->save();

        return Redirect()->route('cobrador.index')
             ->with('info', 'Cobrador Actualizado exitosamente');
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $cobradors =Cobrador::find($id);
            $cobradors->delete();
            $cobradors_total = Cobrador::all()->count();

            return response()->json([
                'total'   => $cobradors_total,
                'message' => $cobradors->nombre .' fue eliminado correctamente'

            ]);
        }
    }
}
