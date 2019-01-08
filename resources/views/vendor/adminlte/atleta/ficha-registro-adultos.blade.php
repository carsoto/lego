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
					{!! Form::open(['route' => 'registro.store']) !!}
						<div class="box-body">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ficha-atleta" style="padding-top: 15px;">
								@include('adminlte::atleta.informacion-atleta-adulto', ['tallas' => $tallas, 'redes_sociales' => $redes_sociales, 'preguntas' => $preguntas])
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="informacion-adicional" style="padding-top: 15px;">
								@include('adminlte::atleta.informacion-adicional', ['preguntas' => $preguntas])	
							</div>
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="text-right">
									<button type="button" class="btn btn-success" onclick="agregar_atleta('adulto');">Agregar atleta</button>
								</div>	
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 20px;">
								<table id="lista-atletas" class="table table-bordered" style="font-size: 11px;">
									<thead>
										<tr>
											<th class="text-center"> ATLETAS AGREGADOS </th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
						<div id="registrar-atleta" class="box-footer" style="display: none;">
							<div class="text-right">
								{!! Form::submit('Registrar', array('class' => 'btn btn-danger')) !!}	
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</body>