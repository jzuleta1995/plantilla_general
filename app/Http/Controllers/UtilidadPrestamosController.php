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

        if($request->fecha_inicial !='' && $request->fecha_final !=''){
            $utilidad->whereBetween('view_utilidaprestamos.fecha_cobroprestamo',  array($request->fecha_inicial, $request->fecha_final));
        }
        $utilidad = $utilidad->paginate(15);

        //return view('aplicacion.prestamo.index', compact('prestamo'));
        return view('aplicacion.prestamo.informes.utilidad')->with('prestamos', $utilidad);


    }
}
