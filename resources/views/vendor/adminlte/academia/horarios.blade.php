@foreach($locaciones AS $key => $locacion)
    <div id="ubicacion-{{ $locacion->id }}" style="display: none;">
        @if(count($locacion->academia_horarios()->where('activo', '=', 1)->get()) > 0)

            <strong>Te esperamos en </strong><span class="label label-info"><strong>{{ $locacion->ubicacion }}</span> del </strong>
            
            @foreach($locacion->academia_horarios()->where('activo', '=', 1)->get() AS $key => $horario)
              

                
            @endforeach
        @endif
    </div>
@endforeach