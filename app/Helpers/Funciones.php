<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\ReservaConfiguracion;

class Funciones{

	public static function formatear_fecha($str_fecha){
        $anyo = substr($str_fecha, 0, 4);
        $mes = substr($str_fecha, 4, 2);
        $dia = substr($str_fecha, 6, 2);
        $fecha = $anyo.'-'.$mes.'-'.$dia;
        return $fecha;
	}

    public static function nombre_completo_usuario(){
        $nombre = explode(' ', Auth::user()->name);
        $apellido = explode(' ', Auth::user()->lastname);
        $nombre_completo = $nombre[0].' '.$apellido[0];
        return $nombre_completo;
    }

    public static function configuracion_reserva($propiedad){
        $configuraciones = ReservaConfiguracion::where('propiedad', '=', $propiedad)->get();
        return $configuraciones[0]->valor;
    }
}
