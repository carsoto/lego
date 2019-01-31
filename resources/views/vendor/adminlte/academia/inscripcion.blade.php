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
                            <a href="{{ url('/home') }}">
                                <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">
                            </a>
                            <h3 style="font-family: Verdana;">¡Bienvenidos a nuestra ACADEMIA!</h3>    
                        </div>
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-1" type="button" class="btn nextBtn btn-danger btn-circle">1</a>
                                    <p>Registro</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn nextBtn btn-default btn-circle" disabled="disabled">2</a>
                                    <p>Finalizar</p>
                                </div>
                            </div>
                        </div>
                        {!! Form::open(['route' => 'vacacional.store', 'role' => 'form', 'id' => 'form-inscripcion']) !!}
                            <div class="row setup-content" id="step-1">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @include('adminlte::atleta.registro-ninos', ['tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas])
                                    <button class="btn btn-danger nextBtn btn-md pull-right" type="button" style="display: none;" id="button-datos-sig">Siguiente <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="text-center"><h3> Locación </h3></div>
                                    <hr>
                                    
                                    <!--<div class="text-center">
                                        @foreach($locaciones AS $key => $locacion)
                                            @if(count($locacion->vacacional()->where('activo', '=', 1)->get()) > 0)
                                                <input type="radio" name="check_ubicacion_vacacional" value="{{ $locacion->id }}"> {{ $locacion->ubicacion }}    
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="text-center"><h3> Horarios </h3></div>
                                    <hr>

                                    @include('adminlte::vacacional.horarios', ['locaciones' => $locaciones])
                                    
                                    <div id="resumen_pago" style="display: none; padding-top-top: 40px;">
                                        @include('adminlte::layouts.datos_pago')
                                    </div>-->

                                    <div class="pull-right">
                                        <button class="btn btn-danger btn-md" type="submit">Inscribir</button>    
                                    </div>
                                    
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
