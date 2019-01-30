@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Vacacional
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