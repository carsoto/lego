<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atleta;
use App\Representante;
use App\RedesSociales;
use App\InformacionAdicional;
use App\Locacion;
use Carbon;
use Funciones;
use Response;
use DB;

class RegistroController extends Controller
{
    public function index(){
        $locaciones = Locacion::all();
        $ubicacion_hora = array();
        foreach ($locaciones as $key => $locacion) {
            foreach ($locacion->horarios as $key1 => $horario) {
                if($horario->hasta == 100){
                    $h = $locacion->ubicacion.' (mayor a '.$horario->desde.' años) - '.$horario->hora_inicio.' a '.$horario->hora_fin;
                }else{
                    $h = $locacion->ubicacion.' (mayor a '.$horario->desde.' años y menor a '.$horario->hasta.' años) - '.$horario->hora_inicio.' a '.$horario->hora_fin;
                }
                $ubicacion_hora[$horario->id] = $h;
            }
        }
        return view('adminlte::registro.registro-inicial', array('horarios' => $ubicacion_hora));
    }

    public function registroatleta($tipo){
		$representante = new Representante();
		$atleta = new Atleta();
		$redes_sociales = array();
		$preguntas = InformacionAdicional::all();
		$tallas = Funciones::tallas();
    	
    	if($tipo == 'niños'){
	        return view('adminlte::atleta.ficha-registro-ninos', array('representante' => $representante, 'atleta' => $atleta, 'redes_sociales' => $redes_sociales, 'preguntas' => $preguntas, 'tallas' => $tallas));
    	}if($tipo == 'adultos'){
    		return view('adminlte::atleta.ficha-registro-adultos', array('representante' => $representante, 'atleta' => $atleta, 'redes_sociales' => $redes_sociales, 'preguntas' => $preguntas, 'tallas' => $tallas));
    	}

    }

    public function store(Request $request){
        $atleta = new Atleta();

        $atleta->cedula = $request->atleta["cedula"];
        $atleta->nombre = $request->atleta["nombre"];
        $atleta->genero = $request->atleta["genero"];
        $atleta->fecha_nacimiento = $request->atleta["fecha_nacimiento"];
        $atleta->telf_contacto = $request->atleta["telf_contacto"];
        $atleta->red_social = $request->atleta["red_social"];

        $atleta->save();
        /*$request->atleta["fecha_clase_prueba"]
        $request->atleta["horario"]*/
    }
}
