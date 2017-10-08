<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AutocompleteController extends Controller
{
    public function autocomplete(Request $request)
    {
        //se valida si la cadena es el numero de documento o el nombre del cliente
        $cantidad_caracteres = substr_count($request->term,';');

        if($request->ajax()){
            $path = $request->ruta;
            $term = str_replace(';', '',$request->term);


            $results[] = array();

            if($path == 'cliente'){
                if($cantidad_caracteres == 0) {
                    $nombre_completo1 = 'cliente_documento';
                }elseif($cantidad_caracteres == 1) {
                    $nombre_completo1 = 'cliente_nombre_completo';
                }

                $queries = DB::table('clientes')
                    ->where($nombre_completo1, 'ilike', $term.'%')
                    ->take(5)->get();
             $results[] = ['id' => '', 'value' => 'CEDULA     -  CLIENTE']; //you can take custom values as you want

                foreach ($queries as $query)
                {
                    $nombre_completo = $query->cliente_documento.' - '.$query->cliente_nombre_completo;
                    $results[] = ['id' => $query->id, 'value' => $nombre_completo]; //you can take custom values as you want
                }

            }else if($path == 'cobrador'){

                if($cantidad_caracteres == 0) {
                    $nombre_completo1 = 'cobrador_documento';
                }elseif($cantidad_caracteres == 1) {
                    $nombre_completo1 = 'cobrador_nombre_completo';
                }


                $queries = DB::table('cobradors')
                    ->where($nombre_completo1, 'ilike', $term.'%')
                    ->take(5)->get();

                 $results[] = ['id' => '', 'value' => 'CEDULA     -  COBRADOR']; //you can take custom values as you want


                foreach ($queries as $query)
                {
                    $nombre_completo = $query->cobrador_documento.' - '.$query->cobrador_nombre_completo;
                    $results[] = ['id' => $query->id, 'value' => $nombre_completo ]; //you can take custom values as you want
                }
            }
        }

        return response()->json($results);
    }

}

