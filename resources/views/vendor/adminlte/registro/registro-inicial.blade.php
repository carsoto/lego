@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Registro Inicial
@endsection

@section('content')
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {!! Form::open(['route' => 'registro.store']) !!}
                    <div class="box box-danger">
                        <div class="box-body">
                            <div style="text-align: center;">
                                <a href="{{ url('/home') }}">
                                    <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">
                                </a>
                                <h3>Sé parte de nuestra academia</h3>    
                            </div>
                            
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            {!! csrf_field() !!}
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                {!! Form::label('genero', 'Género') !!}<strong><span style='color: red;'>*</span></strong>
                                <div class="iradio icheck">
                                    <label style="padding-right: 20px;">
                                        <input value="Femenino" type="radio" name="atleta[genero]"> Femenino
                                    </label>
                                    <label>
                                        <input value="Masculino" type="radio" name="atleta[genero]"> Masculino
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                {!! Form::label('cedula', 'Cédula') !!}<strong><span id="ced-atleta" style='color: red;'>*</span></strong>
                                {!! Form::text('atleta[cedula]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-cedula')) !!}
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                {!! Form::label('nombres', 'Nombre y Apellido') !!}<strong><span style='color: red;'>*</span></strong>
                                {!! Form::text('atleta[nombre]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-nombre')) !!}
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="padding: 5px;">
                                {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}<strong><span style='color: red;'>*</span></strong>
                                {!! Form::text('atleta[fecha_nacimiento]', null, array('class' => 'form-control input-sm datepicker-nac', 'id' => 'atleta-fecha-nacimiento', 'style' => 'background-color: #fff;', 'readonly'=>"readonly")) !!}
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                {!! Form::label('telf_contacto', 'Teléfono de contacto') !!}<strong><span id="telf-contacto-atleta" style='color: red;'>*</span></strong>
                                {!! Form::text('atleta[telf_contacto]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-telefono')) !!}
                            </div>
                            
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                {!! Form::label('fecha_clase_prueba', 'Fecha de clase de prueba') !!}<strong><span style='color: red;'>*</span></strong>
                                {!! Form::text('atleta[fecha_clase_prueba]', null, array('class' => 'form-control input-sm datepicker', 'id' => 'atleta-fecha-clase', 'style' => 'background-color: #fff;', 'readonly'=>"readonly")) !!}
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                {!! Form::label('locacion', 'Ubicación') !!}<strong><span style='color: red;'>*</span></strong>
                                <div class="iradio icheck">
                                    @foreach($locaciones AS $key => $locacion)
                                        <label style="padding-right: 20px;">
                                            <input value="{{ $locacion->id }}" type="radio" name="locacion" title="{{ $locacion->direccion }}"> {{ $locacion->ubicacion }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;" id="select-horario">
                                
                            </div>

                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <!--<button class="btn btn-danger" type="submit"><strong>Registrar</strong></button>   -->
                                {!! Form::submit('Registrar', array('class' => 'btn btn-danger btn-block btn-flat')) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</body>
@stop