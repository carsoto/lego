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
							@include('adminlte::atleta.ficha-registro', ['atleta' => $atleta, 'respresentante' => $representante, 'redes_sociales' => $redes_sociales])
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