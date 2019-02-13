<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locacion;
use App\InformacionAdicional;
use App\Representante;
use App\Atleta;
use App\AtletasInformacionAdicional;
use App\InscripcionesAcademia;
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
        $dias_de_clases = explode(",", Funciones::configuracion_academia('Prueba', 'Dias de clases'));
        $dias_semana = array(1,2,3,4,5,6,0);
        $deshabilitar_dias = array_diff($dias_semana, $dias_de_clases);
        $deshabilitar_dias = implode(",", array_values($deshabilitar_dias));

        foreach($locaciones AS $key => $locacion){
            if(count($locacion->academia_horarios()->where('activo', '=', 1)->get()) > 0){
                foreach($locacion->academia_horarios()->where('activo', '=', 1)->get() AS $key => $horario){
                    $datos_tarifas[] = array('horario_id' => $horario->id, 'locacion_id' => $horario->locaciones_id, 'locacion' => $locacion->ubicacion, 'edad_inicio' => $horario->edad_inicio, 'edad_fin' => $horario->edad_fin, 'horario' => $horario->hora_inicio.' - '.$horario->hora_fin);
                }
            }
        }

        return view('adminlte::academia.prueba', array('locaciones' => $locaciones, 'tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas, 'dias_deshabilitados' => $deshabilitar_dias));
    }

    public function inscripcionacademia(){
        $locaciones = Locacion::where('activo', '=', 1)->get();
        $preguntas = InformacionAdicional::all();
        $tallas = Funciones::tallas();
        $datos_tarifas = array();

        return view('adminlte::academia.inscripcion', array('locaciones' => $locaciones, 'tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas));
    }

    public function registrarprueba(Request $request){
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

                $representante->atletas()->sync($atleta_reg->id, false);

                InscripcionesAcademia::create([ 
                    'atletas_id' => $atleta_reg->id,
                    'fecha_inscripcion' => date('Y-m-d'),
                    'estatus' => 'Prueba',
                    'prueba_fecha' => $atleta["fecha_prueba"],
                    'prueba_horario_id' => $atleta["horario_prueba"],
                    'activo' => 1
                ]);
            }
            $msg = 'Proceso finalizado con éxito, te esperamos en la academia.';
            $status = true;
        } catch (Exception $e) {
            $msg = $e;
            $status = false;
        }

        return view('adminlte::academia.inscripcion_finalizada', array('message' => $msg, 'status' => $status));
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
