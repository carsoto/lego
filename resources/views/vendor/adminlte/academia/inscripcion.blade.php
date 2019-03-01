@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Academia
@endsection

@section('content')
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="box box-danger">
                    <div class="box-body">
                        <div style="text-align: center;">
                            <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">
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
                        {!! Form::open(['route' => 'academia.inscripcion', 'role' => 'form', 'id' => 'form-inscripcion']) !!}
                            <div class="row setup-content" id="step-1">
                                @include('adminlte::atleta.registro-ninos', ['tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas, 'servicio' => 'Academia', 'horarios' => $horarios, 'locaciones' => $locaciones, 'dias_de_clases' => $dias_de_clases, 'dias_semana_desc' => $dias_semana_desc])
                                <div class="col-lg-12">
                                    <button class="btn btn-danger btn-flat nextBtn btn-md pull-right" type="button" style="display: none;" id="button-datos-sig">Siguiente <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>

                            <div class="row setup-content" id="step-2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @include('adminlte::academia.resumen_pago')

                                    <div class="pull-right">
                                        <button class="btn btn-danger btn-flat btn-md" type="submit">Inscribir</button>    
                                    </div>
                                    
                                </div>
                            </div>
                            
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop