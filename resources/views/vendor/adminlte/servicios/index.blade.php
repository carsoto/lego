@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Ficha de Registro
@endsection

@section('content')
<body>
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				{!! Form::open(['route' => 'servicios.store']) !!}
					<div class="box box-default">
						<div class="box-body">
							<div class="text-center"><h4>NUESTROS SERVICIOS</h4></div>
							<hr>
							@foreach($servicios AS $key => $servicio)
				        		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					        		<div class="box box-{{ $clases[$key] }}">
										<div class="box-body">
											{{ $servicio->descripcion }}
										</div>
										<div class="box-footer">
											<div class="pull-right">
												{!! Form::submit('Regístrate', array('class' => 'btn btn-'.$clases[$key])) !!}	
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</body>
@stop