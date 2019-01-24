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
                        <div class="text-center">
                            @foreach($locaciones AS $key => $locacion)
                                @foreach($locacion->campamentos()->where('activo', '=', 1)->get() AS $clave => $campamento)
                                    <a href="{{ route('campamento.registro', ['campamento_id' => $campamento->id]) }}" class="btn btn-primary">
                                        <h3>ÍNSCRIBETE</h3>
                                        @if($campamento->edad_fin != null)
                                            {{ $campamento->descripcion }}
                                            <br>[{{ $campamento->edad_inicio }} - {{ $campamento->edad_fin }}] años
                                        @else
                                            {{ $campamento->descripcion }}
                                            <br>[+ {{ $campamento->edad_inicio }}] años
                                        @endif
                                    </a>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@stop

