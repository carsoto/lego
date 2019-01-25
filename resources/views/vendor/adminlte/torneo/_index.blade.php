@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Torneos
@endsection

@section('content')
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="text-center">
                            <br>SELECCIONAR TORNEO
                            <br>SELECCIONAR CATEGORIA
                            @foreach($locaciones AS $key => $locacion)
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop

