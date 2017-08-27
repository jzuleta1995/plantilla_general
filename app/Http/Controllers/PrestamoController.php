<?php

namespace App\Http\Controllers;

use App\Abono;
use App\Prestamo;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = DB::table('prestamos')
                    ->join('clientes', 'prestamos.cliente_id', '=', 'clientes.id')
                    ->select('prestamos.id', 'clientes.cliente_nombre_completo', 'prestamos.prestamo_tasa', 'prestamos.prestamo_valor');

        $prestamos = $prestamos->paginate(2);

        return view('aplicacion.prestamo.index')->with('prestamos', $prestamos);
    }

    public function create()
    {
        $cliente = "";

        return view('aplicacion.prestamo.create', compact('prestamo'))
                    ->with('cliente', $cliente);
    }

    public function store(Request $request)
    {
        $prestamo = new Prestamo($request->all());

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
        $prestamo->prestamo_estado               = $request->prestamo_estado;
        $prestamo->prestamo_valor_actual         = $request->prestamo_valor_actual;
        $prestamo->prestamo_estado               = 'ACTIVO';
        $prestamo->user_id                       = Auth::id();
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
                           'abonos.abono_observacion', 'abonos.abono_fecha', 'abono_estado')
                  ->where('prestamos.id','=', $id)
                  ->orderBy('abonos.id', 'desc')
            ->paginate(10);

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
            $prestamos =Prestamo::find($id);
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
        return view('aplicacion.prestamo.informes.utilidad', 'prestamos');
    }

    public function view(Request $request, $id)
    {

        $prestamos = DB::select('select cliente_nombre_completo from prestamos p, clientes c where c.id= p.cliente_id and p.id = ?', [$id]);
        //$prestamos = $prestamos->get();
        //dd($prestamos);
        if($request->ajax()){
           //$results =Prestamo::find($id);

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

       // dd("id".$id);
        $data = Prestamo::find($id);
        $data -> prestamo_observacion = $request -> input('observacion_prestamo');
        $data -> prestamo_estado      = 'INACTIVO';

        $data -> save();
        //return response()->json($data);

        return back()
            ->with('success','Prestamo Anulado.');
    }
}
