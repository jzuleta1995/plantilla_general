<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class FechaController extends Controller
{

    public function getFormatoFecha(){
        $current = Carbon::now();

        return $current;
    }

    public function getFechaActual(){
        $current = Carbon::now();

        return $current->toDateString();
    }

    public function fechaPrimerDiaMesActual(){
        $fecha_inicial = Carbon::now();
        $fecha_inicial->day(1);

        return $fecha_inicial->toDateString();
    }

    public function fechaUltimoDiaMesActual(){
        $fecha_final = Carbon::now();
        $mes = $fecha_final->month;
        $anio = $fecha_final->year;
        $dia_final = $this->getUltimoDiaMes($mes, $anio);
        $fecha_final->day($dia_final);

        return $fecha_final->toDateString();
    }

    public function fechaPrimerDiaMesIngresado($fecha_parametro){

        $fecha_primerdia = new Carbon($fecha_parametro);
        $fecha = $fecha_primerdia->startOfMonth()->toDateString();
        return $fecha;
    }

    public function fechaUltimoDiaMesIngresado($fecha_parametro){

        $fecha_ultimodia = new Carbon($fecha_parametro);
        $fecha = $fecha_ultimodia ->lastOfMonth()->toDateString();
        return $fecha;
    }

    public function getUltimoDiaMes($mes, $anio){
        $dia = 31;

        if($mes <= 7){
            if($mes == 2){
                if(($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)){
                    $dia = 29;
                }else{
                    $dia = 28;
                }
            }else{
                if($mes % 2 == 0){
                    $dia = 30;
                }else{
                    $dia = 31;
                }
            }
        }else{
            if($mes % 2 == 0){
                $dia = 31;
            }else{
                $dia = 30;
            }
        }

        return $dia;
    }
}
