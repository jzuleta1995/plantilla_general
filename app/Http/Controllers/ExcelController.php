<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cobrador;
use Illuminate\Http\Request;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ExcelController extends Controller
{
   /* public function index(Request $request)
    {

        dd("kkkk");
        $users = DB::table('users')
            ->join('clientes', 'users.id', '=', 'clientes.user_id')
            ->select('clientes.id', 'clientes.nombre', 'users.nombre', 'users.apellido')
            ->get();



        Excel::create('Laravel Excel', function($excel) use ($users) {


                $excel->sheet('Users', function($sheet) use ($users) {

                    $data = array();
                    foreach ($users as $user){
                        $data = $user;
                    }

                $sheet->fromArray($data);

            });
        })->export('xls');

    }*/


    public function indexInformeCliente(Request $request)
    {
        return view('aplicacion.cliente.informes.general');
    }

    public function indexInformeCobrador(Request $request)
    {
        return view('aplicacion.cobrador.informes.general');
    }

    public function informeCliente(Request $request) {

        $clientes = Cliente::join('users', 'users.id', '=', 'clientes.user_id')
            ->join('cobradors', 'cobradors.id', '=', 'clientes.cobrador_id')
            ->select(
                'clientes.id',
                'clientes.cliente_nombre',
                'clientes.cliente_apellido',
                'clientes.cliente_documento',
                'clientes.cliente_direccion_casa',
                'clientes.cliente_direccion_trabajo',
                'clientes.cliente_lugar_trabajo',
                'clientes.cliente_telefono',
                'clientes.cliente_celular',
                'clientes.cliente_ciudad',
                'clientes.cliente_estado',
                'cobradors.cobrador_nombre',
                'users.nombre',
                'clientes.created_at');
        if($request->cliente_id !=''){
            $clientes->where('clientes.id', '=', $request->cliente_id);
        }
        if($request->fecha_inicial !='' && $request->fecha_final !=''){
            $clientes->whereBetween('clientes.created_at',  array($request->fecha_inicial, $request->fecha_final));
        }
        $clientes=$clientes->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $clientesArray = [];

        // Define the Excel spreadsheet headers
        $clientesArray[] = ['id_cliente', 'nombre cliente','apellido','documento','direccion casa','direccion trabajo', 'lugar trabajo', 'telefono', 'celular', 'ciudad', 'estado', 'cobrador', 'usuario creador', 'fecha hora creacion'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($clientes as $cliente) {
            $clientesArray[] = $cliente->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Informe Clientes', function($excel) use ($clientesArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($clientesArray) {
                $sheet->fromArray($clientesArray, null, 'A1', false, false);
            });
        })->export('xls');

    }


    public function informeCobrador(Request $request) {

        $clientes = Cobrador::join('users', 'users.id', '=', 'cobradors.user_id')
            ->select(
                'cobradors.id',
                'cobradors.cobrador_nombre',
                'cobradors.cobrador_apellido',
                'cobradors.cobrador_documento',
                'cobradors.cobrador_direccion',
                'cobradors.cobrador_telefono',
                'cobradors.cobrador_celular',
                'cobradors.cobrador_ciudad',
                'cobradors.cobrador_estado',
                'users.nombre',
                'cobradors.created_at');

        if($request->cobrador_id !=''){
            $clientes->where('cobradors.id', '=', $request->cobrador_id);
        }
        if($request->fecha_inicial !='' && $request->fecha_final !=''){
            $clientes->whereBetween('cobradors.created_at',  array($request->fecha_inicial, $request->fecha_final));
        }
        $clientes=$clientes->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $clientesArray = [];

        // Define the Excel spreadsheet headers
        $clientesArray[] = ['id_cliente', 'nombre cliente','apellido','documento','direccion casa','direccion trabajo', 'lugar trabajo', 'telefono', 'celular', 'ciudad', 'estado', 'cobrador', 'usuario creador', 'fecha hora creacion'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($clientes as $cliente) {
            $clientesArray[] = $cliente->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Informe Cobradores', function($excel) use ($clientesArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($clientesArray) {
                $sheet->fromArray($clientesArray, null, 'A1', false, false);
            });
        })->export('xls');

    }
}
