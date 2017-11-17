<?php

namespace App\Http\Controllers;

use App\Abono;
use App\Http\Requests\PrestamoRequest;
use App\Prestamo;
use App\Cliente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class PrestamoController extends Controller
{
    public function index(Request $request)
    { 
            $prestamos = Prestamo::nombre($request->get('nombre'))
                    ->select('prestamos.id', 'prestamos.prestamo_nombrecliente', 'prestamos.prestamo_tasa', 'prestamos.prestamo_valor')
                    ->where('prestamo_estado', '=', 'ACTIVO')
                    ->orderBy('id', 'DESC')
                    ->paginate(30);
                 //dd($prestamos);

        //$prestamos = $prestamos->paginate(30);

        return view('aplicacion.prestamo.index')->with('prestamos', $prestamos);
    }

    public function create()
    {
        $cliente = "";

        return view('aplicacion.prestamo.create', compact('prestamo'))
                    ->with('cliente', $cliente);
    }

    public function store(PrestamoRequest $request)
    {
        if($request->prestamo_valor == 0 || $request->prestamo_tasa == 0 || $request->prestamo_valor_cuota == 0){
            return Redirect()->route('prestamo.create')
                ->with('info', 'No Debe Ingresar Valores En Cero');
        }

        $cliente = Cliente::find($request->cliente_id);
        $prestamo = new Prestamo($request->all());

        $prestamo->cliente_id                    = $request->cliente_id;
        $prestamo->prestamo_valor                = str_replace(',','',str_replace('.','',$request->prestamo_valor));
        $prestamo->prestamo_tasa                 = str_replace(',','', $request->prestamo_tasa);
        $prestamo->prestamo_tipo                 = $request->prestamo_tipo;
        $prestamo->prestamo_tiempo_cobro         = $request->prestamo_tiempo_cobro;
        $prestamo->prestamo_numero_cuotas        = str_replace(',','',str_replace('.','',$request->prestamo_numero_cuotas));
        $prestamo->prestamo_valor_cuota          = str_replace(',','',str_replace('.','',$request->prestamo_valor_cuota));
        $prestamo->prestamo_fecha                = $request->prestamo_fecha;
        $prestamo->prestamo_fecha_inicial        = $request->prestamo_fecha_inicial;
        $prestamo->prestamo_fecha_proximo_cobro  = $request->prestamo_fecha_proximo_cobro;
        $prestamo->prestamo_valor_total          = str_replace(',','',str_replace('.','',$request->prestamo_valor_total));
        $prestamo->prestamo_valor_abonado        = str_replace(',','',str_replace('.','',$request->prestamo_valor_abonado));
        $prestamo->prestamo_valor_proxima_cuota  = str_replace(',','',str_replace('.','',$request->prestamo_valor_proxima_cuota));
        $prestamo->prestamo_estado               = $request->prestamo_estado;
        $prestamo->prestamo_valor_actual         = str_replace(',','',str_replace('.','',$request->prestamo_valor_actual));
        $prestamo->prestamo_estado               = 'ACTIVO';
        $prestamo->user_id                       = Auth::id();
        $prestamo->prestamo_fechacreacion        = date("Y-m-d");
        $prestamo->prestamo_nombrecliente        = $cliente->cliente_nombre_completo;

        $prestamo->save();


        return Redirect()->route('prestamo.index')
            ->with('info', 'Prestamo registrado exitosamente');
    }


    public function show($id)
    {
        $prestamo = Prestamo::find($id);
        $cliente = $prestamo->cliente;

        $abonos = DB::table('abonos')
                  ->join('prestamos', 'abonos.prestamo_id', '=', 'prestamos.id')
                  ->select('abonos.id','abonos.abono_valor_cuota', 'abonos.abono_valor', 'abonos.abono_tipo_pago',
                           'abonos.abono_observacion', 'abonos.abono_fecha', 'abono_estado', 'abono_item','prestamos.id as prestamo_id')
                  ->where('prestamos.id','=', $id)
                  ->orderBy('abonos.id', 'desc')
            ->paginate(20);

        return view('aplicacion.prestamo.show', compact('prestamo', 'cliente', 'abonos'));
    }


    public function edit($id)
    {
        $prestamo = Prestamo::find($id);
        $cliente = $prestamo->cliente;
        return view('aplicacion.prestamo.edit', compact('prestamos', 'cliente'));
    }


    public function update(Request $request, $id)
    {
        $prestamo = Prestamo::find($id);

        $prestamo->cliente_id                    = $request->cliente_id;
        $prestamo->prestamo_valor                = $request->prestamo_valor;
        $prestamo->prestamo_tasa                 = $request->prestamo_tasa;
        $prestamo->prestamo_tipo                 = $request->prestamo_tipo;
        $prestamo->prestamo_tiempo_cobro         = $request->prestamo_tiempo_cobro;
        $prestamo->prestamo_numero_cuotas        = $request->prestamo_numero_cuotas;
        $prestamo->prestamo_valor_cuota          = $request->prestamo_valor_cuota;
        $prestamo->prestamo_fecha                = $request->prestamo_fecha;
        $prestamo->prestamo_fecha_inicial        = $request->prestamo_fecha_inicial;
        $prestamo->prestamo_fecha_proximo_cobro  = $request->prestamo_fecha_proximo_cobro;
        $prestamo->prestamo_valor_total          = $request->prestamo_valor_total;
        $prestamo->prestamo_valor_abonado        = $request->prestamo_valor_abonado;
        $prestamo->prestamo_valor_proxima_cuota  = $request->prestamo_valor_proxima_cuota;
        $prestamo->prestamo_estado               = 'ACTIVO';
        $prestamo->prestamo_valor_actual         = $request->prestamo_valor_actual;
        $prestamo->user_id                       = Auth::id();
        $prestamo->save();

        return Redirect()->route('prestamo.index')
                ->with('info', 'Cobrador Actualizado exitosamente');
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $prestamos = Prestamo::find($id);
            $prestamos->delete();
            $prestamos_total = Prestamo::all()->count();

            return response()->json([
                'total'   => $prestamos_total,
                'message' => $prestamos->nombre .' fue eliminado correctamente'
            ]);
        }
    }

    public function utilidad(Request $request)
    {
        return view('aplicacion.prestamo.informes.utilidad');
    }

    public function view(Request $request, $id)
    {

        $prestamos = DB::select('select p.id,cliente_nombre_completo from prestamos p, clientes c where c.id= p.cliente_id and p.id = ?', [$id]);

        if($request->ajax()){

            foreach ($prestamos as $prestamo)
            {
                $results[] = $prestamo;
            }

            return response()->json($results[0]);
        }
    }


    /*
    *   Update data
    */
    public function updateAnulaPrestamo(Request $request, $id)
    {

        $usuarios = User::find(Auth::id());
        $clave_encriptada = $usuarios->password;
        $clave_sin_encriptadar = $request->input('password');

        if ($request->input('observacion_prestamo') == '') {
            return response()
                ->json(["message" => "Debe Ingresar Una Observacion!!"],
                    500);
        }

       if ($request->ajax()) {
            if (Hash::check($clave_sin_encriptadar, $clave_encriptada)) {

                $data = Prestamo::find($id);
                $data->prestamo_observacion = $request->input('observacion_prestamo');
                $data->prestamo_estado = 'INACTIVO';
                $data->user_anulacion = Auth::id();
                $data->prestamo_fecha_anulacion = date("Y-m-d");
                $data->save();

                return response()
                    ->json(["message" => "El prestamo ha sido anulado exitosamente!!"],
                        200);
            }   else {
                return response()
                        ->json(["message" => "La Contrasena es incorrecta por favor intente de nuevo!!"],
                            500);
            }
       }
    }

    public function validaUnicoPrestamoCliente(Request $request, $cliente_id)
    {
        $prestamos = DB::table('prestamos')
            ->select(DB::raw('id'))
            ->where('cliente_id', '=', $cliente_id)
            ->where('prestamo_estado', '=', 'ACTIVO')
            ->get();
        if($request->ajax()){
            return response()->json($prestamos[0]);
        }
    }
}
