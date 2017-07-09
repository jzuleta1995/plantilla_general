<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AutocompleteController extends Controller
{
    public function autocomplete(Request $request){

        $path = $request->ruta;

        if($path == 'cliente'){
            $term = $request->term;

            $queries = DB::table('clientes')
                ->where('nombre', 'like', '%'.$term.'%')
                ->take(2)->get();

            foreach ($queries as $query)
            {
                $results[] = ['id' => $query->id, 'value' => $query->nombre]; //you can take custom values as you want
            }
            return response()->json($results);
        }

    }

}

