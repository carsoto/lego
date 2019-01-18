@foreach($locaciones AS $key => $locacion)

    @if(count($locacion->vacacional()->where('activo', '=', 1)->get()) > 0)

        <strong>Te esperamos en </strong><span class="label label-info"><strong>{{ $locacion->ubicacion }}</span> del </strong>

        @foreach($locacion->vacacional()->where('activo', '=', 1)->get() AS $key => $vacacional)

            <span class="label label-primary">{{ Carbon\Carbon::parse($vacacional->fecha_inicio)->format('d-m-Y') }}</span><strong> al </strong><span class="label label-success">{{ Carbon\Carbon::parse($vacacional->fecha_fin)->format('d-m-Y') }}</span>

            <table class="table">

                <thead>

                    <th><i class="fa fa-gears"></i></th>

                    <th>Hora</th>

                    <th>Duración</th>

                    <th>Tarifa (p/p)</th>

                </thead>

                <tbody>

                    @foreach($vacacional->vacacional_horarios()->where('activo', '=', 1)->get() AS $key => $horario)

                        <tr>

                            <td><input type="radio" name="check_horario_vacacional" value="{{ $horario->id }}" tarifa="{{ $horario->tarifa_ins }}" hora="{{ $horario->hora_inicio }} - {{ $horario->hora_fin }}"></td>

                            <td>{{ $horario->hora_inicio }} - {{ $horario->hora_fin }}</td>

                            <td>

                                <?php

                                    $horaInicio = new DateTime($horario->hora_inicio);

                                    $horaTermino = new DateTime($horario->hora_fin);



                                    $interval = $horaInicio->diff($horaTermino);

                                    echo $interval->format('%H horas');

                                ?>

                            </td>

                            <td>$ {{ number_format($horario->tarifa_ins, 2, '.', '') }}</td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

            <span class="label label-danger">PROMOCIÓN</span> <small>válida hasta el <strong>{{ Carbon\Carbon::parse($vacacional->fecha_limite)->format('d-m-Y') }}</strong></small>

            <ul>

                <li><span class="label label-warning">{{ $vacacional->porcentaje_individual }}%</span> de descuento en la inscripción individual sobre el valor del horario escogido</li>

                <li><span class="label label-success">{{ $vacacional->porcentaje_grupal }}%</span> de descuento para ti y 1 persona más sobre el valor del horario escogido</li>

            </ul>

        @endforeach

    @endif

@endforeach