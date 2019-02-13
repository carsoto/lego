<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\ReservaConfiguracion;
use App\AcademiaConfiguracion;
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

    public static function tallas(){
        $tallas = array('0' => 'Seleccionar talla', '32' => 'XS', '34' => 'S', '36' => 'M', '38' => 'L', '40' => 'XL', '42' => 'XXL');
        return $tallas;
    }

    public static function inscritos_vacacional(){
        $inscritos = DB::select(DB::raw("
        SELECT a.id, CONCAT(r.apellidos, ', ', r.nombres) AS representante, CONCAT(a.apellido, ', ', a.nombre) AS alumno, a.fecha_nacimiento, TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AS edad, i.fecha_inscripcion, a.instituto AS colegio, CONCAT(h.hora_inicio, ' - ', h.hora_fin) AS horario, l.ubicacion AS locacion, i.pago AS pago, i.estatus_pago AS status
        FROM
            inscripciones_vacacional i
        INNER JOIN vacacional_horarios h ON i.vacacional_horarios_id = h.id
        INNER JOIN atletas a ON a.id = i.atletas_id
        INNER JOIN representantes_atletas ra ON ra.atletas_id = a.id
        INNER JOIN representantes r ON ra.representantes_id = r.id  
        INNER JOIN vacacional v ON h.vacacional_id = v.id
        INNER JOIN locaciones l ON l.id = v.locaciones_id
        WHERE i.activo = 1
        ORDER BY i.fecha_inscripcion, r.apellidos"));
        return $inscritos;
    }

    public static function inscritos_campamento(){
        $inscritos = DB::select(DB::raw("
            SELECT a.id, CONCAT(r.apellidos, ', ', r.nombres) AS representante, CONCAT(a.apellido, ', ', a.nombre) AS alumno, a.fecha_nacimiento, TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AS edad, i.fecha_inscripcion, a.instituto AS colegio, h.descripcion AS horario, l.ubicacion AS locacion, i.pago AS pago, i.estatus_pago AS status
            FROM
                inscripciones_campamento i
            INNER JOIN campamentos_horarios h ON i.campamentos_horarios_id = h.id
            INNER JOIN atletas a ON a.id = i.atletas_id
            INNER JOIN representantes_atletas ra ON ra.atletas_id = a.id
            INNER JOIN representantes r ON ra.representantes_id = r.id  
            INNER JOIN campamentos c ON h.campamentos_id = c.id
            INNER JOIN locaciones l ON l.id = c.locaciones_id
            WHERE i.activo = 1
            ORDER BY i.fecha_inscripcion, r.apellidos"));
        return $inscritos;
    }

    public static function inscritos_academia($modalidad){

        $inscritos = DB::select(DB::raw("
            SELECT a.id, CONCAT(r.apellidos, ', ', r.nombres) AS representante, CONCAT(a.apellido, ', ', a.nombre) AS alumno, a.fecha_nacimiento, TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AS edad, i.fecha_inscripcion, a.instituto AS colegio, CONCAT(h.hora_inicio, ' - ', h.hora_fin) AS horario, l.ubicacion AS locacion, i.prueba_fecha
            FROM
                inscripciones_academia i
            INNER JOIN academia_horarios h ON i.prueba_horario_id = h.id
            INNER JOIN atletas a ON a.id = i.atletas_id
            INNER JOIN representantes_atletas ra ON ra.atletas_id = a.id
            INNER JOIN representantes r ON ra.representantes_id = r.id  
            INNER JOIN locaciones l ON l.id = h.locaciones_id
            WHERE i.estatus = '".$modalidad."'
            ORDER BY i.fecha_inscripcion, r.apellidos"));

        
        return $inscritos;
    }

    public static function configuracion_academia($tipo, $propiedad){
        $configuraciones = AcademiaConfiguracion::where('tipo', '=', $tipo)->where('configuracion', '=', $propiedad)->get();
        return $configuraciones[0]->valor;
    }
}
