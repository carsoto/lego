<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservaConfiguracion;
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
        $tarifa_adicional_hora = Funciones::configuracion_reserva('Tarifa por persona adicional');
        $min_personas = Funciones::configuracion_reserva('Cantidad de personas por tarifa');

        for ($i=$h_inicio; $i <= $h_fin; $i++) { 
            $horas[$i] = $i.':00';
        }

        return view('adminlte::alquiler.index', ['horas' => $horas, 'cantd_canchas' => $cantd_canchas, 'tarifa_standard_hora' => $tarifa_standard_hora, 'tarifa_adicional_hora' => $tarifa_adicional_hora, 'min_personas' => $min_personas]);
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

    public function buscardisponibilidad(Request $request){
        $request->fecha_reserva;
        $request->h_inicio;
        $request->h_fin;
        $status = 'disponible';
        return Response::json(array('status' => $status));
    }
}
