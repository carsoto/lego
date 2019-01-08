<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atleta;
use App\Representante;
use App\RedesSociales;
use App\InformacionAdicional;

class RegistroController extends Controller
{
    public function registroatleta($tipo){
		$representante = new Representante();
		$atleta = new Atleta();
		$redes_sociales = RedesSociales::where('activo', '=', 1)->get();
		$preguntas = InformacionAdicional::all();
		$tallas = array('0' => 'Seleccionar talla', '32' => '32', '34' => '34', '36' => '36', '38' => '38', '40' => '40', '42' => '42');
    	
    	if($tipo == 'niños'){
	        return view('adminlte::atleta.ficha-registro-ninos', array('representante' => $representante, 'atleta' => $atleta, 'redes_sociales' => $redes_sociales, 'preguntas' => $preguntas, 'tallas' => $tallas));
    	}if($tipo == 'adultos'){
    		return view('adminlte::atleta.ficha-registro-adultos', array('representante' => $representante, 'atleta' => $atleta, 'redes_sociales' => $redes_sociales, 'preguntas' => $preguntas, 'tallas' => $tallas));
    	}
    }

    public function store(Request $request){

    }
}
