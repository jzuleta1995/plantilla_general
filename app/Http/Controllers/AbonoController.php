<?php

namespace App\Http\Controllers;

use App\Abono;
use App\Cliente;
use App\Http\Requests\AbonoRequest;
use App\Prestamo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;

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
        $abono->abono_item                  = $cod_abono;
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

            $info = DB::table('abonos')
                ->select(DB::raw('id, abono_item, prestamo_id, abono_valor_cuota'))
                ->where('prestamo_id', '=', $request->prestamo_id)
                ->where('id', '=', $id)
                ->where('abono_item', '=', $request->abono_item)->first();


            //$info = Abono::find($id);
            return response()->json($info);
        }
    }

    /*
    *   Update data
    */
    public function updateAnulaAbono(Request $request, $id)
    {

        $usuarios = User::find(Auth::id());
        $clave_encriptada = $usuarios->password;
        $clave_sin_encriptadar = $request->input('password');


        if ($request->ajax()) {

            if ($request->input('observacion_abono') == '') {
                return response()
                    ->json(["message" => "Debe Ingresar Una Observacion!!"],
                        500);
            }

            if (Hash::check($clave_sin_encriptadar, $clave_encriptada)) {
                //$data = Abono::find($id);
                //$data = Abono::where('id', '=', $id)
                //->where('prestamo_id', '=', $request->prestamo_id)->first();

                $data = Abono::where('id', '=', $id)
                    ->where('abono_item', '=', $request->abono_item)
                    ->where('prestamo_id', '=', $request->prestamo_id)->first();


                //dd($data);

                $data->abono_observacion = $request->input('observacion_abono');
                $data->abono_estado = 'INACTIVO';
                $data->user_anulacion = Auth::id();
                $data->abono_fecha_anulacion = date("Y-m-d");

                $data->save();

                return response()
                    ->json(["message" => "El Abono ha sido anulado exitosamente!!"],
                        200);
            } else {
                return response()
                    ->json(["message" => "La Contrasena es incorrecta por favor intente de nuevo!!"],
                        500);
            }
        }
    }
}
