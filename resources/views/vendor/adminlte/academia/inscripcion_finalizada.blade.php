@extends('adminlte::layouts.allpublic')

@section('htmlheader_title')
    Academia
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
                            El horario está determinado por la aplicación en base a la edad del atleta...

                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Fecha</th>
                                        <th>Locación</th>
                                        <th>Horario</th>
                                    </thead>
                                    <tbody>
                                        @foreach($atletas_registrados AS $key => $atleta)
                                            <tr>
                                                <td>{{ $atleta['nombre'] }}</td>
                                                <td>{{ $atleta['edad'] }} años</td>
                                                <td>{{ $atleta['fecha_prueba'] }}</td>
                                                <td>{{ $atleta['locacion'] }}</td>
                                                <td>{{ $atleta['horario'] }}</td>
                                            </tr>  
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
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

                        @include('adminlte::layouts.datos_pago')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop