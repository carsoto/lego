@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Alquiler
@endsection

@section('content')
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="box box-danger">
                    <div class="box-body">

                        <div class="text-center">
                            <div class="text-center">
                                <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">
                                <h3 style="font-family: Verdana;">¡Reserva nuestras canchas y ven a jugar con tus amigos!</h3>
                            </div>
                        </div>

                        {!! Form::open(['route' => 'alquiler.store', 'role' => 'form', 'id' => 'form-alquiler']) !!}
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                {!! Form::label('fecha_alquiler', 'Fecha de alquiler') !!}<strong><span style='color: red;'>*</span></strong>
                                {!! Form::text('atleta[fecha_nacimiento]', null, array('class' => 'form-control input-sm datepicker-nac', 'id' => 'atleta_fecha_alquiler', 'readonly'=>"readonly", "style" => "background: white;")) !!}
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                {!! Form::label('hora_inicio', 'Hora de inicio') !!}<strong><span style='color: red;'>*</span></strong>
                                {!! Form::text('atleta[hora_inicio]', null, array('class' => 'form-control input-sm datepicker-nac', 'id' => 'atleta_hora_inicio', 'readonly'=>"readonly", "style" => "background: white;")) !!}
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                {!! Form::label('hora_fin_alquiler', 'Hora de fin') !!}<strong><span style='color: red;'>*</span></strong>
                                {!! Form::text('atleta[hora_fin]', null, array('class' => 'form-control input-sm datepicker-nac', 'id' => 'atleta_hora_fin', 'readonly'=>"readonly", "style" => "background: white;")) !!}
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-top: 4px;">
                                <br>
                                <button class="btn btn-sm btn-block btn-danger"><i class="fa fa-search"></i> BUSCAR DISPONIBILIDAD</button>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br>
                            </div>

                            <div id="form-alquiler-canchas">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                                    <h3 style="font-family: Verdana;">Datos de los jugadores</h3>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('cedula', 'Cédula') !!}<strong><span id="ced-atleta" style='color: red;'>*</span></strong>
                                    {!! Form::text('atleta[cedula]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_cedula', 'onKeyPress'=>"return soloNumeros(event)")) !!}
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('nombres', 'Nombres') !!}<strong><span style='color: red;'>*</span></strong>
                                    {!! Form::text('atleta[nombre]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_nombre')) !!}
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('apellidos', 'Apellidos') !!}<strong><span style='color: red;'>*</span></strong>
                                    {!! Form::text('atleta[apellido]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_apellido')) !!}
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('genero', 'Género') !!}<strong><span style='color: red;'>*</span></strong>
                                    <div class="iradio icheck">
                                        <label style="padding-right: 20px;">
                                            <input value="Femenino" type="radio" name="atleta_genero" checked> Femenino
                                        </label>
                                        <label>
                                            <input value="Masculino" type="radio" name="atleta_genero"> Masculino
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('telefono', 'Teléfono') !!}
                                    {!! Form::text('atleta[telefono]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_telefono')) !!}
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('red_social', 'Instagram/Facebook') !!}
                                    {!! Form::text('atleta[red_social]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_red_social')) !!}
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-top: 9px;">
                                    <br>
                                    <button class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i> AGREGAR JUGADOR</button>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <br>
                                </div>

                                <div class="table table-responsive">
                                    <table id="lista-alquiler" class="table table-bordered" style="font-size: 11px;">
                                        <thead>
                                            <th colspan="6" class="text-center"> JUGADORES </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="text-center">Nombres</th>
                                                <th class="text-center">Apellidos</th>
                                                <th class="text-center">Cédula</th>
                                                <th class="text-center">Teléfono</th>
                                                <th class="text-center">Instagram/Facebook</th>
                                                <th class="text-center"><i class="fa fa-gears"></i></th>
                                            </tr>
                                            <tr>
                                                <td class="text-center">aa</td>
                                                <td class="text-center">aa</td>
                                                <td class="text-center">aa</td>
                                                <td class="text-center">aa</td>
                                                <td class="text-center">aa</td>
                                                <td class="text-center"><i class="fa fa-close"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>    
                                </div>
                                
                                <span class="label label-danger">NOTA IMPORTANTE</span>
                                <ul>
                                    <li><span class="label label-primary"> 6 personas 25$ por hora</span></li>
                                    <li><span class="label label-warning"> +6 personas valor adicional 5$ por hora</span></li>
                                </ul>
                               
                                <div class="table table-responsive">
                                    <table id="lista-alquiler" class="table table-striped" style="font-size: 11px;">
                                        <thead>
                                            <th colspan="7" class="text-center"> RESUMEN DE RESERVA </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="text-center">Cantidad de personas</th>
                                                <th class="text-center">Fecha de reserva</th>
                                                <th class="text-center">Hora de inicio</th>
                                                <th class="text-center">Hora de fin</th>
                                                <th class="text-center">Cantidad de horas</th>
                                                <th class="text-center">Valor adicional por persona</th>
                                                <th class="text-center">Valor a pagar</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">6</th>
                                                <th class="text-center">20/02/2019</th>
                                                <th class="text-center">14:00</th>
                                                <th class="text-center">15:00</th>
                                                <th class="text-center">01</th>
                                                <th class="text-center">-</th>
                                                <th class="text-center">$ 25</th>
                                            </tr>
                                        </tbody>
                                    </table>    
                                </div>

                                @include('adminlte::layouts.datos_pago')

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <br>
                                </div>

                                <button class="btn btn-sm btn-block btn-warning"><i class="fa fa-calendar"></i> RESERVAR CANCHA </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop

