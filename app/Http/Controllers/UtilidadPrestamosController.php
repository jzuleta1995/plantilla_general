<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UtilidadPrestamosController extends Controller
{

    public function index(){

    }

    public function cargarUtilidad(Request $request){

        $utilidad = DB::table('view_utilidaprestamos')
            ->select('cobrador', 'cliente', 'valor_real_pagado', 'valor_pagado_a_capital', 'valor_pagado_a_interes','fecha_cobroprestamo', 'valor_total_pagado', 'valor_total_capital', 'valor_total_interes', 'tasa');

        if($request->cobrador_id !=''){
            $utilidad->where('view_utilidaprestamos.cobrador_id', '=', $request->cobrador_id);
        }


        /* consulta de valor total en rango de fechas*/
        $utilidad_total = DB::table('utilidad_total_prestamo_mes')
            ->selectRaw('sum(utilidad_total_prestamo_mes.utilidad_valor_prestamo) as valor_total');
        /* fin consulta*/

        $fecha = new FechaController();

        if($request->fecha_inicial !='' && $request->fecha_final !=''){

            if($request->fecha_inicial > $request->fecha_final){
                $utilidad = "";
                return Redirect()->route('prestamo.utilidad')->with('info', 'La Fecha inicial no puede ser mayor a la Fecha final!!')
                    ->with('prestamos', $utilidad);
            }
            /* se calculan estas fechas para traer el valor estimado total de la utilidad*/
            $fecha_inicial_ingresada = $fecha->fechaPrimerDiaMesIngresado($request->fecha_inicial);
            $fecha_final_ingresada = $fecha->fechaUltimoDiaMesIngresado($request->fecha_final);


            $utilidad->whereBetween('view_utilidaprestamos.fecha_cobroprestamo',  array($request->fecha_inicial, $request->fecha_final));
            $utilidad_total->whereBetween('utilidad_total_prestamo_mes.utilidad_fecha_mes',  array($fecha_inicial_ingresada, $fecha_final_ingresada));

        }else{
            $fecha_inicial = $fecha->fechaPrimerDiaMesActual();
            $fecha_final = $fecha->fechaUltimoDiaMesActual();

            $utilidad->whereBetween('view_utilidaprestamos.fecha_cobroprestamo',  array($fecha_inicial, $fecha_final));
            $utilidad_total->whereBetween('utilidad_total_prestamo_mes.utilidad_fecha_mes',   array($fecha_inicial, $fecha_final));

        }
        $utilidad = $utilidad->paginate(50);
        $utilidad_total = $utilidad_total->get();


        //return view('aplicacion.prestamo.index', compact('prestamo'));
        return view('aplicacion.prestamo.informes.utilidad')->with('prestamos', $utilidad)
                                                                  ->with('utilidad_total', $utilidad_total);
     }
}
