<?php

namespace App\Http\Controllers;

use App\Cobrador;
use App\Http\Requests\CobradorEditRequest;
use App\Http\Requests\CobradorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Validator;
use DB;
class CobradorController extends Controller
{
    public function index(Request $request)
    {
      $cobradors = Cobrador::nombre($request->get('nombre'))
                   ->orderBy('id', 'ASC')
                   ->paginate(30);

        return view('aplicacion.cobrador.index')->with('cobradors', $cobradors);
    }

    public function create()
    {
        $cobrador = "";

        return view('aplicacion.cobrador.create', compact('cobrador'));
    }

    public function store(CobradorRequest $request)
    {
        $cobrador = new Cobrador();
        $cobrador->cobrador_nombre          = trim(strtoupper($request->cobrador_nombre));
        $cobrador->cobrador_apellido        = trim(strtoupper($request->cobrador_apellido));
        $cobrador->cobrador_nombre_completo = trim(strtoupper($request->cobrador_nombre . " " . $request->cobrador_apellido));
        $cobrador->cobrador_documento       = $request->cobrador_documento;
        $cobrador->cobrador_direccion       = trim(strtoupper($request->cobrador_direccion));
        $cobrador->cobrador_telefono        = $request->cobrador_telefono;
        $cobrador->cobrador_celular         = $request->cobrador_celular;
        $cobrador->cobrador_ciudad          = $request->cobrador_ciudad;
        $cobrador->cobrador_estado          = $request->cobrador_estado;
        $cobrador->user_id                  = Auth::id();
        $cobrador->cobrador_fechacreacion   = date("Y-m-d");

        $cobrador->save();

        return Redirect()->route('cobrador.index')
               ->with('info', 'El cobrador ' . $cobrador->cobrador_nombre_completo . ' ha sido registrado exitosamente');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $cobrador = Cobrador::find($id);

        return view('aplicacion.cobrador.edit', compact('cobrador'));
    }


    public function update(CobradorEditRequest $request, $id)
    {
        $cobrador = Cobrador::find($id);

        $validator = Validator::make($request->all(), [
            'cobrador_documento' => [Rule::unique('cobradors')->ignore($id)]
        ]);

        if ($validator->fails()) {
            return redirect()->route('cobrador.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $cobrador->cobrador_nombre          = trim(strtoupper($request->cobrador_nombre));
        $cobrador->cobrador_apellido        = trim(strtoupper($request->cobrador_apellido));
        $cobrador->cobrador_nombre_completo = trim(strtoupper($request->cobrador_nombre . " " . $request->cobrador_apellido));
        $cobrador->cobrador_documento       = $request->cobrador_documento;
        $cobrador->cobrador_direccion       = trim(strtoupper($request->cobrador_direccion));
        $cobrador->cobrador_telefono        = $request->cobrador_telefono;
        $cobrador->cobrador_celular         = $request->cobrador_celular;
        $cobrador->cobrador_ciudad          = $request->cobrador_ciudad;
        $cobrador->cobrador_estado          = $request->cobrador_estado;
        $cobrador->user_id = Auth::id();
        $cobrador->save();

        return Redirect()->route('cobrador.index')
               ->with('info', 'El cobrador ' . $cobrador->cobrador_nombre_completo . ' ha sido actualizado exitosamente');
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $cobrador = Cobrador::find($id);
            $cobrador->delete();
            $cobradores_total = Cobrador::all()->count();

            return response()->json([
                'total'   => $cobradores_total,
                'message' => $cobrador->nombre .' fue eliminado correctamente'
            ]);
        }
    }
    public function indexAsignaCobradorACliente(Request $request)
    {
        $cobrador = "";
        $clientes = "";
        return view('aplicacion.cobrador.procedimientos.AsignaCobradorACliente',compact('clientes',$clientes, 'cobrador', $cobrador));
    }

    public function CargarClienteCobrador(Request $request)
    {
        $cobrador = "";

       if($request->session()->get("cobrador_quitar_cliente_id") != "" && $request->session()->get("cobrador_quitar_cliente_id") > 0){
            $cobrador_quitar_cliente_id = $request->session()->get("cobrador_quitar_cliente_id");
            $cobrador = Cobrador::find($cobrador_quitar_cliente_id);
       }else{
           $cobrador_quitar_cliente_id = $request->cobrador_quitar_cliente_id;
       }

      $clientes = DB::table('clientes')
          ->selectRaw('clientes.id, clientes.cliente_nombre_completo, clientes.cliente_documento');
      $clientes->where('cliente_estado', '=', 'ACTIVO');

      if ($cobrador_quitar_cliente_id != '') {
          $clientes->where('clientes.cobrador_id', '=', $cobrador_quitar_cliente_id);
      }
      $clientes=$clientes->get();

      if(count($clientes) == 0){
          $clientes = "";
          return Redirect()->route('cobrador.indexAsignaCobradorACliente')
              ->with('clientes', $clientes)
              ->with("cobrador", $cobrador)
              ->with("info", "El Cobrador no tiene asociado ningun cliente!!");
      }

      return view('aplicacion.cobrador.procedimientos.AsignaCobradorACliente')
            ->with('clientes', $clientes)
            ->with("cobrador", $cobrador);
    }

    public function AsignaCobradorACliente(Request $request)
    {
        $clientes = explode(",", substr($request->datos, 0, -1));
        $cobrador = "";

        if($clientes[0] != ""){
            foreach ($clientes as $cliente) {
                if($cliente != "0") {
                    DB::table('clientes')
                        ->where('id', '=', $cliente)
                        ->update(['cobrador_id' => $request->cobrador_asignar_cliente_id]);
                }
            }
        }else{
            return Redirect()->route('cobrador.CargarClienteCobrador')->with('info', 'Debe checkear al menos un cliente!!')
                ->with('cobrador_quitar_cliente_id', $request->cobrador_quitar_cliente_id);
        }

        $clientes = "";
        return Redirect()->route('cobrador.indexAsignaCobradorACliente')->with('info', 'El traslado de los clientes ha sido exitoso!!')
            ->with('clientes', $clientes)
            ->with("cobrador", $cobrador);
    }
}
