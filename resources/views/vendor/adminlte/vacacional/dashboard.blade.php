@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Vacacional
@endsection

@section('contentheader_title')
    Vacacional
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row"> 
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="table-responsive" style="padding-top: 15px;">
                        <table id='tabla_vacacional' class="table table-hover table-bordered table-striped datatable" style="width:100%; font-size: 11px;">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan='8'>INSCRITOS</th>
                                </tr>
                                <tr>
                                    <th>Representante</th>
                                    <th>Alumno</th>
                                    <th>F. de nacimiento</th>
                                    <th>Edad</th>
                                    <th>F. de inscripción</th>
                                    <th>Colegio</th>
                                    <th>Horario</th>
                                    <th>Locación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inscritos AS $key => $inscrito)
                                    <tr>
                                        <td>{{ $inscrito->representante }}</td>
                                        <td>{{ $inscrito->alumno }}</td>
                                        <td>{{ Carbon\Carbon::parse($inscrito->fecha_nacimiento)->format('d-m-Y') }}</td>
                                        <td>{{ $inscrito->edad }} años</td>
                                        <td>{{ Carbon\Carbon::parse($inscrito->fecha_inscripcion)->format('d-m-Y') }}</td>
                                        <td>{{ $inscrito->colegio }}</td>
                                        <td>{{ $inscrito->horario }}</td>
                                        <td>{{ $inscrito->locacion }}</td>
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
</div>
@stop