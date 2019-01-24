<table class="table">
    <thead>
        <th><i class="fa fa-gears"></i></th>
        <th>Descripción</th>
        <th>Fechas</th>
        <th>Tarifa (p/p)</th>
    </thead>

    <tbody>
        @foreach($datos_tarifas['servicio'] AS $clave => $h)
            <tr>
                <td><input type="radio" name="check_horario" value="{{ $h['id'] }}" tarifa="{{ $h['tarifa'] }}" porc_individual="{{ $datos_tarifas['porc_individual'] }}" porc_grupal="{{ $datos_tarifas['porc_grupal'] }}" descripcion="{{ $h['descripcion'] }}"></td>
                <td>{{ $h['descripcion'] }}</td>
                <td>
                    @foreach($h['fechas'] AS $key => $f)
                        <small>{{ Carbon\Carbon::parse($f['f_inicio'])->format('d-m-Y') }} / {{ Carbon\Carbon::parse($f['f_fin'])->format('d-m-Y') }}</small><br>
                    @endforeach
                </td>
                <td>$ {{ $h['tarifa'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<span class="label label-danger">PROMOCIÓN</span> <small>válida hasta el <strong>{{ Carbon\Carbon::parse($datos_tarifas['fecha_limite'])->format('d-m-Y') }}</strong></small>

<ul>
    @if($datos_tarifas['porc_individual'] != "")
        <li><span class="label label-warning">{{ $datos_tarifas['porc_individual'] }}%</span> de descuento en la inscripción individual sobre el valor del horario escogido</li>
    @endif
    @if($datos_tarifas['porc_grupal'] != "")
        <li><span class="label label-success">{{ $datos_tarifas['porc_grupal'] }}%</span> de descuento para ti y 1 persona más sobre el valor del horario escogido</li>
    @endif
</ul>