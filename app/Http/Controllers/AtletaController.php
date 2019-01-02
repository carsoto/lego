<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deporte;
use App\Servicio;
use App\Locacion;
use App\Periodo;

class AtletaController extends Controller
{
    public function registroinicio(){
    	$deportes = Deporte::where('activo', '=', 1)->get();
    	$servicios = Servicio::where('activo', '=', 1)->get();
    	$locaciones = Locacion::where('activo', '=', 1)->get();
    	$periodos = Periodo::where('activo', '=', 1)->get();
        return view('adminlte::atletas.ficha-registro', array('deportes' => $deportes, 'servicios' => $servicios, 'locaciones' => $locaciones, 'periodos' => $periodos));
    }

    public function store(Request $request){

    }
}
