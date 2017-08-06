<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Pagination\Paginator;

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
        $query = 'select fc_color(1) ';
      $colors =DB::select($query);

      return view('home')->with('colors', $colors);
  }

    public function cargarVisor(Request $request){

        $prestamos = DB::table('clientes')
            ->join('prestamos', 'prestamos.cliente_id', '=', 'clientes.id')
            ->selectRaw('clientes.cliente_nombre_completo, clientes.cliente_lugar_trabajo, prestamos.prestamo_fecha_proximo_cobro,prestamos.prestamo_tasa,prestamos.prestamo_valor_proxima_cuota, prestamos.id, fc_estado_del_prestamo(prestamos.id) as color');
        $prestamos->where('prestamo_estado', '=', 'ACTIVO');

        if($request->cliente_id !=''){
            $prestamos->where('clientes.id', '=', $request->cliente_id);
        }
        if($request->cobrador_id !=''){
            $prestamos->where('clientes.cobrador_id', '=', $request->cobrador_id);
        }
        if($request->lugar_trabajo !=''){
            $prestamos->where('clientes.cliente_lugar_trabajo', 'like', '%'.$request->lugar_trabajo.'%');
        }
        if($request->tasa !=''){
            $prestamos->where('prestamos.prestamo_tasa', '=', $request->tasa);
        }
        if($request->fecha_inicial !='' && $request->fecha_final !=''){
            $prestamos->whereBetween('prestamos.prestamo_fecha_proximo_cobro',  array($request->fecha_inicial, $request->fecha_final));
        }


        //dd($prestamos);
        $prestamos = $prestamos->paginate(2);

        //return view('aplicacion.prestamo.index', compact('prestamo'));

        return view('/home')->with('prestamos', $prestamos);


    }



}
