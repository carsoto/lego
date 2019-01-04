@if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ficha-atleta">
	<h4>Ficha de Atleta</h4>
	<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
		{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}<strong><span style='color: red;'>*</span></strong>
		{!! Form::text('fecha_nacimiento', null, array('class' => 'form-control input-sm datepicker-nac', 'id' => 'fecha_nacimiento', 'readonly'=>"readonly")) !!}
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
		{!! Form::label('nombres', 'Nombres') !!}<strong><span style='color: red;'>*</span></strong>
		{!! Form::text('nombres', null, array('class' => 'form-control input-sm')) !!}
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
		{!! Form::label('apellidos', 'Apellidos') !!}<strong><span style='color: red;'>*</span></strong>
		{!! Form::text('apellidos', null, array('class' => 'form-control input-sm')) !!}
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
		{!! Form::label('cedula', 'Cédula') !!}<strong><span id="ced-atleta" style='color: red;'>*</span></strong>
		{!! Form::text('cedula', null, array('class' => 'form-control input-sm')) !!}
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
		{!! Form::label('genero', 'Género') !!}<strong><span style='color: red;'>*</span></strong>
		<div class="iradio icheck">
	    	<label style="padding-right: 20px;">
	            <input value="Femenino" type="radio" name="genero"> Femenino
	        </label>
	        <label>
	            <input value="Masculino" type="radio" name="genero"> Masculino
	        </label>
	    </div>
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
		{!! Form::label('direccion', 'Dirección') !!}<strong><span id="direccion-atleta" style='color: red;'>*</span></strong>
		{!! Form::text('direccion', null, array('class' => 'form-control input-sm')) !!}
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
		{!! Form::label('telf_contacto', 'Teléfono de contacto') !!}<strong><span id="telf-contacto-atleta" style='color: red;'>*</span></strong>
		{!! Form::text('telf_contacto', null, array('class' => 'form-control input-sm')) !!}
	</div>

	<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
		{!! Form::label('institucion', 'Colegio') !!}<strong><span id="colegio-atleta" style='color: red;'>*</span></strong>
		{!! Form::text('institucion', null, array('class' => 'form-control input-sm')) !!}
	</div>
	
	@foreach($redes_sociales AS $key => $red_social)
		<div class="col-lg-4 col-md-4 col-sm-3" style="padding: 5px;">
			{!! Form::label(strtolower($red_social->descripcion), ucfirst($red_social->descripcion)) !!}
			<div class="input-group input-group-sm">
				<span class="input-group-btn">
		          {{ Form::button('<i class="fa '.strtolower($red_social->icono).'"></i>', ['type' => 'button', 'class' => 'btn btn-default btn-flat'] )  }}
		        </span>
		    	{!! Form::text(strtolower($red_social->descripcion), null, array('class' => 'form-control input-sm', 'placeholder' => ucfirst($red_social->descripcion))) !!}
		    </div>
		</div>
	@endforeach
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ficha-representante" style="display: none;">
	@include('adminlte::representante.form', ['representante' => $representante, 'redes_sociales' => $redes_sociales])	
</div>