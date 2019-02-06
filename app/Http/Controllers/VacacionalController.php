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
use Funciones;
use Response;
use DB;

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
        $tallas = Funciones::tallas();
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
                $datos_tarifas['porc_individual'] = $vacacional->porcentaje_individual;
                $datos_tarifas['porc_grupal'] = $vacacional->porcentaje_grupal;
                $datos_tarifas['fecha_limite'] = Carbon::parse($vacacional->fecha_limite)->format('Y-m-d');
            }
        }

        //dd($datos_tarifas);
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
            $representante = Representante::firstOrCreate(['cedula' => $request->representante["cedula"]], [ 
                'cedula' => $request->representante["cedula"],
                'nombres' => $request->representante["nombres"],
                'apellidos' => $request->representante["apellidos"],
                'telf_contacto' => $request->representante["telf_contacto"],
                'email' => $request->representante["email"],
                'red_social' => $request->representante["red_social"],
            ]);

            foreach($request->form_atleta AS $key => $atleta){
                if($atleta["cedula"] != ""){
                    $atleta_reg = Atleta::firstOrCreate(['cedula' => $atleta["cedula"]], [ 
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
                }else{
                    $atleta_reg = Atleta::create([ 
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
                }

                foreach($atleta["respuestas"]  AS $id_pregunta => $respuesta){
                    if($respuesta != null){
                        AtletasInformacionAdicional::firstOrCreate(['atletas_id' => $atleta_reg->id, 'informacion_adicional_id' => $id_pregunta], [ 
                            'atletas_id' => $atleta_reg->id,
                            'informacion_adicional_id' => $id_pregunta,
                            'respuesta' => $respuesta
                        ]);    
                    }
                }

                $representante->atletas()->sync($atleta_reg->id, false);

                $pago = $request->pago_monto/$cantidad_alumnos;
                InscripcionesVacacional::firstOrCreate(['atletas_id' => $atleta_reg->id, 'fecha_inscripcion' => date('Y-m-d')], [ 
                    'atletas_id' => $atleta_reg->id,
                    'vacacional_horarios_id' => $request->check_horario,
                    'tarifa' => $request->pago_tarifa,
                    'descuento' => $request->pago_descuento,
                    'fecha_inscripcion' => date('Y-m-d'),
                    'pago' => $pago,
                    'activo' => 1
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

    public function dashboard(){
        $inscritos = Funciones::inscritos_vacacional();
        return view('adminlte::vacacional.dashboard', array('inscritos' => $inscritos));
    }

    public function registrarpago($id){
        $vacacional = InscripcionesVacacional::findOrFail($id);
        $vacacional->estatus_pago = 'Pagado';

        if($vacacional->save()){
            $status = 'success';
            $msg = 'El pago fue registrado exitosamente!';
        } else {
            $status = 'failed';
            $msg = 'Disculpe, el pago no pudo ser registrado!';
        }    

        return Response::json(array('status' => $status, 'msg' => $msg));
    }

    public function deshabilitar_inscripcion($id){
        $vacacional = InscripcionesVacacional::findOrFail($id);
        $vacacional->activo = 0;

        if($vacacional->save()){
            $status = 'success';
            $msg = 'Alumno inhabilitado exitosamente!';
        } else {
            $status = 'failed';
            $msg = 'Disculpe, ocurrió un error y no pudo ser inhabilitado!';
        }    

        return Response::json(array('status' => $status, 'msg' => $msg));
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
