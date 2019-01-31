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
                        <a href="{{ route('academia.inscripcion_prueba') }}" class="btn btn-primary">Clase de prueba</a>
                        <a href="{{ route('academia.inscripcion') }}" class="btn btn-success">Academia</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
