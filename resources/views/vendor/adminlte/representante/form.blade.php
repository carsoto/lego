<div class="form-group col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">

	{!! Form::label('cedula', 'Cédula', array('class' => 'control-label')) !!}<strong><span style='color: red;'>*</span></strong>

	{!! Form::text('representante[cedula]', null, array('class' => 'form-control input-sm', 'required' => 'required', 'onKeyPress'=>"return soloNumeros(event)", 'id' => 'representante-cedula')) !!}

</div>

<div class="form-group col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">

	{!! Form::label('nombres', 'Nombres', array('class' => 'control-label')) !!}<strong><span style='color: red;'>*</span></strong>

	{!! Form::text('representante[nombres]', null, array('class' => 'form-control input-sm', 'required' => 'required', 'id' => 'representante-nombre')) !!}

</div>



<div class="form-group col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">

	{!! Form::label('apellidos', 'Apellidos', array('class' => 'control-label')) !!}<strong><span style='color: red;'>*</span></strong>

	{!! Form::text('representante[apellidos]', null, array('class' => 'form-control input-sm', 'required' => 'required', 'id' => 'representante-apellido')) !!}

</div>



<div class="form-group col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">

	{!! Form::label('telf_contacto', 'Teléfono de contacto', array('class' => 'control-label')) !!}<strong><span style='color: red;'>*</span></strong>

	{!! Form::text('representante[telf_contacto]', null, array('class' => 'form-control input-sm', 'required' => 'required', 'onKeyPress'=>"return soloNumeros(event)", 'id' => 'representante-telefono')) !!}

</div>



<div class="form-group col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">

	{!! Form::label('email', 'Correo electrónico', array('class' => 'control-label')) !!}<strong><span style='color: red;'>*</span></strong>

	{!! Form::text('representante[email]', null, array('class' => 'form-control input-sm', 'required' => 'required', 'id' => 'representante-email')) !!}

</div>



<div class="form-group col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">

    {!! Form::label('red_social', 'Instagram/Facebook', array('class' => 'control-label')) !!}<strong><span id="red-social-representante" style='color: red;'>*</span></strong>

    {!! Form::text('representante[red_social]', null, array('class' => 'form-control input-sm', 'id' => 'representante-red-social', 'required' => 'required')) !!}

</div>