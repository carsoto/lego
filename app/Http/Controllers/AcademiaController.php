<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locacion;
use App\InformacionAdicional;
use App\Representante;
use App\Atleta;
use App\AtletasInformacionAdicional;
use Carbon\Carbon;
use Funciones;
use DB;
use Response;

class AcademiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminlte::academia.index');
    }

    public function inscripcionprueba(){
        $locaciones = Locacion::where('activo', '=', 1)->get();
        $preguntas = InformacionAdicional::all();
        $tallas = Funciones::tallas();
        $datos_tarifas = array();

        foreach($locaciones AS $key => $locacion){
            if(count($locacion->academia_horarios()->where('activo', '=', 1)->get()) > 0){
                foreach($locacion->academia_horarios()->where('activo', '=', 1)->get() AS $key => $horario){
                    $datos_tarifas[] = array('horario_id' => $horario->id, 'locacion_id' => $horario->locaciones_id, 'locacion' => $locacion->ubicacion, 'edad_inicio' => $horario->edad_inicio, 'edad_fin' => $horario->edad_fin, 'horario' => $horario->hora_inicio.' - '.$horario->hora_fin);
                }
            }
        }

        return view('adminlte::academia.prueba', array('locaciones' => $locaciones, 'tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas));
    }
    public function inscripcionacademia(){
        $locaciones = Locacion::where('activo', '=', 1)->get();
        $preguntas = InformacionAdicional::all();
        $tallas = Funciones::tallas();
        $datos_tarifas = array();

        return view('adminlte::academia.inscripcion', array('locaciones' => $locaciones, 'tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas));
    }

    public function registrarprueba(Request $request){
        dd($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
