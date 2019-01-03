
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
					<div class="box-body">
						@include('adminlte::atleta.ficha-registro')
					</div>
				</div>
			</div>
		</div>
	</div>
</body>