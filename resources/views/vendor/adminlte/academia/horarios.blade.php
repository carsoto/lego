<h4>Seleccionar</h4>
<div class="col-lg-6 col-md-6">
	{!! Form::label('locacion', 'Locación') !!}<strong><span style='color: red;'>*</span></strong>
	<br>
	@foreach($horarios AS $key => $locacion)
	    @foreach($locacion AS $key1 => $horario)
	        <input type="radio" name="check_ubicacion_academia" value="{{ $key }}"> {{ $key1 }}
	    @endforeach
	@endforeach	
</div>

<div class="col-lg-6 col-md-6">
	{!! Form::label('dias', 'Días de clase') !!}<strong><span style='color: red;'>*</span></strong>
	<br>
	@for ($i=0; $i < count($dias_de_clases); $i++)
		<input type="checkbox" name="check_dias_horario[]" value="{{ $dias_de_clases[$i] }}" style="padding-right: 10px;"> {{ $dias_semana_desc[$dias_de_clases[$i]] }}
	@endfor	
</div>