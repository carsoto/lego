<div class="text-center"><h4>Seleccionar</h4></div>
<input type="hidden" name="dias_no_academia" id="dias_no_academia" value="{{ $dias_deshabilitados }}"> 

<div class="col-lg-6" style="padding: 5px;">
    {!! Form::label('locacion_prueba', 'Locación') !!}<strong><span style='color: red;'>*</span></strong>

    <div class="iradio icheck">
    @foreach($locaciones AS $key => $locacion)
        <label>
            <input value="{{ $locacion->id }}" type="radio" name="atleta[locacion_prueba]"> {{ $locacion->ubicacion }}
        </label>
    @endforeach
    </div>
</div>

<div class="col-lg-6" style="padding: 5px;">

    {!! Form::label('fecha_prueba', 'Fecha de prueba') !!}<strong><span style='color: red;'>*</span></strong>

    {!! Form::text('atleta[fecha_prueba]', null, array('class' => 'form-control input-sm datepicker-academia', 'id' => 'atleta_fecha_prueba', 'readonly'=>"readonly", "style" => "background: white;")) !!}

</div>





