@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Clase de prueba
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
                            <h3 style="font-family: Verdana;">¡Inscríbete en tu primera clase es totalmente <span class="label label-success">GRATIS</span>!</h3>
                        </div>
                        
                        {!! Form::open(['route' => 'academia.inscripcion.prueba', 'role' => 'form', 'id' => 'form-inscripcion']) !!}
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                @include('adminlte::atleta.registro-ninos', ['tallas' => $tallas, 'preguntas' => $preguntas, 'datos_tarifas' => $datos_tarifas, 'servicio' => 'Prueba Academia', 'dias_deshabilitados' => $dias_deshabilitados])
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-danger btn-md" type="submit" style="display: none;" id="button-datos-sig">Registrar</button>
                            </div>
                         {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop