<?php

namespace App\Http\Controllers;

use App\Cliente;
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


    public function index(Request $request)
    {
        return view('aplicacion.cliente.informes.general');
    }


    public function informe(Request $request) {

        $payments = Cliente::join('users', 'users.id', '=', 'clientes.user_id')
            ->select(
                'clientes.id',
                'users.email',
                'clientes.nombre',
                'users.created_at')
            ->get();

        /**$payments = DB::table('users')
            ->join('clientes', 'users.id', '=', 'clientes.user_id')
            ->select('clientes.id', 'clientes.nombre', 'users.nombre', 'users.apellido' , 'users.created_at')
            ->get();**/

        // Initialize the array which will be passed into the Excel
        // generator.
        $paymentsArray = [];

        // Define the Excel spreadsheet headers
        $paymentsArray[] = ['id', 'clientes','email','total','created_at'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($payments as $payment) {
            $paymentsArray[] = $payment->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('payments', function($excel) use ($paymentsArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
                $sheet->fromArray($paymentsArray, null, 'A1', false, false);
            });
        })->export('xls');

    }
}
