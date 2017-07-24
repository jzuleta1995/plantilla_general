<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AutocompleteController extends Controller
{
    public function autocomplete(Request $request)
    {
        //$results = "";

        if($request->ajax()){
            $path = $request->ruta;
            $term = $request->term;

            if($path == 'cliente'){
                $queries = DB::table('clientes')
                    ->where('cliente_nombre_completo', 'ilike', '%'.$term.'%')
                    ->take(2)->get();

                foreach ($queries as $query)
                {
                    $nombre_completo = $query->cliente_nombre_completo;
                    $results[] = ['id' => $query->id, 'value' => $nombre_completo]; //you can take custom values as you want
                }

            }else if($path == 'cobrador'){

                $queries = DB::table('cobradors')
                    ->where('cobrador_nombre_completo', 'ilike', '%'.$term.'%')
                    ->take(3)->get();

                foreach ($queries as $query)
                {
                    $results[] = ['id' => $query->id, 'value' => $query->cobrador_nombre_completo]; //you can take custom values as you want
                }
            }
        }

        return response()->json($results);
    }

}

