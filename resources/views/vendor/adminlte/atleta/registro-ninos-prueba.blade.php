<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ficha-representante">

	<div class="text-center"><h3> Información del representante </h3></div>

    <hr>

	@include('adminlte::representante.form')

</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ficha-atleta" style="padding-top: 15px;">

	<div class="text-center"><h3> Información del alumno </h3></div>

    <hr>

	@include('adminlte::atleta.nino', ['tallas' => $tallas, 'preguntas' => $preguntas])

</div>

<div class="col-lg-3 col-md-3" style="padding: 5px;">

	{!! Form::label('fecha_prueba', 'Fecha de prueba') !!}<strong><span style='color: red;'>*</span></strong>

	{!! Form::text('atleta[fecha_prueba]', null, array('class' => 'form-control input-sm datepicker', 'id' => 'atleta_fecha_prueba', 'readonly'=>"readonly", "style" => "background: white;")) !!}

</div>

<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="padding: 5px;">

	{!! Form::label('locacion', 'Locación') !!}<strong><span style='color: red;'>*</span></strong>
	<div class="iradio icheck">
		@foreach($locaciones AS $key => $locacion)
	    	<label style="padding-right: 20px;">
	            <input value="{{ $locacion->id }}" type="radio" name="prueba_locacion"> {{ $locacion->ubicacion }}
	        </label>
		@endforeach
	</div>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding: 5px;">

	{!! Form::label('hora', 'Hora') !!}<strong><span style='color: red;'>*</span></strong>

</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="text-right">

		<button type="button" class="btn btn-sm btn-primary" onclick="agregar_nino({{ $preguntas }}, {{ json_encode($datos_tarifas) }});"><i class="fa fa-plus"></i> Agregar atleta</button>

	</div>	

</div>


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 20px;">

	<div class="table table-responsive">

		<table id="lista-atletas" class="table table-bordered" style="font-size: 11px;">

			<thead>

				<th colspan="6" class="text-center"> ATLETAS AGREGADOS </th>

			</thead>

			<tbody>

				<tr>

					<th>Fecha de nac.</th>

					<th>Nombre</th>

					<th>Apellido</th>

					<th>Cédula</th>

					<th>Colegio</th>

					<th><i class="fa fa-gears"></i></th>

				</tr>

			</tbody>

		</table>	

	</div>

</div>