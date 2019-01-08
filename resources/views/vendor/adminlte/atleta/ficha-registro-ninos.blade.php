@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Ficha de Registro
@endsection

@section('content')
<body>
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-12" style="padding-top: 10px;">
				<div class="box box-danger">
					<!--{!! Form::open(['route' => 'academia.store']) !!}-->
						<div class="box-body">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ficha-representante">
								@include('adminlte::representante.form', ['representante' => $representante, 'redes_sociales' => $redes_sociales])	
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ficha-atleta" style="padding-top: 15px;">
								@include('adminlte::atleta.informacion-atleta-nino', ['tallas' => $tallas, 'redes_sociales' => $redes_sociales, 'preguntas' => $preguntas])
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="informacion-adicional" style="padding-top: 15px;">
								@include('adminlte::atleta.informacion-adicional', ['preguntas' => $preguntas])	
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="text-right">
									<button class="btn btn-success">Agregar atleta</button>
								</div>	
							</div>
						</div>
						<div class="box-footer">
							<div class="text-right">
								{!! Form::submit('Registrar', array('class' => 'btn btn-danger')) !!}	
							</div>
						</div>
					<!--{!! Form::close() !!}-->
				</div>
			</div>
		</div>
	</div>
</body>