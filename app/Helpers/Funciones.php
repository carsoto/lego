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
        $tallas = array('0' => 'Seleccionar talla', 'XS' => 'XS', 'S' => 'S', 'M' => 'M', 'L' => 'L', 'XL' => 'XL', 'XXL' => 'XXL');
        return $tallas;
    }

    public static function tipos_pago(){
        $tipos_pago = array('Efectivo' => 'Efectivo', 'Cheque' => 'Cheque', 'Depósito' => 'Depósito', 'Transferencia' => 'Transferencia');
        return $tipos_pago;
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

        $inscritos = DB::select(DB::raw("SELECT a.id, CONCAT(r.apellidos, ', ', r.nombres) AS representante, CONCAT(a.apellido, ', ', a.nombre) AS alumno, a.fecha_nacimiento, TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AS edad, i.fecha_inscripcion, i.prueba_fecha, a.instituto AS colegio, l.ubicacion AS locacion, CONCAT(ah.hora_inicio, ' - ', ah.hora_fin) AS horario FROM academia_horarios ah, inscripciones_academia i INNER JOIN atletas a ON i.atletas_id = a.id INNER JOIN representantes_atletas ra ON ra.atletas_id = a.id INNER JOIN representantes r ON ra.representantes_id = r.id INNER JOIN locaciones l ON l.id = i.locaciones_id WHERE i.estatus = '".$modalidad."' AND ah.edad_inicio <= TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AND ah.edad_fin >= TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) ORDER BY i.fecha_inscripcion , r.apellidos"));

        return $inscritos;
    }

    public static function configuracion_academia($propiedad = null){
        $academia = array();
        
        if($propiedad != null){
            $configuraciones = AcademiaConfiguracion::where('configuracion', '=', $propiedad)->get();    
        }else{
            $configuraciones = AcademiaConfiguracion::all();
        }
        
        foreach ($configuraciones as $key => $conf) {
            $academia[$conf->configuracion] = $conf->valor;
        }

        return $academia;
    }

    public static function asistencia($modalidad, $mes, $anyo, $locacion, $horario){

        if($modalidad == 'Academia'){
            $asistencia = DB::select(DB::raw("SELECT a.id, CONCAT(a.apellido, ', ', a.nombre) AS alumno, TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AS edad, i.prueba_fecha, l.id AS locacion, ah.id AS horario,  am.inscripciones_academia_id, am.dias_asistencia FROM atletas a, academia_matricula am, inscripciones_academia i, academia_horarios ah, locaciones l WHERE l.id = i.locaciones_id AND am.inscripciones_academia_id = i.id AND a.id = i.atletas_id AND am.academia_horarios_id = ah.id AND am.mes = ".$mes." AND am.anyo = ".$anyo." AND l.id = ".$locacion." AND ah.id = ".$horario." AND am.activo = 1"));     
        }else{
            $asistencia = DB::select(DB::raw("SELECT a.id, CONCAT(a.apellido, ', ', a.nombre) AS alumno, TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AS edad, i.prueba_fecha, l.id AS locacion, ah.id AS horario FROM academia_horarios ah, inscripciones_academia i INNER JOIN atletas a ON i.atletas_id = a.id INNER JOIN representantes_atletas ra ON ra.atletas_id = a.id INNER JOIN representantes r ON ra.representantes_id = r.id INNER JOIN locaciones l ON l.id = i.locaciones_id WHERE i.prueba_fecha = CURDATE() AND ah.edad_inicio <= TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) AND l.id = ".$locacion." AND ah.id = ".$horario." AND ah.edad_fin >= TIMESTAMPDIFF(YEAR, a.fecha_nacimiento, CURDATE()) ORDER BY a.apellido ASC"));    
        }

        return $asistencia;
    }

    public static function descripcion_semana(){
        $dias_semana_desc = array(1 => 'Lun.', 2 => 'Mar.', 3 => 'Miér.', 4 => 'Jue.', 5 => 'Vie.', 6 => 'Sáb.', 0 => 'Dom.');
        return $dias_semana_desc;
    }
}
