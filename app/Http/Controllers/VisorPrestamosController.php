<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class VisorPrestamosController extends Controller
{

    public function cargarVisor(Request $request){

        $prestamos = DB::table('clientes')
            ->join('prestamos', 'prestamos.cliente_id', '=', 'clientes.id')
            ->select('clientes.nombre', 'clientes.lugar_trabajo', 'prestamos.fecha_proximo_cobro', 'prestamos.prestamo_tasa', 'prestamos.valor_proximo_pago_deuda');

        $prestamos = $prestamos->paginate(30);

        return view('/home')->with('prestamos', $prestamos);
    }
}
