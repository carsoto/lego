@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Asistencia
@endsection

@section('contentheader_title')
    Asistencia <span id="asistencia_desc_dia_fecha">{{ $dias_semana[Carbon\Carbon::now()->dayOfWeek] }} {{ date('d-m-Y') }}</span>
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row"> 
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-body">
                    {!! Form::open(['route' => 'academia.guardar.asistencia', 'role' => 'form', 'id' => 'form-asistencia']) !!}
                        {{csrf_field()}}
                        
                        @if(Auth::user()->hasRole('admin'))
                            <div class="form-group col-lg-2">
                                {!! Form::text('fecha_asistencia', null, array('id' => 'asistencia_fecha', 'class' => 'form-control input-sm datepicker', 'placeholder' => 'SELECCIONAR FECHA', 'autocomplete' => 'off')) !!}
                            </div>
                            <div class="form-group col-lg-3">
                                {!! Form::select('modalidad', $modalidades, null, array('id' => 'asistencia_modalidad', 'class' => 'form-control input-sm', 'placeholder' => 'SELECCIONAR MODALIDAD')) !!}
                            </div>
                            <div class="form-group col-lg-3">
                                {!! Form::select('locacion', $locaciones, null, array('id' => 'asistencia_locacion', 'class' => 'form-control input-sm', 'placeholder' => 'SELECCIONAR UBICACIÓN')) !!}
                            </div>
                            <div class="form-group col-lg-3">
                                {!! Form::select('horario', $horarios, null, array('id' => 'asistencia_horario', 'class' => 'form-control input-sm', 'placeholder' => 'SELECCIONAR HORARIO')) !!}
                            </div>
                            <div class="form-group col-lg-1">
                                <button type="button" class="btn btn-block btn-sm btn-flat btn-primary" onclick="listado_asistencia();"><i class="fa fa-refresh"></i></button>
                            </div>
                        @else
                            <div class="form-group col-lg-3">
                                {!! Form::select('modalidad', $modalidades, null, array('id' => 'asistencia_modalidad', 'class' => 'form-control input-sm', 'placeholder' => 'SELECCIONAR MODALIDAD')) !!}
                            </div>
                            <div class="form-group col-lg-3">
                                {!! Form::select('locacion', $locaciones, null, array('id' => 'asistencia_locacion', 'class' => 'form-control input-sm', 'placeholder' => 'SELECCIONAR UBICACIÓN')) !!}
                            </div>
                            <div class="form-group col-lg-3">
                                {!! Form::select('horario', $horarios, null, array('id' => 'asistencia_horario', 'class' => 'form-control input-sm', 'placeholder' => 'SELECCIONAR HORARIO')) !!}
                            </div>
                            <div class="form-group col-lg-3">
                                <button type="button" class="btn btn-block btn-sm btn-flat btn-primary" onclick="listado_asistencia();"><i class="fa fa-refresh"></i></button>
                            </div>
                        @endif

                        <div class="col-12 col-sm-12 col-lg-12">
                            <div id="content-tabla-asistencia" class="table-responsive" style="display: none; padding-top: 15px;">
                                <div class="form-group col-lg-4 col-md-6" style="padding: 0px;">
                                    {!! Form::select('recupera_clase', array(), null, array('id' => 'recupera-clase', 'class' => 'form-control input-sm', 'placeholder' => 'RECUPERA CLASE')) !!}
                                </div>
                                <div class="form-group col-lg-2 col-md-6" >
                                    <button type="button" class="btn btn-sm btn-flat btn-success" onclick="recuperar_clase()"><i class="fa fa-plus"></i> Agregar </button>
                                </div>
                                <br><br><br>

                                <table id='tabla-asistencia' class="table table-bordered" style="width:100%; font-size: 11px;">
                                    <thead>
                                        <tr>
                                            <th>ATLETA</th>
                                            <th>ASISTIÓ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="text-center" style="padding-bottom: 20px;">
                                    <button type="submit" class="btn btn-block btn-sm btn-flat btn-danger"><i class="fa fa-upload"></i> CARGAR ASISTENCIA </button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop