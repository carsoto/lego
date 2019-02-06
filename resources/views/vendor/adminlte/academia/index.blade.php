@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Academia
@endsection

@section('content')

<!-- Your Page Content Here -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="text-center">
                        <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">
                        <h4 style="font-family: Verdana;">Te invitamos a recibir una clase totalmente <span class="label label-danger">GRATUITA</span> antes de inscribirte en nuestra ACADEMIA</h4>    
                    </div>
                    <div class="text-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-bottom: 20px;"><a href="{{ route('academia.inscripcion_prueba') }}" class="btn btn-primary">Tomar clase de prueba</a></div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="padding-bottom: 20px;"><a href="{{ route('academia.inscripcion') }}" class="btn btn-success">Ingresar a la academia</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
