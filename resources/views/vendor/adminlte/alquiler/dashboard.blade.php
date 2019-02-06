@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Alquiler
@endsection

@section('contentheader_title')
    Alquiler
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row"> 
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="table-responsive" style="padding-top: 15px;">
                        <table id='tabla_alquiler' class="table table-hover table-bordered table-striped datatable" style="width:100%; font-size: 11px;">
                            <thead>
                                <tr>
                                    <th>Locación</th>
                                    <th>Responsable</th>
                                    <th>C. de personas</th>
                                    <th>Fecha</th>
                                    <th>H. inicio</th>
                                    <th>H. fin</th>
                                    <th>C. de horas</th>
                                    <th># Cancha</th>
                                    <th>Pago</th>
                                    <th>Estatus</th>
                                    <th><i class="fa fa-gears"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alquileres AS $key => $alquiler)
                                    <tr>
                                        <td>{{ $alquiler->locacion->ubicacion }}</td>
                                        <td>
                                            <?php
                                                foreach ($alquiler->invitados as $key => $i) {
                                                    if($i->pivot->responsable){
                                                        $responsable = $alquiler->invitados->where('id', '=', $i->pivot->invitados_id);
                                                        $responsable = $responsable[0];
                                                        echo $responsable->nombres.' '.$responsable->apellidos;
                                                    }
                                                }
                                            ?>  
                                        </td>
                                        <td>{{ count($alquiler->invitados) }}</td>
                                        <td>{{ Carbon\Carbon::parse($alquiler->fecha)->format('d-m-Y') }}</td>
                                        <td>{{ $alquiler->hora_inicio }}</td>
                                        <td>{{ $alquiler->hora_fin }}</td>
                                        <td>
                                            <?php
                                                $horaInicio = new DateTime($alquiler->hora_inicio);
                                                $horaTermino = new DateTime($alquiler->hora_fin);

                                                $interval = $horaInicio->diff($horaTermino);
                                                echo $interval->h;
                                            ?>
                                        </td>
                                        <td>{{ $alquiler->cancha }}</td>
                                        <td>$ {{ number_format($alquiler->pago, 2, '.', '') }}</td>
                                        <td>
                                            @if($alquiler->status == 'Pendiente')
                                                <span id="status_{{ $alquiler->id }}" class="label label-warning">{{ $alquiler->status }}</span>
                                            @elseif($alquiler->status == 'Cancelado')
                                                <span id="status_{{ $alquiler->id }}" class="label label-danger">{{ $alquiler->status }}</span>
                                            @elseif($alquiler->status == 'Pagado')
                                                <span id="status_{{ $alquiler->id }}" class="label label-success">{{ $alquiler->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($alquiler->status == 'Pendiente')
                                                <span id='link_{{ $alquiler->id }}'><a href="#" onclick="registrar_pago_alquiler('{{ encrypt($alquiler->id) }}', {{ $alquiler->id }});"><i class="fa fa-dollar"></i></a></span>
                                            @else
                                                -
                                            @endif
                                        </td>
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