@foreach($horarios AS $key => $locacion)
    @foreach($locacion AS $key1 => $horario)
        <div id="ubicacion-{{ $key }}" style="display: none;">
	    	@foreach($horario AS $rango_edad => $value)
	    		<div class="horario-{{ $value["edad_inicio"] }}" style="padding-bottom: 10px; display: none;">
	    			@if($value["edad_fin"] != 100)
	    				<strong>Horario <span class="label label-info">{{ $value["hora"] }}</span> para edades comprendidas entre <span class="label label-primary">{{ $value["edad_inicio"] }} años</span> y <span class="label label-primary">{{ $value["edad_fin"] }} años</span></strong>
    				@else
    					<strong>Horario <span class="label label-info">{{ $value["hora"] }}</span> para edades mayor a <span class="label label-primary">{{ $value["edad_inicio"] }} años</span></strong>
    				@endif
		    		<table class="table">
						<thead>
							<th><i class="fa fa-gears"></i></th>
							<th>Frecuencia</th>
							<th>C. de clases</th>
							<th>Dias</th>
							<th>T. individual</th>
							<th>T. dupla</th>
					    </thead>
					    <tbody>
		        		@foreach($value['tarifas'] AS $clave => $t)
		        			<tr>
								<td><input type="radio" name="check_horario_{{ $value["edad_inicio"] }}" value="{{ $clave }}" onclick="test();"></td>
								<td>{{ $t->frecuencia }}</td>
								<td>{{ $t->cant_clases }}</td>
								<td>
									@for ($i=0; $i < count($dias_de_clases); $i++)
										<input type="checkbox" name="check_dias_horario_{{ $value["edad_inicio"] }}" value="{{ $dias_de_clases[$i] }}" style="padding-right: 10px;"> {{ $dias_semana_desc[$dias_de_clases[$i]] }}
									@endfor
								</td>
								<td>$ {{ number_format($t->tarifa_individual, 2, '.', '') }}</td>
								<td>$ {{ number_format($t->tarifa_dupla, 2, '.', '') }}</td>
							</tr>
		        		@endforeach
		        		</tbody>
					</table>
				</div>
	        @endforeach  
	    </div>
    @endforeach
@endforeach