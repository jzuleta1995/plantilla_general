<?php

namespace App\Http\Controllers;

use App\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PrestamoController extends Controller
{
    public function index()
    {
        //$prestamos = Prestamo::orderBy('id', 'ASC')->paginate(3);
        $prestamos = DB::table('prestamos')
                    ->join('clientes', 'prestamos.cliente_id', '=', 'clientes.id')
                    ->select('prestamos.id', 'clientes.nombre', 'prestamos.tasa', 'prestamos.valor_prestamo');
                   // ->where('prestamos.id', '=', 1);

        //$prestamos->;
        $prestamos = $prestamos->paginate(2);
        
        //return view('aplicacion.prestamo.index', compact('prestamo'));

        return view('aplicacion.prestamo.index')->with('prestamos', $prestamos);
    }

    public function create()
    {
        return view('aplicacion.prestamo.create', compact('prestamo'));
    }

    public function store(Request $request)
    {
       // dd($request->all());
        $prestamos = new Prestamo($request->all());
        $prestamos->user_id = Auth::id();


        $prestamos->save();
        return Redirect()->route('prestamo.index')
            ->with('info', 'Cobrador registrado exitosamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $prestamos = Prestamo::find($id);
        return view('aplicacion.prestamo.edit', compact('prestamos'));
    }


    public function update(Request $request, $id)
    {
        $prestamos = Prestamo::find($id);

        // dd($users);

        $prestamos->cliente_id                = $request->cliente_id;
        $prestamos->valor_prestamo            = $request->valor_prestamo;
        $prestamos->tasa                      = $request->tasa;
        $prestamos->tipo_prestamo             = $request->tipo_prestamo;
        $prestamos->tiempo_cobro              = $request->tiempo_cobro;
        $prestamos->cantidad_cuotas_pagar     = $request->cantidad_cuotas_pagar;
        $prestamos->valor_cuota_pagar         = $request->valor_cuota_pagar;
        $prestamos->fecha_prestamo            = $request->fecha_prestamo;
        $prestamos->fecha_inicio_prestamo     = $request->fecha_inicio_prestamo;
        $prestamos->fecha_proximo_cobro       = $request->fecha_proximo_cobro;
        $prestamos->valor_total_deuda         = $request->valor_total_deuda;
        $prestamos->valor_abono_deuda         = $request->valor_abono_deuda;
        $prestamos->valor_proximo_pago_deuda  = $request->valor_proximo_pago_deuda;
        $prestamos->estado                    = $request->estado;
        $prestamos->user_id                   = Auth::id();


        $prestamos->save();

        return Redirect()->route('prestamo.index')
            ->with('info', 'Cobrador Actualizado exitosamente');
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $prestamos =Prestamo::find($id);
            $prestamos->delete();
            $prestamos_total = Prestamo::all()->count();

            return response()->json([
                'total'   => $prestamos_total,
                'message' => $prestamos->nombre .' fue eliminado correctamente'

            ]);
        }
    }
}
