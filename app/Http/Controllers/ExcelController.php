<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ExcelController extends Controller
{
    public function store(Request $request)
    {
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

                    //$users = User::all();
                    /*$users = User::select('id','nombre','apellido')
                        ->join('clientes', 'clientes.id', '=', 'Users.user_id');*/


                  /*  ->join('clientes', 'prestamos.cliente_id', '=', 'clientes.id')
                        ->select('prestamos.id', 'clientes.nombre', 'prestamos.tasa', 'prestamos.valor_prestamo');
                  */


                $sheet->fromArray($data);

            });
        })->export('xls');

    }
}
