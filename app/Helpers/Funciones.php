<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\ReservaConfiguracion;
use DB;

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

    public static function inscritos_vacacional(){
        $inscritos = DB::select(DB::raw("
            SELECT a.id, CONCAT(r.nombres, ', ', r.apellidos) AS representante, CONCAT(a.apellido, ', ', a.nombre) AS alumno, a.fecha_nacimiento, TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AS edad, i.fecha_inscripcion, a.instituto AS colegio, CONCAT(h.hora_inicio, ' - ', h.hora_fin) AS horario, l.ubicacion AS locacion
        FROM
            inscripciones_vacacional i
        INNER JOIN vacacional_horarios h ON i.vacacional_horarios_id = h.id
        INNER JOIN atletas a ON a.id = i.atletas_id
        INNER JOIN representantes_atletas ra ON ra.atletas_id = a.id
        INNER JOIN representantes r ON ra.representantes_id = r.id  
        INNER JOIN vacacional v ON h.vacacional_id = v.id
        INNER JOIN locaciones l ON l.id = v.locaciones_id
        ORDER BY i.fecha_inscripcion"));
        return $inscritos;
    }
}
