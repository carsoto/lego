@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Academia
@endsection

@section('contentheader_title')
    Academia
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row"> 
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="table-responsive" style="padding-top: 15px;">
                        <table id='tabla_academia_pruebas' class="table table-hover table-bordered table-striped datatable" style="width:100%; font-size: 11px;">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan='8'>REGULARES</th>
                                </tr>
                                <tr>
                                    <th>Representante</th>
                                    <th>Alumno</th>
                                    <th>Edad</th>
                                    <th>Colegio</th>
                                    <th>F. de prueba</th>
                                    <th>Horario</th>
                                    <th>Locación</th>
                                    <th><i class="fa fa-gears"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inscritos AS $key => $inscrito)
                                    <tr>
                                        <td>{{ ucwords($inscrito->representante) }}</td>
                                        <td>{{ ucwords($inscrito->alumno) }}</td>
                                        <td>{{ $inscrito->edad }} años</td>
                                        <td>{{ ucwords($inscrito->colegio) }}</td>
                                        <td>{{ Carbon\Carbon::parse($inscrito->prueba_fecha)->format('d-m-Y') }}</td>
                                        <td>{{ $inscrito->horario }}</td>
                                        <td>{{ $inscrito->locacion }}</td>
                                        <td><a href="#"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop