@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Campamentos
@endsection

@section('content')
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="box box-danger">
                    <div class="box-body">
                        <div style="text-align: center;">
                            <a href="{{ url('/home') }}">
                                <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">
                            </a>
                            <h3 style="font-family: Verdana;">¡Disfruta de nuestro campamento!</h3>    
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
                                <!--<div class="stepwizard-step">
                                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                    <p>Inscripción</p>
                                </div>-->
                            </div>
                        </div>
                        {!! Form::open(['route' => 'campamento.store', 'role' => 'form', 'id' => 'form-inscripcion']) !!}
                            <div class="row setup-content" id="step-1">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @include('adminlte::atleta.registro-ninos', ['tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas])
                                    <button class="btn btn-danger nextBtn btn-md pull-right" type="button" style="display: none;" id="button-datos-sig">Siguiente <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                            <div class="row setup-content" id="step-2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="text-center"><h3> Horarios </h3></div>
                                    <hr>
                                    
                                    @include('adminlte::campamento.horarios', ['locaciones' => $locaciones, 'datos_tarifa' => $datos_tarifas])
                                    
                                    <div id="resumen_pago" style="display: none; padding-top-top: 40px;">
                                        @include('adminlte::campamento.resumen_pago')
                                    </div>

                                    <div class="pull-right">
                                        <!--2<button class="btn btn-primary btn-md" type="button">Imprimir comprobante</button>-->
                                        <button class="btn btn-danger btn-md" type="submit">Inscribir</button>    
                                    </div>
                                    
                                </div>
                            </div>
                            <!--<div class="row setup-content" id="step-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center"><h3> Inscripción </h3></div>
                                        <hr>
                                       
                                        <button class="btn btn-success btn-md pull-right" type="submit">Inscribir!</button>
                                </div>
                            </div>-->
                         {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop