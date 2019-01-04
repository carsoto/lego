@if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
<h4>Datos del Representante</h4>
<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('cedula', 'Cédula') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('cedula', null, array('class' => 'form-control input-sm')) !!}
</div>
<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('nombres', 'Nombres') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('nombres', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('apellidos', 'Apellidos') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('apellidos', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('direccion', 'Dirección') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('direccion', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('telf_contacto', 'Teléfono de contacto') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('telf_contacto', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('email', 'Correo electrónico') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::email('email', null, array('class' => 'form-control input-sm')) !!}
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