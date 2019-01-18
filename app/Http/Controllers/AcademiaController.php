<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Atleta;
use App\Representante;
use App\InformacionAdicional;

class AcademiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representante = new Representante();
        $atleta = new Atleta();
        //$redes_sociales = RedesSociales::where('activo', '=', 1)->get();
        $preguntas = InformacionAdicional::all();
        $tallas = array('0' => 'Seleccionar talla', '32' => '32', '34' => '34', '36' => '36', '38' => '38', '40' => '40', '42' => '42');

        return view('adminlte::academia.index', array('representante' => $representante, 'atleta' => $atleta, 'preguntas' => $preguntas, 'tallas' => $tallas));
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
