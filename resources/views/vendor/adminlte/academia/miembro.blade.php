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
                                    <p>Buscar datos</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn nextBtn btn-default btn-circle" disabled="disabled">2</a>
                                    <p>Finalizar</p>
                                </div>
                            </div>
                        </div>

                        {!! Form::open(['route' => 'academia.update', 'role' => 'form', 'id' => 'form-update-inscripcion']) !!}
                            {{csrf_field()}}

                            <div class="row setup-content" id="step-1">

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    {!! Form::label('cedula', 'Cedula') !!}<strong><span style='color: red;'>*</span></strong>
                                    {!! Form::text('cedula', null, array('class' => 'form-control input-sm', 'id' => 'cedula_rep_registrado')) !!}
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-top: 4px;">
                                    <br>
                                    <button class="btn btn-sm btn-flat btn-block btn-danger" type="button" onclick="buscarRegistros();"><i class="fa fa-refresh"></i> CARGAR DATOS</button>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 15px;">
                                    @include("adminlte::representante.form")    
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 15px;">
                                    <div class="col-xs">
                                        <div class="table-responsive">
                                            <table id="lista-atletas-registrados" class="table table-bordered" style="font-size: 11px;">
                                                <thead>
                                                    <th colspan="7" class="text-center"> ATLETAS REGISTRADOS </th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Fecha de nac.</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Cédula</th>
                                                        <th>Locación</th>
                                                        <th>Días</th>
                                                        <th><i class="fa fa-gears"></i></th>
                                                    </tr>
                                                </tbody>
                                            </table>    
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-danger btn-flat nextBtn btn-md pull-right" type="button" style="display: none;" id="button-datos-sig">Siguiente <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>

                            <div class="row setup-content" id="step-2">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    @include('adminlte::academia.resumen_pago', ['tipos_pago' => $tipos_pago])

                                    <div class="pull-right">
                                        <button class="btn btn-danger btn-flat btn-md" type="submit">Guardar</button>    
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