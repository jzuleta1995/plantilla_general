<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AutocompleteController extends Controller
{
    public function autocomplete(Request $request){

        $path = $request->ruta;
        $term = $request->term;

        if($path == 'cliente'){


            $queries = DB::table('clientes')
                ->where('nombre', 'like', '%'.$term.'%')
                ->take(2)->get();

            foreach ($queries as $query)
            {
                $nombre_completo = $query->nombre . ' ' . $query->apellido;
                $results[] = ['id' => $query->id, 'value' => $nombre_completo]; //you can take custom values as you want
            }

        }else if($path == 'cobrador'){
           //$term = $request->term;

            $queries = DB::table('cobradors')
                ->where('nombre', 'like', '%'.$term.'%')
                ->take(2)->get();

            foreach ($queries as $query)
            {
                $results[] = ['id' => $query->id, 'value' => $query->nombre]; //you can take custom values as you want
            }
        }
        return response()->json($results);


    }

}

