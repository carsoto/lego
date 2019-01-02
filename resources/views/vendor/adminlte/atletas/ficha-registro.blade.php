@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Ficha de Registro
@endsection

@section('content')
<body>
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				{!! Form::open(['route' => 'atleta.store']) !!}
					<div class="box box-danger">
						<div class="box-body">
							<div class="text-center"><h4>FICHA DE REGISTRO</h4></div>
							<hr>
							@if (Session::has('message'))
								<div class="alert alert-success">{{ Session::get('message') }}</div>
							@endif
							
							<div class="form-group col-sm-3">
								{!! Form::label('locacion', 'Ubicación') !!}
								<div class="iradio icheck">
								@foreach($locaciones AS $key => $locacion)
						        	<label style="padding-right: 15px;">
						        		@if($key == 0)
						        			<input value="{{ $locacion->id }}" type="radio" name="locacion" title="{{ $locacion->direccion }}" checked> {{ $locacion->ubicacion }}
						        		@else
						        			<input value="{{ $locacion->id }}" type="radio" name="locacion" title="{{ $locacion->direccion }}"> {{ $locacion->ubicacion }}
						        		@endif
						            </label>
								@endforeach
								</div>
							</div>

							<div class="form-group col-sm-3">
								{!! Form::label('modalidad', 'Modalidad') !!}
								<div class="iradio icheck">
								@foreach($deportes AS $key => $deporte)
						        	<label style="padding-right: 15px;">
						        		@if($key == 0)
						        			<input value="{{ $deporte->id }}" type="radio" name="deporte[]" checked> {{ $deporte->descripcion }}
						        		@else
						        			<input value="{{ $deporte->id }}" type="radio" name="deporte[]"> {{ $deporte->descripcion }}
						        		@endif
						            </label>
								@endforeach
								</div>
							</div>

							<div class="form-group col-sm-6">
								{!! Form::label('servicio', 'Servicio') !!}
								<div class="iradio icheck">
									@foreach($servicios AS $key => $servicio)
							        	<label style="padding-right: 15px;">
							        		@if($key == 0)
							        			<input value="{{ $servicio->id }}" type="radio" name="deporte" checked> {{ $servicio->descripcion }}
							        		@else
							        			<input value="{{ $servicio->id }}" type="radio" name="deporte"> {{ $servicio->descripcion }}
							        		@endif
							            </label>
									@endforeach
								</div>
							</div>
							
							<div class="form-group col-sm-3">
								{!! Form::label('periodo', 'Periodo') !!}
								<div class="iradio icheck">
								@foreach($periodos AS $key => $periodo)
						        	<label style="padding-right: 15px;">
						        		@if($key == 0)
						        			<input value="{{ $periodo->id }}" type="radio" name="deporte" checked> {{ $periodo->descripcion }}
						        		@else
						        			<input value="{{ $periodo->id }}" type="radio" name="deporte"> {{ $periodo->descripcion }}
						        		@endif
						            </label>
								@endforeach
								</div>
							</div>

							<div class="form-group col-sm-3">
								{!! Form::label('cantidad_de_atletas', 'Cantidad de atletas') !!}
								{!! Form::text('cantidad_de_atletas', null, array('class' => 'form-control')) !!}
							</div>

							<div class="form-group col-sm-6">
								{!! Form::label('cantidad_de_veces_por_semana', 'Cantidad de veces por semana') !!}
								{!! Form::text('cantidad_de_veces', null, array('class' => 'form-control')) !!}
							</div>

							<div class="form-group col-sm-3">
								{!! Form::label('nombres', 'Nombres') !!}
								{!! Form::text('nombres', null, array('class' => 'form-control')) !!}
							</div>

							<div class="form-group col-sm-3">
								{!! Form::label('apellidos', 'Apellidos') !!}
								{!! Form::text('apellidos', null, array('class' => 'form-control')) !!}
							</div>

							<div class="form-group col-sm-3">
								{!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
								{!! Form::text('fecha_nacimiento', null, array('class' => 'form-control datepicker-nac')) !!}
							</div>

							<div class="form-group col-sm-3">
								{!! Form::label('genero', 'Género') !!}
								<div class="iradio icheck">
						        	<label style="padding-right: 20px;">
						                <input value="Femenino" type="radio" name="genero"> Femenino
						            </label>
						            <label>
						                <input value="Masculino" type="radio" name="genero"> Masculino
						            </label>
						        </div>
						    </div>

						    <div class="form-group col-sm-3">
								{!! Form::label('direccion', 'Dirección') !!}
								{!! Form::textarea('direccion', null, array('class' => 'form-control')) !!}
						    </div>
						</div>
						<div class="box-footer">
							<div class="pull-right">
								<button class="btn btn-danger" type="submit"><strong>Registrar</strong> <img src="{{ asset('public/images/gif-pelota.gif') }}" width="30px"></button>	
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</body>
@stop