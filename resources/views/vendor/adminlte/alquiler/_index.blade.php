@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Alquiler
@endsection

@section('content')
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="text-center">
                            <div style="text-align: center;">
                                <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">
                                <h3 style="font-family: Verdana;">¡LEGO BEACH VOLLEY!</h3>
                                <img src="{{ asset('public/images/en_construccion.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop

