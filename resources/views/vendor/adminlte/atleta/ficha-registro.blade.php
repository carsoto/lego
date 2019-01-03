@if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

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
	{!! Form::label('cedula', 'Cédula') !!}<span id="ced-atleta" style='color: red;'>*</span>
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
	{!! Form::label('direccion', 'Dirección') !!}
	{!! Form::text('direccion', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
	{!! Form::label('telf_contacto', 'Teléfono de contacto') !!}<strong><span style='color: red;'>*</span></strong>
	{!! Form::text('telf_contacto', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-3 col-md-3 col-sm-3" style="padding: 5px;">
	{!! Form::label('institucion', 'Colegio') !!}<span id="colegio-atleta" style='color: red;'>*</span>
	{!! Form::text('institucion', null, array('class' => 'form-control input-sm')) !!}
</div>

<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('redse_sociales', 'Twitter') !!}
	<div class="input-group input-group-sm">
		<span class="input-group-btn">
          {{ Form::button('<i class="fa fa-twitter"></i>', ['type' => 'button', 'class' => 'btn btn-info btn-flat'] )  }}
        </span>
    	{!! Form::text('twitter', null, array('class' => 'form-control input-sm', 'placeholder' => 'Twitter')) !!}
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('redse_sociales', 'Facebook') !!}
	<div class="input-group input-group-sm">
		<span class="input-group-btn">
          {{ Form::button('<i class="fa fa-facebook"></i>', ['type' => 'button', 'class' => 'btn btn-primary btn-flat'] )  }}
        </span>
    	{!! Form::text('facebook', null, array('class' => 'form-control input-sm', 'placeholder' => 'Facebook')) !!}
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4" style="padding: 5px;">
	{!! Form::label('redse_sociales', 'Instagram') !!}
	<div class="input-group input-group-sm">
		<span class="input-group-btn">
          {{ Form::button('<i class="fa fa-instagram"></i>', ['type' => 'button', 'class' => 'btn btn-danger btn-flat'] )  }}
        </span>
    	{!! Form::text('instagram', null, array('class' => 'form-control input-sm', 'placeholder' => 'Instagram')) !!}
    </div>
</div>

<div id="ficha-representante" style="display: none;">
	FICHA DEL REPRESENTANTE
</div>