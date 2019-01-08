@if (Session::has('message-representante'))
	<div class="alert alert-success">{{ Session::get('message-representante') }}</div>
@endif
<h4>Representante</h4>
<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
	{!! Form::label('cedula', 'Cédula') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('representante[cedula]', null, array('class' => 'form-control input-sm')) !!}
</div>
<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
	{!! Form::label('nombres', 'Nombres') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('representante[nombres]', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
	{!! Form::label('apellidos', 'Apellidos') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('representante[apellidos]', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
	{!! Form::label('telf_contacto', 'Teléfono de contacto') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('representante[telf_contacto]', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('email', 'Correo electrónico') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::email('representante[email]', null, array('class' => 'form-control input-sm')) !!}
</div>

@foreach($redes_sociales AS $key => $red_social)
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding: 5px;">
		{!! Form::label(strtolower($red_social->descripcion), ucfirst($red_social->descripcion)) !!}
		<div class="input-group input-group-sm">
			<span class="input-group-btn">
	          {{ Form::button('<i class="fa '.strtolower($red_social->icono).'"></i>', ['type' => 'button', 'class' => 'btn btn-default btn-flat'] )  }}
	        </span>
	    	{!! Form::text('representante['.strtolower($red_social->descripcion).']', null, array('class' => 'form-control input-sm', 'placeholder' => ucfirst($red_social->descripcion))) !!}
	    </div>
	</div>
@endforeach