@if (Session::has('message-inf-adicional'))
	<div class="alert alert-success">{{ Session::get('message-inf-adicional') }}</div>
@endif

<h4>Información adicional</h4>
@foreach($preguntas AS $key => $informacion_adicional)
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding: 5px;">
		<div style="height: 60px; padding-bottom: 10px;">{!! Form::label('pregunta', ucfirst($informacion_adicional->pregunta)) !!}</div>
		{!! Form::textarea('atleta[respuestas]['.$informacion_adicional->id.']', null, array('class' => 'form-control input-sm', 'style' => 'resize: none;', 'rows' => '3', 'id' => 'atleta_respuesta_'.$informacion_adicional->id)) !!}
	</div>
@endforeach