@if (Session::has('message-inf-adicional'))
	<div class="alert alert-success">{{ Session::get('message-inf-adicional') }}</div>
@endif

<h4>Información adicional</h4>
@foreach($preguntas AS $key => $informacion_adicional)
	<div class="col-lg-4 col-md-4 col-sm-3" style="padding: 5px;">
		<div style="height: 50px; padding-bottom: 10px;">{!! Form::label('pregunta', ucfirst($informacion_adicional->pregunta)) !!}</div>
		{!! Form::textarea('atleta[respuestas]['.$informacion_adicional->id.']', null, array('class' => 'form-control input-sm', 'style' => 'resize: none;', 'rows' => '5')) !!}
	</div>
@endforeach