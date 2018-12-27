@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Ficha de Registro
@endsection

@section('content')
<body>
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				{!! Form::open(['route' => 'alumno.store']) !!}
					<div class="box box-danger">
						<div class="box-body">
							<div class="text-center"><h4>FICHA DE REGISTRO</h4></div>
							<hr>
							@if (Session::has('message'))
								<div class="alert alert-success">{{ Session::get('message') }}</div>
							@endif
							<div class="form-group col-sm-4">
								{!! Form::text('nombres', /*$alumno->name*/null, array('class' => 'form-control', 'placeholder' => 'Nombres del alumno')) !!}
							</div>
							<div class="form-group col-sm-4">
								{!! Form::text('apellidos', /*$alumno->name*/null, array('class' => 'form-control', 'placeholder' => 'Apellidos del alumno')) !!}
							</div>
							<div class="form-group col-sm-2">
								<div class="iradio icheck">
						        	<label>
						                <input value="Femenino" type="radio" name="genero"> Femenino
						            </label>
						        </div>
						    </div>
						    <div class="form-group col-sm-2">
						        <div class="iradio icheck">
						        	<label>
						                <input value="Masculino" type="radio" name="genero"> Masculino
						            </label>
						        </div>
						    </div>
						</div>
						<div class="box-footer">
							<div class="pull-right">
								<button class="btn btn-danger" type="submit">Registrar</button>	
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</body>
@stop