<?php

namespace App\Http\Controllers;

use App\CobroPrestamo;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CobroPrestamoController extends Controller
{
    public function index()
    {
        $cobros = CobroPrestamo::orderBy('id', 'ASC')->paginate(3);

        return view('aplicacion.cobroPrestamo.index')->with('cobros', $cobros);
    }

    public function create()
    {
        $cliente = "";
        return view('aplicacion.cobroPrestamo.create', compact('cobroPrestamo', 'cliente'));
    }

    public function store(Request $request)
    {
        $cobros = new CobroPrestamo($request->all());
        $cobros->user_id = Auth::id();


        $cobros->save();
        return Redirect()->route('cobroPrestamo.index')
            ->with('info', 'Cobrador registrado exitosamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cobros = CobroPrestamo::find($id);
        $cliente = Cliente::find($cobros->cliente_id);
        return view('aplicacion.cobroPrestamo.edit', compact('cobros', 'cliente'));
    }


    public function update(Request $request, $id)
    {
        $cobros = CobroPrestamo::find($id);

        // dd($cobros);

        //$cobros->cliente            = $request->cliente_id;
        $cobros->cliente_id         = $request->cliente_id;

        $cobros->prestamo_id           = $request->prestamo_id;
        $cobros->valor_pagar        = $request->valor_pagar;
        $cobros->valor_real_pagar   = $request->valor_real_pagar;
        $cobros->observacion        = $request->observacion;
        $cobros->user_id            = Auth::id();

        $cobros->save();

        return Redirect()->route('cobroPrestamo.index')
            ->with('info', 'Cobro Actualizado exitosamente');
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $cobros =CobroPrestamo::find($id);
            $cobros->delete();
            $cobros_total = CobroPrestamo::all()->count();

            return response()->json([
                'total'   => $cobros_total,
                'message' => $cobros->nombre .' fue eliminado correctamente'

            ]);
        }
    }
}
