@if (Session::has('message-atleta'))
	<div class="alert alert-success">{{ Session::get('message-inf-atleta') }}</div>
@endif

<h4>Ficha de Atleta</h4>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding: 5px;">
	{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('atleta[fecha_nacimiento]', null, array('class' => 'form-control input-sm datepicker-nac', 'id' => 'atleta-fecha-nacimiento', 'readonly'=>"readonly")) !!}
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding: 5px;">
	{!! Form::label('nombres', 'Nombre y Apellido') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('atleta[nombre]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-nombre')) !!}
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding: 5px;">
	{!! Form::label('cedula', 'Cédula') !!}<strong><span id="ced-atleta" style='color: red;'>*</span></strong>
	{!! Form::text('atleta[cedula]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-cedula')) !!}
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding: 5px;">
	{!! Form::label('telf_contacto', 'Teléfono de contacto') !!}<strong><span id="telf-contacto-atleta" style='color: red;'>*</span></strong>
	{!! Form::text('atleta[telf_contacto]', null, array('class' => 'form-control input-sm', 'id' => 'atleta-telefono')) !!}
</div>

<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" style="padding: 5px;">
	{!! Form::label('genero', 'Género') !!}<strong><span style='color: red;'>*</span></strong>
	<div class="iradio icheck">
    	<label style="padding-right: 20px;">
            <input value="Femenino" type="radio" name="atleta[genero]"> Femenino
        </label>
        <label>
            <input value="Masculino" type="radio" name="atleta[genero]"> Masculino
        </label>
    </div>
</div>

<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" style="padding: 5px;">
	{!! Form::label('talla-top', 'Talla top') !!}
	{!! Form::select('atleta[talla_top]', $tallas, null, array('class' => 'form-control input-sm', 'id' => 'atleta-')) !!}
</div>

<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12" style="padding: 5px;">
	{!! Form::label('talla-camiseta', 'Talla camiseta') !!}
	{!! Form::select('atleta[talla_camiseta]', $tallas, null, array('class' => 'form-control input-sm', 'id' => 'atleta-')) !!}
</div>

@foreach($redes_sociales AS $key => $red_social)
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="padding: 5px;">
		{!! Form::label(strtolower($red_social->descripcion), ucfirst($red_social->descripcion)) !!}
		<div class="input-group input-group-sm">
			<span class="input-group-btn">
	          {{ Form::button('<i class="fa '.strtolower($red_social->icono).'"></i>', ['type' => 'button', 'class' => 'btn btn-default btn-flat'] )  }}
	        </span>
	    	{!! Form::text('atleta['.strtolower($red_social->descripcion).']', null, array('class' => 'form-control input-sm', 'id' => 'atleta-', 'placeholder' => ucfirst($red_social->descripcion))) !!}
	    </div>
	</div>
@endforeach