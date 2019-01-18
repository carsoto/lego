<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacacional;
use App\VacacionalHorario;
use App\Locacion;
use App\InformacionAdicional;
use App\Representante;
use App\Atleta;
use App\AtletasInformacionAdicional;
use App\InscripcionesVacacional;
use Carbon\Carbon;

class VacacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locaciones = Locacion::where('activo', '=', 1)->get();
        $preguntas = InformacionAdicional::all();
        $tallas = array('0' => 'Seleccionar talla', '32' => '32', '34' => '34', '36' => '36', '38' => '38', '40' => '40', '42' => '42');
        $datos_tarifas = array();

        foreach($locaciones AS $key => $locacion){
            if(count($locacion->vacacional()->where('activo', '=', 1)->get()) > 0){
                foreach($locacion->vacacional()->where('activo', '=', 1)->get() AS $key => $vacacional){
                    foreach($vacacional->vacacional_horarios()->where('activo', '=', 1)->get() AS $key => $horario){
                        $datos_tarifas['vacacional'][$locacion->id][$vacacional->id][$horario->id] = number_format($horario->tarifa_ins, 2, '.', '');
                    }
                }
                $datos_tarifas['edad_inicio'] = $vacacional->edad_inicio;
                $datos_tarifas['edad_fin'] = $vacacional->edad_fin;
                $datos_tarifas['porc_grupal'] = $vacacional->porcentaje_grupal;
                $datos_tarifas['porc_grupal'] = $vacacional->porcentaje_grupal;
                $datos_tarifas['porc_individual'] = $vacacional->porcentaje_individual;
                $datos_tarifas['porc_grupal'] = $vacacional->porcentaje_grupal;
                $datos_tarifas['fecha_limite'] = Carbon::parse($vacacional->fecha_limite)->format('Y-m-d');
            }
        }

        return view('adminlte::vacacional.index', array('locaciones' => $locaciones, 'tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas));
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
        try {
            $cantidad_alumnos = count($request->form_atleta);
            $representante = Representante::updateOrCreate(['cedula' => $request->representante["cedula"]], [ 
                'cedula' => $request->representante["cedula"],
                'nombres' => $request->representante["nombres"],
                'apellidos' => $request->representante["apellidos"],
                'telf_contacto' => $request->representante["telf_contacto"],
                'email' => $request->representante["email"],
                'red_social' => $request->representante["red_social"],
            ]);

            foreach($request->form_atleta AS $key => $atleta){
                $atleta_reg = Atleta::updateOrCreate(['cedula' => $atleta["cedula"]], [ 
                    'cedula' => $atleta["cedula"],
                    'nombre' => $atleta["nombre"],
                    'apellido' => $atleta["apellido"],
                    'genero' => $atleta["genero"],
                    'fecha_nacimiento' => $atleta["fecha_nacimiento"],
                    'red_social' => $atleta["red_social"],
                    'instituto' => $atleta["instituto"],
                    'talla_top' => $atleta["talla_top"],
                    'talla_camiseta' => $atleta["talla_camiseta"]
                ]);

                foreach($atleta["respuestas"]  AS $id_pregunta => $respuesta){
                    if($respuesta != null){
                        AtletasInformacionAdicional::updateOrCreate(['atletas_id' => $atleta_reg->id, 'informacion_adicional_id' => $id_pregunta], [ 
                            'atletas_id' => $atleta_reg->id,
                            'informacion_adicional_id' => $id_pregunta,
                            'respuesta' => $respuesta
                        ]);    
                    }
                }

                $representante->atletas()->sync($atleta_reg->id, false);

                $pago = $request->pago_monto/$cantidad_alumnos;
                InscripcionesVacacional::updateOrCreate(['atletas_id' => $atleta_reg->id, 'fecha_inscripcion' => date('Y-m-d')], [ 
                    'atletas_id' => $atleta_reg->id,
                    'vacacional_horarios_id' => $request->check_horario_vacacional,
                    'tarifa' => $request->pago_tarifa,
                    'descuento' => $request->pago_descuento,
                    'fecha_inscripcion' => date('Y-m-d'),
                    'pago' => $pago,
                    'activo' => 0
                ]);
            }
            $msg = 'Proceso finalizado con éxito, te esperamos en la academia.';
            $status = true;
        } catch (Exception $e) {
            $msg = $e;
            $status = false;
        }

        return view('adminlte::vacacional.inscripcion_finalizada', array('message' => $msg, 'status' => $status));
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