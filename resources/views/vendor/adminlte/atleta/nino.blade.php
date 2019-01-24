<div class="col-lg-3 col-md-3" style="padding: 5px;">

	{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}<strong><span style='color: red;'>*</span></strong>

	{!! Form::text('atleta[fecha_nacimiento]', null, array('class' => 'form-control input-sm datepicker-nac', 'id' => 'atleta_fecha_nacimiento', 'readonly'=>"readonly", "style" => "background: white;")) !!}

</div>


<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="padding: 5px;">

	{!! Form::label('nombres', 'Nombres') !!}<strong><span style='color: red;'>*</span></strong>

	{!! Form::text('atleta[nombre]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_nombre')) !!}

</div>

<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="padding: 5px;">

	{!! Form::label('apellidos', 'Apellidos') !!}<strong><span style='color: red;'>*</span></strong>

	{!! Form::text('atleta[apellido]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_apellido')) !!}

</div>



<div class="col-lg-3 col-md-3 col-sm-4" style="padding: 5px;">

	{!! Form::label('cedula', 'Cédula') !!}<!--<strong><span id="ced-atleta" style='color: red;'>*</span></strong>-->

	{!! Form::text('atleta[cedula]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_cedula', 'onKeyPress'=>"return soloNumeros(event)")) !!}

</div>



<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="padding: 5px;">

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



<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12" style="padding: 5px;">

	{!! Form::label('institucion', 'Colegio') !!}<strong><span id="instituto-atleta" style='color: red;'>*</span></strong>

	{!! Form::text('atleta[institucion]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_instituto')) !!}

</div>



<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12" style="padding: 5px;">

	{!! Form::label('talla-top', 'Talla top') !!}

	{!! Form::select('atleta[talla_top]', $tallas, null, array('class' => 'form-control input-sm', 'id' => 'atleta_talla_top')) !!}

</div>



<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12" style="padding: 5px;">

	{!! Form::label('talla-camiseta', 'Talla camiseta') !!}

	{!! Form::select('atleta[talla_camiseta]', $tallas, null, array('class' => 'form-control input-sm', 'id' => 'atleta_talla_camiseta')) !!}

</div>



<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12" style="padding: 5px;">

    {!! Form::label('red_social', 'Instagram/Facebook') !!}<!--<strong><span id="red-social-atleta" style='color: red;'>*</span></strong>-->

    {!! Form::text('atleta[red_social]', null, array('class' => 'form-control input-sm', 'id' => 'atleta_red_social')) !!}

</div>