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

        /*foreach($locaciones AS $key => $locacion){
            if(count($locacion->vacacional()->where('activo', '=', 1)->get()) > 0){
                foreach($locacion->vacacional()->where('activo', '=', 1)->get() AS $key => $vacacional){
                    foreach($vacacional->vacacional_horarios()->where('activo', '=', 1)->get() AS $key => $horario){
                        $datos_tarifas['vacacional'][$locacion->id][$vacacional->id][$horario->id] = number_format($horario->tarifa_ins, 2, '.', '');
                    }
                }
                $datos_tarifas['edad_inicio'] = $vacacional->edad_inicio;
                $datos_tarifas['edad_fin'] = $vacacional->edad_fin;
                $datos_tarifas['porc_individual'] = $vacacional->porcentaje_individual;
                $datos_tarifas['porc_grupal'] = $vacacional->porcentaje_grupal;
                $datos_tarifas['fecha_limite'] = Carbon::parse($vacacional->fecha_limite)->format('Y-m-d');
            }
        }*/

        //dd($datos_tarifas);

        return view('adminlte::academia.prueba', array('locaciones' => $locaciones, 'tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas));
    }
    public function inscripcionacademia(){
        $locaciones = Locacion::where('activo', '=', 1)->get();
        $preguntas = InformacionAdicional::all();
        $tallas = Funciones::tallas();
        $datos_tarifas = array();

        return view('adminlte::academia.inscripcion', array('locaciones' => $locaciones, 'tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas));
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
