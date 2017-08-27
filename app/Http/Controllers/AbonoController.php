<?php

namespace App\Http\Controllers;

use App\Abono;
use App\Cliente;
use App\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbonoController extends Controller
{
    public function index()
    {
        //
    }

    public function create($prestamo_id)
    {
        $prestamo = Prestamo::find($prestamo_id);
        $cliente  = $prestamo->cliente;

        return view('aplicacion.abono.create', compact('abono', 'cliente'))
            ->with('cliente', $cliente)
            ->with('prestamo', $prestamo);
    }

    public function store(Request $request)
    {
        $abono = new Abono();
        $abono->prestamo_id         = $request->prestamo_id;
        $abono->cliente_id          = $request->cliente_id;
        $abono->abono_valor_cuota   = $request->abono_valor_cuota;
        $abono->abono_valor         = $request->abono_valor;
        $abono->abono_fecha         = $request->abono_fecha;
        $abono->abono_tipo_pago     = $request->abono_tipo_pago;
        $abono->abono_estado        = $request->abono_estado;
        $abono->abono_observacion   = trim(strtoupper($request->abono_observacion));
        $abono->user_id             = Auth::id();
        $abono->save();

        return Redirect()->route('prestamo.show', $request->prestamo_id)
            ->with('info', 'Pago realizado exitosamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, $id)
    {
        //
    }

    /*
        * View data
        */
    public function view(Request $request, $id)
    {
        if($request->ajax()){
            $info = Abono::find($id);
            return response()->json($info);
        }
    }
    /*
    *   Update data
    */
    public function updateAnulaAbono(Request $request, $id)
    {
        //dd($request -> input('observacion_abono'));
        $data = Abono::find($id);
        $data -> abono_observacion = $request -> input('observacion_abono');
        $data -> abono_estado      = 'INACTIVO';

        $data -> save();
        //return response()->json($data);

        return back()
            ->with('success','Abono Anulado.');
    }
}
