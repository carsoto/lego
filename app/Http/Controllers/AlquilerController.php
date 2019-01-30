<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservaConfiguracion;
use App\ReservaAlquiler;
use App\ReservaInvitado;
use App\ReservaAlquilerInvitado;
use Funciones;
use Response;

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

        for ($i=$h_inicio; $i <= $h_fin; $i++) { 
            $horas[$i] = $i.':00';
        }

        return view('adminlte::alquiler.index', ['horas' => $horas, 'cantd_canchas' => $cantd_canchas, 'tarifa_standard_hora' => $tarifa_standard_hora, 'min_personas' => $min_personas]);
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

        $reserva = ReservaAlquiler::create([
            'fecha' => $request->reserva_fecha,
            'hora_inicio' => $request->reserva_hora_inicio.':00',
            'hora_fin' => $request->reserva_hora_fin.':00',
            'status' => 'Pendiente',
            'pago' => $pago
        ]);

        $responsable = ReservaInvitado::firstOrCreate([
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

        $reserva->reserva_alquiler_invitados()->sync($responsable->id, false);

        for ($i=1; $i <= count($arr_invitados); $i++) { 
            $invitado = ReservaInvitado::firstOrCreate([
                'cedula' => $arr_invitados[$i]["cedula"],
                'nombres' => $arr_invitados[$i]["nombre"],
                'apellidos' => $arr_invitados[$i]["apellido"],
                'email' => $arr_invitados[$i]["telefono"],
                'telefono' => $arr_invitados[$i]["email"],
                'red_social' => $arr_invitados[$i]["red_social"],
                'activo' => 1
            ]);

            $reg_invitado = [
                $invitado->id => [
                    'responsable' => 0,
                ]
            ];

            $reserva->reserva_alquiler_invitados()->sync($invitado->id, false);
        }
        $message = 'Ya registramos tu reservación, recuerda que el pago debe hacerse al menos una hora antes del inicio de tu reserva de lo contrario será cancelada';
        return view('adminlte::alquiler.index', ['message' => $message]);
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
        $request->fecha_reserva;
        $request->h_inicio;
        $request->h_fin;
        $status = 'disponible';
        return Response::json(array('status' => $status));
    }
}
