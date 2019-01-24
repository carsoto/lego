@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Campamentos
@endsection

@section('content')
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="box box-danger">
                    <div class="box-body">
                        <div style="text-align: center;">
                            <!--<a href="{{ url('/home') }}">-->
                                <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">
                            <!--</a>-->
                            <h3 style="font-family: Verdana;">¡Te esperamos en LEGO!</h3>    
                        </div>
                        @if($status)
                            <div style="text-align: center;">
                                <img src="{{ asset('public/images/gif-success.gif') }}" width="120px">
                                <h3 style="font-family: Verdana;">{{ $message }}</h3>
                            </div>
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="callout callout-lego-blue">
                                    <h4>Información adicional</h4>

                                    <ul>
                                        <li><h4><strong>Ubicación:</strong> Chipipe Salinas, al lado de la base naval</h4></li>
                                        <li><h4><strong>Horario:</strong> 10:00 - 16:30</h4></li>
                                        <li><h4><strong>No olvidar traer:</strong> bloqueador, gorra, una prenda extra</h4></li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div style="text-align: center;">
                                <img src="{{ asset('public/images/fail-icon.png') }}" width="120px">
                                <h4 style="font-family: Verdana;">{{ $message }}</h4>
                            </div>
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop