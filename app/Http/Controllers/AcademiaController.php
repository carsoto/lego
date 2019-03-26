<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locacion;
use App\InformacionAdicional;
use App\Representante;
use App\Atleta;
use App\AtletasInformacionAdicional;
use App\InscripcionesAcademia;
use App\AcademiaMatricula;
use App\AcademiaAsistencia;
use App\AcademiaHorariosDisponible;
use App\AcademiaHorario;
use App\AcademiaTarifa;
use App\AcademiaFactura;
use App\AcademiaDetallesFactura;
use Carbon\Carbon;
use Funciones;
use DB;
use Response;
use Auth;

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
        $configuraciones = Funciones::configuracion_academia();
        $preguntas = InformacionAdicional::all();
        $tallas = Funciones::tallas();
        $datos_tarifas = array();
        $dias_de_clases = explode(",", $configuraciones['Dias de clases']);
        $dias_semana = array(1,2,3,4,5,6,0);
        $deshabilitar_dias = array_diff($dias_semana, $dias_de_clases);
        $deshabilitar_dias = implode(",", array_values($deshabilitar_dias));
        $horarios = AcademiaHorariosDisponible::where('activo', '=', 1)->get();
        $locaciones = array();

        foreach ($horarios as $key => $horario) {
            $datos_tarifas['horario'][$horario->academia_horario->edad_inicio] = array('edad_inicio' => $horario->academia_horario->edad_inicio, 'edad_fin' => $horario->academia_horario->edad_fin, 'hora' => $horario->academia_horario->hora_inicio.' - '.$horario->academia_horario->hora_fin);
            $locaciones[$horario->locaciones_id] = $horario->locacion;
        }

        $datos_tarifas['edad_inicio'] = $configuraciones['Edad minima'];
        return view('adminlte::academia.prueba', array('locaciones' => $locaciones, 'tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas, 'dias_deshabilitados' => $deshabilitar_dias));
    }

    public function inscripcionacademia(){
        $preguntas = InformacionAdicional::all();
        $configuraciones = Funciones::configuracion_academia();
        $preguntas = InformacionAdicional::all();
        $tallas = Funciones::tallas();
        $tipos_pago = Funciones::tipos_pago();
        $datos_tarifas = array();
        $dias_de_clases = explode(",", $configuraciones['Dias de clases']);
        $dias_semana = array(1,2,3,4,5,6,0);
        $deshabilitar_dias = array_diff($dias_semana, $dias_de_clases);
        $deshabilitar_dias = implode(",", array_values($deshabilitar_dias));
        $horarios = AcademiaHorariosDisponible::where('activo', '=', 1)->get();
        $tarifas = AcademiaTarifa::where('activo', '=', 1)->get();
        $locaciones = array();
        $datos_tarifas['edad_inicio'] = $configuraciones['Edad minima'];

        $horarios_academia = array();

        $dias_semana_desc = Funciones::descripcion_semana();
        $datos_tarifas['edades'] = array();
        $datos_tarifas['tarifas'] = $tarifas;
        $datos_tarifas['descuento'] = $configuraciones['Descuento mas de 1'];
        $datos_tarifas['clase_diaria'] = $configuraciones['Clase por dia'];
        
        foreach ($horarios as $key => $horario) {
            $datos_tarifas['edades'][$horario->academia_horario->edad_inicio.'_'.$horario->academia_horario->edad_fin] = "";
            $datos_tarifas['horario'][$horario->academia_horario->edad_inicio] = array('edad_inicio' => $horario->academia_horario->edad_inicio, 'edad_fin' => $horario->academia_horario->edad_fin, 'hora' => $horario->academia_horario->hora_inicio.' - '.$horario->academia_horario->hora_fin);
            
            //$tarifas[$horario->locaciones_id][$horario->academia_horario->edad_inicio.'_'.$horario->academia_horario->edad_fin][$horario->id] = $horario->academia_tarifa;
            $horarios_academia[$horario->locaciones_id][$horario->locacion->ubicacion][$horario->academia_horario->edad_inicio.'_'.$horario->academia_horario->edad_fin] = array('edad_inicio' => $horario->academia_horario->edad_inicio, 'edad_fin' => $horario->academia_horario->edad_fin, 'hora' => $horario->academia_horario->hora_inicio.' - '.$horario->academia_horario->hora_fin, 'tarifas' => $tarifas[$horario->locaciones_id][$horario->academia_horario->edad_inicio.'_'.$horario->academia_horario->edad_fin]);
        }

        return view('adminlte::academia.inscripcion', array('locaciones' => $locaciones, 'tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas, 'horarios' => $horarios_academia, 'dias_de_clases' => $dias_de_clases, 'dias_semana_desc' => $dias_semana_desc, 'tipos_pago' => $tipos_pago));
    }

    public function registrarprueba(Request $request){

        try {
            $cantidad_alumnos = count($request->form_atleta);
            $atletas_registrados = array();
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

                $representante->atletas()->sync($atleta_reg->id, false);

                InscripcionesAcademia::create([ 
                    'atletas_id' => $atleta_reg->id,
                    'fecha_inscripcion' => date('Y-m-d'),
                    'estatus' => 'Prueba',
                    'prueba_fecha' => $atleta["fecha_prueba"],
                    'locaciones_id' => $atleta["locacion_prueba"],
                    'activo' => 1
                ]);

                $edad_atleta = Carbon::parse($atleta["fecha_nacimiento"])->age;
                $horarios = AcademiaHorariosDisponible::where('activo', '=', 1)->where('locaciones_id', '=', $atleta["locacion_prueba"])->get();
                $ubicacion = '';

                foreach ($horarios as $key => $horario) {
                    if($horario->locaciones_id == $atleta["locacion_prueba"]){
                        $ubicacion = $horario->locacion->ubicacion;
                    }
                    
                    if(($edad_atleta >= $horario->academia_horario->edad_inicio) && ($edad_atleta <= $horario->academia_horario->edad_fin)){
                        $h = $horario->academia_horario->hora_inicio.' - '.$horario->academia_horario->hora_fin;
                    }
                }
                $atletas_registrados[] = array('nombre' => $atleta["nombre"].' '.$atleta["apellido"], 'edad' => $edad_atleta, 'fecha_prueba' => $atleta["fecha_prueba"], 'locacion' => $ubicacion, 'horario' => $h);
            }

            $msg = 'Proceso finalizado con éxito, te esperamos en la academia.';
            $status = true;
        } catch (Exception $e) {
            $msg = $e;
            $status = false;
        }

        return view('adminlte::academia.inscripcion_finalizada', array('message' => $msg, 'status' => $status, 'atletas_registrados' => $atletas_registrados));
    }

    public function dashboardprueba(){
        $inscritos_prueba = Funciones::inscritos_academia('Prueba');
        return view('adminlte::academia.dashboard_prueba', array('inscritos_prueba' => $inscritos_prueba));
    }

    public function dashboard(){
        $inscritos = Funciones::inscritos_academia('Regular');
        return view('adminlte::academia.dashboard', array('inscritos' => $inscritos));
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
            $atletas_registrados = array();
            
            if(isset($request->factura["tipo_pago"])){
                $tipo_pago = $request->factura["tipo_pago"];
            }else{
                $tipo_pago = 'Efectivo';
            }

            $representante = Representante::firstOrCreate(['cedula' => $request->representante["cedula"]], [ 
                'cedula' => $request->representante["cedula"],
                'nombres' => $request->representante["nombres"],
                'apellidos' => $request->representante["apellidos"],
                'telf_contacto' => $request->representante["telf_contacto"],
                'email' => $request->representante["email"],
                'red_social' => $request->representante["red_social"],
            ]);

            $cantidad_atletas = count($request->form_atleta);
            
            $fecha_actual = date('Y-m-d');

            $factura = AcademiaFactura::create([
                'representantes_id' => $representante->id,
                'fecha' => $fecha_actual,
                'subtotal' => $request->factura["subtotal"],
                'descuento' => $request->factura["descuento"],
                'total' => $request->factura["total"],
                'status' => 'Pendiente',
                'tipo_pago' => $tipo_pago
            ]);
        
            for ($i=0; $i < $cantidad_atletas; $i++) { 
                $atleta = $request->form_atleta[$i];
                $uniformes = 1;
                $edad_atleta = Carbon::parse($atleta["fecha_nacimiento"])->age;
                $horario = AcademiaHorario::where('edad_inicio', '<=', $edad_atleta)->where('edad_fin', '>=', $edad_atleta)->get();
                
                if($atleta["cedula"] != ""){
                    $atleta_reg = Atleta::firstOrCreate(['cedula' => $atleta["cedula"]], [ 
                        'cedula' => $atleta["cedula"],
                        'nombre' => $atleta["nombre"],
                        'apellido' => $atleta["apellido"],
                        'genero' => $atleta["genero"],
                        'fecha_nacimiento' => $atleta["fecha_nacimiento"],
                        'telf_contacto' => $atleta["telf_contacto"],
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
                        'telf_contacto' => $atleta["telf_contacto"],
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
                if(($atleta["talla_top"] == "0") && ($atleta["talla_camiseta"] == "0")){
                    $uniformes = 0;
                }

                $inscripcion = InscripcionesAcademia::create([
                    'atletas_id' => $atleta_reg->id,
                    'fecha_inscripcion' => $fecha_actual,
                    'estatus' => 'Regular',
                    'locaciones_id' => $atleta["locacion_academia"],
                    'uniformes' => $uniformes,
                    'activo' => 1,
                ]);

                $matricula = AcademiaMatricula::create([
                    'inscripciones_academia_id' => $inscripcion->id,
                    'academia_horarios_id' => $horario[0]->id,
                    'fecha' => $fecha_actual,
                    'cantd_clases' => $atleta["cantd_clases"],
                    'mes' => date('m'),
                    'anyo' => date('Y'),
                    'dias_asistencia' => $atleta["dias_horario"],
                    'codigo_dupla' => NULL,
                    'activo' => 1
                ]);

                $detalles_factura = AcademiaDetallesFactura::create([
                    'academia_factura_id' => $factura->id,
                    'inscripciones_academia_id' => $inscripcion->id,
                    'pago' => $atleta["tarifa"]
                ]);

                $atletas_registrados[] = array('nombre' => $atleta["nombre"].' '.$atleta["apellido"], 'edad' => $edad_atleta, 'locacion' => $atleta["locacion_academia"], 'fecha_prueba' => $fecha_actual, 'horario' => $horario[0]->hora_inicio.' - '.$horario[0]->hora_fin);
            }
            
            $msg = 'Proceso finalizado con éxito, te esperamos en la academia.';
            $status = true;
        } catch (Exception $e) {
            $msg = $e;
            $status = false;
        }

        return view('adminlte::academia.inscripcion_finalizada', array('message' => $msg, 'status' => $status, 'atletas_registrados' => $atletas_registrados));
    }

    public function asistencia(){
        $modalidad = array('Academia' => 'Academia', 'Prueba' => 'Prueba');
        $locacion = Locacion::all()->pluck('ubicacion', 'id');
        $horario = AcademiaHorario::select(DB::raw("CONCAT(hora_inicio, ' - ', hora_fin) AS horario"),'id')->pluck('horario', 'id');
        $dias_semana_desc = Funciones::descripcion_semana();
        return view('adminlte::academia.asistencia', array('modalidades' => $modalidad, 'locaciones' => $locacion, 'horarios' => $horario, 'dias_semana' => $dias_semana_desc));
    }

    public function cargar_asistencia(Request $request){
        $modalidad = $request->modalidad;
        $mes = date('m');
        $anyo = date('Y');
        $locacion = $request->locacion;
        $horario = $request->horario;
        $dias_semana_desc = Funciones::descripcion_semana();
        $asistencia_dia = array();
        $error_message = "";
        $asistencia = array();
        $title = "";
        $dia_consultado = $request->dia_actual;
        $asistencia_no_regular = array();
        $asistencia_reg = array();
        $asistencia_x_dia = array();

        if((isset($request->fecha_asistencia)) && ($request->fecha_asistencia != "")){
            $fecha = explode('-', $request->fecha_asistencia);
            $dia_consultado = Carbon::createFromFormat('Y-m-d', $request->fecha_asistencia)->dayOfWeek;
            $title = $dias_semana_desc[$dia_consultado].' '.Carbon::createFromFormat('Y-m-d', $request->fecha_asistencia)->format('d-m-Y');
            $mes = $fecha[1];
            $anyo = $fecha[0];
            $fecha_asistencia = $request->fecha_asistencia;
        }else{
            $fecha_asistencia = date('Y-m-d');
        }

        $atletas = Funciones::asistencia($modalidad, $mes, $anyo, $locacion, $horario);
        $asistencia_registrada = AcademiaAsistencia::where('fecha', '=', $fecha_asistencia)->where('locaciones_id', '=', $locacion)->where('academia_horarios_id', '=', $horario)->where('modalidad', '=', $modalidad)->get();

        foreach ($asistencia_registrada as $key => $asistente) {
            $asistencia_reg[] = $asistente->atletas_id;
        }

        if(count($atletas) > 0){
            if($modalidad == 'Academia'){
                foreach ($atletas as $key => $info) {
                    $dias = explode(',', $info->dias_asistencia);
                    
                    for ($t=0; $t < count($dias); $t++) { 
                        $asistencia_x_dia[$dias[$t]][$info->id] = $info;
                        if($dias[$t] == $dia_consultado){
                            $asistencia = $asistencia_x_dia[$dias[$t]];
                        }
                    }
                    if(!array_key_exists($info->id, $asistencia)){
                        $asistencia_no_regular[$info->id] = $info;
                    }
                }
                //dd($asistencia, $asistencia_no_regular, $asistencia_x_dia);
                if(count($asistencia) == 0){
                    $error_message = 'No hay atletas inscritos para este día';
                }

            }else{
                $asistencia = $atletas;
            }
            
        }else{
            $error_message = 'No hay registros para su consulta';
        }

        return Response::json(array('atletas' => $asistencia, 'error_message' => $error_message, 'title' => $title, 'asistencia_no_regular' => $asistencia_no_regular, 'asistencia_reg' => $asistencia_reg));
    }

    public function guardar_asistencia(Request $request){
        if(isset($request->fecha_asistencia)){
            $fecha_asistencia = $request->fecha_asistencia;
        }else{
            $fecha_asistencia = date('Y-m-d');
        }
        
        $fecha = explode('-', $fecha_asistencia);

        $modalidad = $request->modalidad;
        $locacion = $request->locacion;
        $horario = $request->horario;
        $asistencia = $request->asistencia;

        $asistencia_registrada = AcademiaAsistencia::where('fecha', '=', $fecha_asistencia)->where('locaciones_id', '=', $locacion)->where('academia_horarios_id', '=', $horario)->get();
        //dd($asistencia, $asistencia_registrada);

        foreach ($asistencia_registrada as $key => $asistencia_r) {
            if(!in_array($asistencia_r->atletas_id, $asistencia)){
                $item = AcademiaAsistencia::findOrFail($asistencia_r->id);
                $item->delete();
            }
        }

        for ($i=0; $i < count($asistencia); $i++) { 
            AcademiaAsistencia::updateOrCreate([
                'atletas_id' => $asistencia[$i],
                'fecha' => $fecha_asistencia,
            ], [
                'users_id' => Auth::id(),
                'atletas_id' => $asistencia[$i],
                'fecha' => $fecha_asistencia,
                'mes' => $fecha[1],
                'anyo' => $fecha[0],
                'locaciones_id' => $locacion,
                'academia_horarios_id' => $horario,
                'modalidad' => $modalidad
            ]);
        }

        return redirect()->route('academia.dashboard');
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
