<input type="hidden" name="dias_no_academia" id="dias_no_academia" value="{{ $dias_deshabilitados }}"> 

<div class="col-lg-6 col-md-6" style="padding: 5px;">

    {!! Form::label('fecha_prueba', 'Fecha de prueba') !!}<strong><span style='color: red;'>*</span></strong>

    {!! Form::text('atleta[fecha_prueba]', null, array('class' => 'form-control input-sm datepicker-academia', 'id' => 'atleta_fecha_prueba', 'readonly'=>"readonly", "style" => "background: white;")) !!}

</div>

<div class="col-lg-6 col-md-6" style="padding: 5px;">

    {!! Form::label('horario_prueba', 'Horario') !!}<strong><span style='color: red;'>*</span></strong>
    
    <select name="atleta[horario_prueba]" class="form-control input-sm" id="atleta_horario_prueba">
        @foreach($locaciones AS $key => $locacion)
            @if(count($locacion->academia_horarios()->where('activo', '=', 1)->get()) > 0)
                @foreach($locacion->academia_horarios()->where('activo', '=', 1)->get() AS $key => $horario)
                    <option edad_inicio="{{ $horario->edad_inicio }}" edad_fin="{{ $horario->edad_fin }}" value="{{ $horario->id }}">{{ $locacion->ubicacion }} ({{ $horario->hora_inicio }} - {{ $horario->hora_fin }})</option>
                @endforeach
            @endif
        @endforeach
    </select>
</div>