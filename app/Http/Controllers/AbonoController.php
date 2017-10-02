<?php

namespace App\Http\Controllers;

use App\Abono;
use App\Cliente;
use App\Http\Requests\AbonoRequest;
use App\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
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

    public function store(AbonoRequest $request)
    {
       $codigoAbonos = DB::table('abonos')
            ->select(DB::raw('count(*) as item'))
            ->where('prestamo_id', '=', $request->prestamo_id)
            ->first();

        if( $codigoAbonos == ''){
            $cod_abono = 1;
        }else{
            $cod_abono = $codigoAbonos ->item + 1;
        }

        $abono = new Abono();
        $abono->id                  = $cod_abono;
        $abono->prestamo_id         = $request->prestamo_id;
        $abono->cliente_id          = $request->cliente_id;
        $abono->abono_valor_cuota   = str_replace(',','',str_replace('.','',$request->abono_valor_cuota));
        $abono->abono_valor         = str_replace(',','',str_replace('.','',$request->abono_valor));
        $abono->abono_fecha         = $request->abono_fecha;
        $abono->abono_tipo_pago     = $request->abono_tipo_pago;
        $abono->abono_estado        = $request->abono_estado;
        $abono->abono_observacion   = trim(strtoupper($request->abono_observacion));
        $abono->user_id             = Auth::id();
        $abono->abono_fechacreacion = date("Y-m-d");

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

        if ($request->input('observacion_abono') == '') {
            return response()->view('errors.500', [], 500);

        } else {
            // dd("id".$id);
            $data = Abono::find($id);
            $data->abono_observacion = $request->input('observacion_abono');
            $data->abono_estado = 'INACTIVO';
            $data->user_anulacion           = Auth::id();
            $data->abono_fecha_anulacion    = date("Y-m-d");

            $data->save();
            //return response()->json($data);

            return back()
                ->with('success', 'Prestamo Anulado.');
        }
    }
}
