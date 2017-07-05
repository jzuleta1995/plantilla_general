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
        Excel::create('Laravel Excel', function($excel) {

            $excel->sheet('Users', function($sheet) {
               // $users = User::all();
               // $user = User::find($request->input('user_id'));
                $users = DB::table('users');
                $select = " SELECT id as codigo_usuario, nombre as usuario FROM users LIMIT 1";

                //dd($select);

               $users =  DB::select($select)->get( );
dd($users);

                $sheet->fromArray($users);

            });
        })->export('xls');

    }
}
