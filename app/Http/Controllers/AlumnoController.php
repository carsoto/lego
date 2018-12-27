<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function registroinicio(){
        return view('adminlte::alumnos.ficha-registro');
    }

    public function store(Request $request){

    }
}
