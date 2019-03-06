<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservaConfiguracion;
use App\Alquiler;
use App\Invitado;
use App\Locacion;
use Funciones;
use Response;
use DB;

class AlquilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $h_inicio = Funciones::configuracion_reserva('Hora inicio');
        $h_fin = Funciones::configuracion_reserva('Hora fin');
        $cantd_canchas = Funciones::configuracion_reserva('Cantidad de canchas');
        $tarifa_standard_hora = Funciones::configuracion_reserva('Tarifa por hora');
        $min_personas = Funciones::configuracion_reserva('Cantidad de personas por tarifa');
		$id_locaciones = Funciones::configuracion_reserva('Locaciones');
		$id_locaciones = explode(',', $id_locaciones);

		$locaciones = Locacion::whereIn('id', $id_locaciones)->get();

        for ($i=$h_inicio; $i <= $h_fin; $i++) { 
            $horas[$i] = $i.':00';
        }

        return view('adminlte::alquiler.index', ['horas' => $horas, 'cantd_canchas' => $cantd_canchas, 'tarifa_standard_hora' => $tarifa_standard_hora, 'min_personas' => $min_personas, 'locaciones' => $locaciones]);
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
        $tarifa_standard_hora = Funciones::configuracion_reserva('Tarifa por hora');
        $cantd_horas = $request->reserva_hora_fin - $request->reserva_hora_inicio;
        $arr_invitados = $request->form_guest;
        $pago = ((count($arr_invitados) + 1) * $tarifa_standard_hora) * $cantd_horas;

        $reserva = Alquiler::create([
            'fecha' => $request->reserva_fecha,
            'locaciones_id' => $request->reserva_locacion,
            'hora_inicio' => $request->reserva_hora_inicio.':00',
            'hora_fin' => $request->reserva_hora_fin.':00',
            'cancha' => $request->cancha_asignada,
            'status'=> 'Pendiente',
            'pago'=> $pago
        ]);

        $responsable = Invitado::firstOrCreate([
            'cedula' => $request->responsable["cedula"],
            'nombres' => $request->responsable["nombre"],
            'apellidos' => $request->responsable["apellido"],
            'email' => $request->responsable["email"],
            'telefono' => $request->responsable["telefono"],
            'red_social' => $request->responsable["red_social"],
            'activo' => 1
        ]);

        $reg_responsable = [
            $responsable->id => [
                'responsable' => 1,
            ]
        ];

        $reserva->invitados()->sync($reg_responsable, false);

        for ($i=1; $i <= count($arr_invitados); $i++) { 
            $invitado = Invitado::firstOrCreate([
                'cedula' => $arr_invitados[$i]["cedula"],
                'nombres' => $arr_invitados[$i]["nombre"],
                'apellidos' => $arr_invitados[$i]["apellido"],
                'email' => $arr_invitados[$i]["email"],
                'telefono' => $arr_invitados[$i]["telefono"],
                'red_social' => $arr_invitados[$i]["red_social"],
                'activo' => 1
            ]);

            $reserva->invitados()->sync($invitado->id, false);
        }
        $message = 'Ya registramos tu reservación, recuerda que el pago debe hacerse al menos una hora antes del inicio de tu reserva de lo contrario será cancelada';
        return view('adminlte::alquiler.alquiler_finalizado', ['message' => $message, 'status' => 'success']);
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

    public function buscardisponibilidad(Request $request){
        $reservas = Alquiler::where('fecha', '=', $request->fecha_reserva)->where('locaciones_id', '=', $request->locacion)->get();
        //dd(count($reservas));
        $cantd_canchas = Funciones::configuracion_reserva('Cantidad de canchas');
        //dd($cantd_canchas);
        $canchas_ocupadas = array();
        $cancha = 0;
        
        if(count($reservas) > 0){
            foreach ($reservas as $key => $reserva) {
                
                if ($reserva->hora_inicio == $request->h_inicio) {
                    array_push($canchas_ocupadas, $reserva->cancha);
                }else if($request->h_inicio < $reserva->hora_fin){
                    array_push($canchas_ocupadas, $reserva->cancha);
                }else if(($request->h_inicio > $reserva->hora_inicio) && ($request->h_inicio < $reserva->hora_fin)){
                    array_push($canchas_ocupadas, $reserva->cancha);
                }
            }

            if(count($canchas_ocupadas) == $cantd_canchas){
                $cancha = 0;
                $status = 'no disponible';
            }else{
                do{
                    $cancha = rand(1, $cantd_canchas);
                }while(in_array($cancha, $canchas_ocupadas));
                $status = 'disponible';
            }
            
        }else{
            $cancha = 1;
            $status = 'disponible';
        }
        return Response::json(array('status' => $status, 'cancha' => $cancha));
    }

    public function dashboard(){
        //$alquileres = Alquiler::where(DB::raw('MONTH(fecha)'), '=', date('m'))->get();
        $alquileres = Alquiler::all();
        return view('adminlte::alquiler.dashboard', ['alquileres' => $alquileres]);
    }

    public function registrarpago($idalquiler){
        $alquiler = Alquiler::findOrFail(decrypt($idalquiler));
        $alquiler->status = 'Pagado';

        if($alquiler->save()){
            $status = 'success';
            $msg = 'El pago fue registrado exitosamente!';
        } else {
            $status = 'failed';
            $msg = 'Disculpe, el pago no pudo ser registrado!';
        }    

        return Response::json(array('status' => $status, 'msg' => $msg));
    }

    public function detallesalquiler($idalquiler){
        $alquiler = Alquiler::findOrFail(decrypt($idalquiler));
        return view('adminlte::alquiler.detalles',['alquiler' => $alquiler]);
    }
}
