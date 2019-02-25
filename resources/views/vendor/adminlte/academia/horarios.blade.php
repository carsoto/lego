@foreach($horarios AS $key => $locacion)
    @foreach($locacion AS $key1 => $horario)
        <div id="ubicacion-{{ $key }}" style="display: none;">
	    	@foreach($horario AS $rango_edad => $value)
	    		<table class="table">
					<thead>
						<th><i class="fa fa-gears"></i></th>
						<th>Frecuencia</th>
						<th>C. de clases</th>
						<th>T. individual</th>
						<th>T. dupla</th>
				    </thead>
				    <tbody>
	        		@foreach($value['tarifas'] AS $clave => $t)
	        			<tr>
							<td><input type="radio" name="check_horario" value="{{ $clave }}"></td>
							<td>{{ $t->frecuencia }}</td>
							<td>{{ $t->cant_clases }}</td>
							<td>$ {{ number_format($t->tarifa_individual, 2, '.', '') }}</td>
							<td>$ {{ number_format($t->tarifa_dupla, 2, '.', '') }}</td>
						</tr>
	        		@endforeach
	        		</tbody>
				</table>
				<label><strong>Seleccionar días de clase</strong></label>
				<br>
				@for ($i=0; $i < count($dias_de_clases); $i++)
					<input type="checkbox" name="check_dias_horario" value="{{ $dias_de_clases[$i] }}"> {{ $dias_semana_desc[$dias_de_clases[$i]] }}
				@endfor
				<br>
	        @endforeach  
	    </div>
    @endforeach
@endforeach