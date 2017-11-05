<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\FechaController;

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
        $colors = DB::select($query);

        return view('home')->with('colors', $colors);
    }

    public function cargarVisor(Request $request){

        $prestamos = DB::table('clientes')
            ->join('prestamos', 'prestamos.cliente_id', '=', 'clientes.id')
            ->selectRaw('clientes.cliente_nombre_completo, clientes.cliente_lugar_trabajo, prestamos.prestamo_fecha_proximo_cobro,
                          prestamos.prestamo_tasa,prestamos.prestamo_utilidad_mes, prestamos.id,prestamos.prestamo_valor,
                          fc_calcula_utilidad_mes(prestamos.id),fc_estado_del_prestamo(prestamos.id) as color')
            ->where('prestamo_estado', '=', 'ACTIVO')
            ->orderBy('prestamos.created_at', 'desc');


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

        /* consulta de valor total en rango de fechas*/
        $utilidad_total = DB::table('utilidad_total_prestamo_mes')
            ->selectRaw('sum(utilidad_total_prestamo_mes.utilidad_valor_prestamo) as valor_total');
        /* fin consulta*/


        $fecha = new FechaController();

        if($request->fecha_inicial !='' && $request->fecha_final !=''){
            if($request->fecha_inicial > $request->fecha_final){
                $prestamos = "";
                return Redirect()->route('home')->with('info', 'La Fecha inicial no puede ser mayor a la Fecha final!!')
                                    ->with('prestamos', $prestamos);
            }
            /* se calculan estas fechas para traer el valor estimado total de la utilidad*/
            $fecha_inicial_ingresada = $fecha->fechaPrimerDiaMesIngresado($request->fecha_inicial);
            $fecha_final_ingresada = $fecha->fechaUltimoDiaMesIngresado($request->fecha_final);

            $prestamos->whereBetween('prestamos.prestamo_fecha_proximo_cobro',  array($request->fecha_inicial, $request->fecha_final));
            $utilidad_total->whereBetween('utilidad_total_prestamo_mes.utilidad_fecha_mes',  array($fecha_inicial_ingresada, $fecha_final_ingresada));

        }else{
           $fecha_inicial = $fecha->fechaPrimerDiaMesActual();
            $fecha_final  = $fecha->fechaUltimoDiaMesActual();

            $prestamos->whereBetween('prestamos.prestamo_fecha_proximo_cobro',  array($fecha_inicial, $fecha_final));
            $utilidad_total->whereBetween('utilidad_total_prestamo_mes.utilidad_fecha_mes',   array($fecha_inicial, $fecha_final));

        }

        $prestamos      = $prestamos->paginate(60);
        $utilidad_total = $utilidad_total->get();



        return view('/home')->with('prestamos', $prestamos)
                                 ->with('utilidad_total', $utilidad_total);
    }


}
