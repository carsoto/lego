
@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Academia
@endsection

@section('content')

<!-- Your Page Content Here -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="text-center">
                        <div style="text-align: center;">
                            <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">
                            <h3 style="font-family: Verdana;">¡Disfruta de una clase GRATUITA!</h3>    
                        </div>
                        {!! Form::open(['route' => 'vacacional.store', 'role' => 'form', 'id' => 'form-inscripcion']) !!}
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @include('adminlte::atleta.registro-ninos-prueba', ['tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas, 'locaciones' => $locaciones])
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
