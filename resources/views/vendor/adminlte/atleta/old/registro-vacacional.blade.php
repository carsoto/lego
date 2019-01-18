<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
    {!! Form::label('genero', 'Género') !!}<strong><span style='color: red;'>*</span></strong>
    <div class="iradio icheck">
        <label style="padding-right: 20px;">
            <input value="Femenino" type="radio" name="atleta[genero]" checked> Femenino
        </label>
        <label>
            <input value="Masculino" type="radio" name="atleta[genero]"> Masculino
        </label>
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
    {!! Form::label('cedula', 'Cédula') !!}<strong><span id="ced-atleta" style='color: red;'>*</span></strong>
    {!! Form::text('atleta[cedula]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-cedula')) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
    {!! Form::label('nombres', 'Nombre y Apellido') !!}<strong><span style='color: red;'>*</span></strong>
    {!! Form::text('atleta[nombre]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-nombre')) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
    {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}<strong><span style='color: red;'>*</span></strong>
    {!! Form::text('atleta[fecha_nacimiento]', null, array('class' => 'form-control input-sm datepicker-nac', 'id' => 'atleta-fecha-nacimiento', 'style' => 'background-color: #fff;', 'readonly'=>"readonly")) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
    {!! Form::label('telf_contacto', 'Teléfono de contacto') !!}<strong><span id="telf-contacto-atleta" style='color: red;'>*</span></strong>
    {!! Form::text('atleta[telf_contacto]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-telefono')) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="padding: 5px;">
    {!! Form::label('red_social', 'Instagram/Facebook') !!}<strong><span id="red-social-atleta" style='color: red;'>*</span></strong>
    {!! Form::text('atleta[red_social]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-red-social')) !!}
</div>