<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function cargarVisor(Request $request){

        //dd("hola");
        $prestamos = DB::table('clientes')
            ->join('prestamos', 'prestamos.cliente_id', '=', 'clientes.id')
            ->select('clientes.nombre', 'clientes.lugar_trabajo', 'prestamos.fecha_proximo_cobro', 'prestamos.tasa', 'prestamos.valor_proximo_pago_deuda');

            if($request->cliente_id !=''){
                $prestamos->where('clientes.id', '=', $request->cliente_id);
            }
            if($request->cobrador_id !=''){
                $prestamos->where('clientes.cobrador_id', '=', $request->cobrador_id);
            }
            if($request->lugar_trabajo !=''){
                $prestamos->where('clientes.lugar_trabajo', 'like', '%'.$request->lugar_trabajo.'%');
            }
            if($request->tasa !=''){
                $prestamos->where('prestamos.tasa', '=', $request->tasa);
            }
            if($request->fecha_inicial !='' && $request->fecha_final !=''){
                $prestamos->whereBetween('prestamos.fecha_proximo_cobro',  array($request->fecha_inicial, $request->fecha_final));
           }


        //dd($prestamos);
        $prestamos = $prestamos->paginate(15);

        //return view('aplicacion.prestamo.index', compact('prestamo'));

        return view('/home')->with('prestamos', $prestamos);


    }
}
