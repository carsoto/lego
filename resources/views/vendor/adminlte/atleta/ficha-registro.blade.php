<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ficha-atleta" style="padding-top: 15px;">
	@include('adminlte::atleta.informacion-atleta', ['tallas' => $tallas, 'redes_sociales' => $redes_sociales, 'preguntas' => $preguntas])
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="informacion-adicional" style="padding-top: 15px;">
	@include('adminlte::atleta.informacion-adicional', ['preguntas' => $preguntas])	
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="ficha-representante" style="display: none;">
	@include('adminlte::representante.form', ['representante' => $representante, 'redes_sociales' => $redes_sociales])	
</div>
