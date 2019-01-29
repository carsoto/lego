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
                                {!! Form::text('reserva_fecha', null, array('class' => 'form-control input-sm datepicker-reserva', 'id' => 'reserva_fecha_alquiler', 'readonly'=>"readonly", "style" => "background: white;")) !!}
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                {!! Form::label('hora_inicio', 'Hora de inicio') !!}<strong><span style='color: red;'>*</span></strong>
                                {!! Form::select('reserva_hora_inicio', $horas_inicio, null, array('class' => 'form-control input-sm', 'id' => 'reserva_hora_inicio')) !!}
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                {!! Form::label('hora_fin_alquiler', 'Hora de fin') !!}<strong><span style='color: red;'>*</span></strong>
                                {!! Form::select('reserva_hora_fin', $horas_fin, null, array('class' => 'form-control input-sm', 'id' => 'reserva_hora_fin')) !!}
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-top: 4px;">
                                <br>
                                <button class="btn btn-sm btn-block btn-danger" type="button" onclick="disponibilidad_reserva();"><i class="fa fa-search"></i> BUSCAR DISPONIBILIDAD</button>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br>
                            </div>

                            <div id="form-alquiler-canchas" style="display: none;">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                                    <h3 style="font-family: Verdana;">Datos del responsable</h3>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('cedula', 'Cédula') !!}<strong><span id="ced-partner" style='color: red;'>*</span></strong>
                                    {!! Form::text('responsable[cedula]', null, array('class' => 'form-control input-sm', 'id' => 'responsable_cedula', 'onKeyPress'=>"return soloNumeros(event)")) !!}
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('nombres', 'Nombres') !!}<strong><span style='color: red;'>*</span></strong>
                                    {!! Form::text('responsable[nombre]', null, array('class' => 'form-control input-sm', 'id' => 'responsable_nombre')) !!}
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('apellidos', 'Apellidos') !!}<strong><span style='color: red;'>*</span></strong>
                                    {!! Form::text('responsable[apellido]', null, array('class' => 'form-control input-sm', 'id' => 'responsable_apellido')) !!}
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('genero', 'Género') !!}<strong><span style='color: red;'>*</span></strong>
                                    <div class="iradio icheck">
                                        <label style="padding-right: 20px;">
                                            <input value="Femenino" type="radio" name="responsable_genero" checked> Femenino
                                        </label>
                                        <label>
                                            <input value="Masculino" type="radio" name="responsable_genero"> Masculino
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('telefono', 'Teléfono') !!}
                                    {!! Form::text('responsable[telefono]', null, array('class' => 'form-control input-sm', 'id' => 'responsable_telefono')) !!}
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('red_social', 'Instagram/Facebook') !!}
                                    {!! Form::text('responsable[red_social]', null, array('class' => 'form-control input-sm', 'id' => 'responsable_red_social')) !!}
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <br>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                                    <h3 style="font-family: Verdana;">Datos de los acompañantes</h3>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('cedula', 'Cédula') !!}<strong><span id="ced-partner" style='color: red;'>*</span></strong>
                                    {!! Form::text('partner[cedula]', null, array('class' => 'form-control input-sm', 'id' => 'partner_cedula', 'onKeyPress'=>"return soloNumeros(event)")) !!}
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('nombres', 'Nombres') !!}<strong><span style='color: red;'>*</span></strong>
                                    {!! Form::text('partner[nombre]', null, array('class' => 'form-control input-sm', 'id' => 'partner_nombre')) !!}
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('apellidos', 'Apellidos') !!}<strong><span style='color: red;'>*</span></strong>
                                    {!! Form::text('partner[apellido]', null, array('class' => 'form-control input-sm', 'id' => 'partner_apellido')) !!}
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('genero', 'Género') !!}<strong><span style='color: red;'>*</span></strong>
                                    <div class="iradio icheck">
                                        <label style="padding-right: 20px;">
                                            <input value="Femenino" type="radio" name="partner_genero" checked> Femenino
                                        </label>
                                        <label>
                                            <input value="Masculino" type="radio" name="partner_genero"> Masculino
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('telefono', 'Teléfono') !!}
                                    {!! Form::text('partner[telefono]', null, array('class' => 'form-control input-sm', 'id' => 'partner_telefono')) !!}
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
                                    {!! Form::label('red_social', 'Instagram/Facebook') !!}
                                    {!! Form::text('partner[red_social]', null, array('class' => 'form-control input-sm', 'id' => 'partner_red_social')) !!}
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding-top: 9px;">
                                    <br>
                                    <button class="btn btn-sm btn-block btn-primary"><i class="fa fa-plus"></i> AGREGAR ACOMPAÑANTE</button>
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

