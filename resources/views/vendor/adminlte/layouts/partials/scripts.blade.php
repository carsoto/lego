<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->

<!-- Laravel App -->

<script src="{{ asset('/public/js/app.js') }}" type="text/javascript"></script>

<script src="{{ asset('/public/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/public/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/public/plugins/sweetalert/sweetalert2.all.js') }}" type="text/javascript"></script>

<script src="{{ asset('/public/js/moment.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/public/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<script src="{{ asset('/public/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>

    window.Laravel = {!! json_encode([

        'csrfToken' => csrf_token(),

    ]) !!};


    (function($) {
    	$('input').iCheck({

            checkboxClass: 'icheckbox_square-red',

            radioClass: 'iradio_square-red',

            increaseArea: '10%' // optional

        });

    	var table_user = document.getElementById('tabla_usuarios');

    	if(table_user != undefined){

	    	var datatable_usuarios = $('#tabla_usuarios').DataTable({

		        processing: true,

		        serverSide: true,

		        ajax: 'admin/usuarios/table/listado',

		        columns: [		

		            {data: 'name', name: 'name'},

		            {data: 'email', name: 'email'},

		            {data: 'role', name: 'role'},

		            {data: 'status', name: 'status'},

		            {data: 'action', name: 'action', orderable: false}

		        ]

		    });


			$(document).on('click', ".eliminar_usuario", function(e) {

		        var _this = $(this);

		        e.preventDefault();

		        swal({

		            title: "¿Está seguro?",

					text: "Una vez deshabilitado, el usuario no podrá acceder nuevamente al sistema!",

					icon: "warning",

		            showCancelButton: true,

		            confirmButtonColor: '#DD4B39',

		            cancelButtonColor: '#00C0EF',

		            buttons: ["Cancelar", true],

		            closeOnConfirm: false

		        }).then(function(isConfirm) {

		            if (isConfirm) {

						$.ajax({

				           	url: 'admin/usuarios/eliminar/'+_this.attr("data-id"),

				            dataType: "JSON",

				            type: 'GET',

				            success: function (response) {

				            	if(response.status == 'success'){

				            		swal("Hecho!", response.msg, "success");

				        			datatable_usuarios.ajax.reload();

				            	}else{

				            		swal("Ocurrió un error!", response.msg, "error");

				            	}

				            },

				            error: function (xhr, ajaxOptions, thrownError) {

				                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");

				            }
				        });

		            }

		        });

		    });	

    	}

    	/*$('.datepicker-nac').datepicker({

			language: "es",

			format: 'yyyy-mm-dd',

		    orientation: "auto left",

		    forceParse: false,

		    autoclose: true,

		    todayHighlight: true,

		    toggleActive: true,

		    endDate: "today",

		}).on('changeDate', function(e) {

			var hoy = new Date();

			var h = hoy.toJSON().slice(0,10);

			var fecha1 = moment(this.value);

			var fecha2 = moment(h);

			var edad = fecha2.diff(fecha1, 'years');

			if(edad < 18){

				document.getElementById('ficha-representante').style.display = 'block';

				document.getElementById('ficha-representante').style.paddingTop = '15px';

				document.getElementById('ced-atleta').style.display = 'none';

				document.getElementById('telf-contacto-atleta').style.display = 'none';

				document.getElementById('colegio-atleta').style.display = 'inline-block';

				document.getElementById('direccion-atleta').style.display = 'none';

			}else{

				document.getElementById('ficha-representante').style.display = 'none';

				document.getElementById('ced-atleta').style.display = 'inline-block';

				document.getElementById('telf-contacto-atleta').style.display = 'inline-block';

				document.getElementById('colegio-atleta').style.display = 'none';

				document.getElementById('direccion-atleta').style.display = 'inline-block';

			}

    	});*/

    	$('.datepicker-nac').datepicker({

			language: "es",

			format: 'yyyy-mm-dd',

		    orientation: "auto left",

		    forceParse: false,

		    autoclose: true,

		    todayHighlight: true,

		    toggleActive: true,

		    endDate: "today",

		});

    	$('.datepicker').datepicker({

			language: "es",

			format: 'yyyy-mm-dd',

		    orientation: "auto left",

		    forceParse: false,

		    autoclose: true,

		    todayHighlight: true,

		    toggleActive: true

		});

    	var fecha_actual = new Date(); 
		fecha_actual.setDate(fecha_actual.getDate()-1);

    	$('.datepicker-reserva').datepicker({
    		language: "es",

			format: 'yyyy-mm-dd',

		    orientation: "auto left",

		    forceParse: false,

		    autoclose: true,

		    todayHighlight: true,

		    toggleActive: true,

		    startDate: fecha_actual,

		    //daysOfWeekDisabled: [0],
    	});

    	var inhabilitar = $('#dias_no_academia').val();
    	if(inhabilitar != undefined){
	    	var arr_days = inhabilitar.split(",");
			var dias_no_academia = arr_days.map(function (x) { 
				return parseInt(x, 10); 
			});	
    	}else{
    		var dias_no_academia = [];
    	}
    	

    	$('.datepicker-academia').datepicker({
    		language: "es",

			format: 'yyyy-mm-dd',

		    orientation: "auto left",

		    forceParse: false,

		    autoclose: true,

		    todayHighlight: true,

		    toggleActive: true,

		    startDate: fecha_actual,

		    daysOfWeekDisabled: dias_no_academia,
    	});
		
		$('.datatable').DataTable({
            responsive: true,
            order: [[ 3, "asc" ]],
            language: {
                url: '../../public/js/datatable-spanish.json' //Ubicacion del archivo con el json del idioma.
            }
        });

		var navListItems = $('div.setup-panel div a'), allWells = $('.setup-content'), allNextBtn = $('.nextBtn');

		allWells.hide();

		navListItems.click(function (e) {

	        e.preventDefault();

	        var $target = $($(this).attr('href')),

	        	$item = $(this);

	        if (!$item.hasClass('disabled')) {

	            navListItems.removeClass('btn-danger').addClass('btn-default');

	            $item.addClass('btn-danger');

	            allWells.hide();

	            $target.show();

	            $target.find('input:eq(0)').focus();

	        }

	    });

	    allNextBtn.click(function(){

	        var curStep = $(this).closest(".setup-content"),

	            curStepBtn = curStep.attr("id"),

	            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),

	            curInputs = curStep.find("input[type='text'],input[type='url']"),

	            isValid = true;


	        $(".form-group").removeClass("has-error");

	        for(var i=0; i<curInputs.length; i++){

	            if (!curInputs[i].validity.valid){

	                isValid = false;

	                $(curInputs[i]).closest(".form-group").addClass("has-error");

	            }

	        }

	        if (isValid)

	            nextStepWizard.removeAttr('disabled').trigger('click');

	    });

    	$('div.setup-panel div a.btn-danger').trigger('click');

		$('input[name="check_horario"]').on('ifChecked', function() {

			var tarifa = $(this).attr('tarifa');

			var cantd_alumnos = $('#resumen_cantd_alumnos').text();

			var v_descuento = $('#descuento_aplicado').text();

			var subtotal = cantd_alumnos * tarifa;

			var descuento = 0;

			var total = parseInt(subtotal, 10);

			if((v_descuento != "") && (v_descuento != 'null')){

				descuento = (parseInt(subtotal, 10) * parseInt(v_descuento, 10))/100;

				total = parseInt(subtotal, 10) - parseInt(descuento, 10);

			}

			document.getElementById('pago_tarifa').value = parseInt(tarifa, 10);

			document.getElementById('pago_descuento').value = descuento;

			document.getElementById('pago_monto').value = total;

			document.getElementById('resumen_pago').style.display = "block";

			document.getElementById('resumen_horario').innerHTML = $(this).attr('descripcion');

			document.getElementById('resumen_tarifa').innerHTML = '$ ' + parseInt(tarifa, 10).toFixed(2);

			document.getElementById('resumen_subtotal').innerHTML = '$ ' + parseInt(subtotal, 10).toFixed(2);

			document.getElementById('resumen_descuento').innerHTML = '$ ' + descuento.toFixed(2);

			document.getElementById('resumen_total').innerHTML = '$ ' + total.toFixed(2);

		});

		$('input[name="check_ubicacion_vacacional"]').on('ifChecked', function() {
			document.getElementById('ubicacion-'+this.value).style.display = 'block';
		});

		$('input[name="check_ubicacion_vacacional"]').on('ifUnchecked', function() {
			document.getElementById('ubicacion-'+this.value).style.display = 'none';
		});

		$('input[name="atleta_check_uniforme"]').on('ifChecked', function() {
			if($(this).val() == "true"){
				document.getElementById('tallas-uniforme').style.display = 'block';
			}else{
				document.getElementById('tallas-uniforme').style.display = 'none';
			}
		});

		/*$('input[name="check_ubicacion_academia"]').on('ifChecked', function() {
			document.getElementById('ubicacion-'+this.value).style.display = 'block';
		});

		$('input[name="check_ubicacion_academia"]').on('ifUnchecked', function() {
			document.getElementById('ubicacion-'+this.value).style.display = 'none';
		});*/

    })(jQuery);

    /*function validarForm(){
		var datosRegistro = $("#form-inscripcion").serialize();
		var formUrl = $("#form-inscripcion").attr("action");
		$.ajax({
			type: "POST",
			url:  formUrl,
			data: datosRegistro,
			success: function(data) {
				/*$(".ConsolaErrores").show("fast");
				$(".ConsolaErrores").html(data);
				$(".ConsolaErrores").delay(15000).hide("fast");
				console.log(data);
			}
		});
    }*/

	function soloNumeros(e){

		var key = window.event ? e.which : e.keyCode;

		if (key < 48 || key > 57) {

			e.preventDefault();

		}

	}

    function formatDate(date, delimiter) {

	    var d = new Date(date),

	        month = '' + (d.getMonth() + 1),

	        day = '' + d.getDate(),

	        year = d.getFullYear();



	    if (month.length < 2) month = '0' + month;

	    if (day.length < 2) day = '0' + day;



	    return [year, month, day].join(delimiter);

	}

	function recalcular_resumen(cantidad_alumnos, fecha_limite, porc_individual, porc_grupal, servicio){

		if((servicio == 'Vacacional') || (servicio == 'Campamento')){
			$('input[name="check_horario"]').iCheck('uncheck');
			document.getElementById('resumen_pago').style.display = "none";
			document.getElementById('resumen_cantd_alumnos').innerHTML = cantidad_alumnos;

			if(cantidad_alumnos == 1){
				var hoy = new Date();
				var limite = fecha_limite;
				hoy = formatDate(hoy, '-');

				if(hoy <= limite){
					document.getElementById('tr_descuento').style.display = "";
					document.getElementById('resumen_descuento_aplicado').innerHTML = '<strong>Descuento '+ porc_individual +'%</strong>';
					document.getElementById('descuento_aplicado').innerHTML = porc_individual;
				}

			}else{
				document.getElementById('tr_descuento').style.display = "none";
				document.getElementById('descuento_aplicado').innerHTML = 0;	
				
				if(porc_grupal != null){
					document.getElementById('tr_descuento').style.display = "";
					document.getElementById('resumen_descuento_aplicado').innerHTML = '<strong>Descuento '+ porc_grupal +'%</strong>';
					document.getElementById('descuento_aplicado').innerHTML = porc_grupal;	
				}
			}
		}
		else if(servicio == 'Academia'){

		}
	}

	function calcularEdad(fecha) {

	    var hoy = new Date();

	    var cumpleanos = new Date(fecha);

	    var edad = hoy.getFullYear() - cumpleanos.getFullYear();

	    var m = hoy.getMonth() - cumpleanos.getMonth();



	    if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {

	        edad--;

	    }



	    return edad;

	}

	/*function calcularSemanaRestantes(date){
		var week_number = 0;
    	var result = date / 7;

    	if(date > 15){
    		week_number = Math.round(result);
    	} else {
    		week_number = Math.floor(result);
    	}

    	week_number = 4 - week_number;
    	if(week_number == 0){
    		week_number = 1;
    	}
    	return week_number;
	}*/

	function calcularSemanaRestantes(date){
		
		var semana = new Array();

		var week_number = 0;
    	var result = date/7;
    	var mod_result = date%7;

    	if((mod_result == 0)){
    		week_number = Math.round(result);
    	}else {
    		week_number = Math.ceil(result);
    	}

    	semana['fecha'] = date;

		semana['actual'] = week_number;

		if(week_number > 1){
			week_number = 5 - week_number;
		}else{
			week_number = 4;
		}
    	

    	semana['restantes'] = week_number;
    	
    	return semana;
	}

    function agregar_nino(preguntas, datos_tarifa, servicio){

    	var dia_actual = new Date().getDate();
    	var cantidad_alumnos = $('#lista-atletas tbody').children().length;
    	var cabecera = 1;
    	var array_form = 0;
    	var valido = true;
		var table = document.getElementById("lista-atletas");
    	var row = table.insertRow(0);

		var text1 = document.getElementById('atleta_fecha_nacimiento').value;
		var text2 = document.getElementById('atleta_nombre').value;
		var text9 = document.getElementById('atleta_apellido').value;
		var text3 = document.getElementById('atleta_cedula').value;
		//var text4 = document.querySelector('input[name="atleta_genero"]:checked').value;
		var text4 = "";
		var text5 = document.getElementById('atleta_instituto').value;
		var text8 = document.getElementById('atleta_red_social').value;
		var text10 = "";

		if(document.getElementById('atleta_telf_contacto') != undefined){
			text10 = document.getElementById('atleta_telf_contacto').value;
		}

		var error_message = '<div class="text-left">Su formulario presenta errores<ul>';

		if(text1 == ""){
			error_message += '<li>La fecha de nacimiento del atleta es obligatorio</li>';
			valido = false;

		}else{
			var edad = calcularEdad(text1);	
			if((servicio == 'Vacacional') || (servicio == 'Campamento')){
				if(datos_tarifa.edad_fin != null){
					if((edad < datos_tarifa.edad_inicio) || (edad > datos_tarifa.edad_fin)){
						error_message += '<li>El alumno no cumple con el requisito. Edad requerida: '+ datos_tarifa.edad_inicio +'-'+ datos_tarifa.edad_fin +' años.</li>';
						valido = false;
					}	
				}else{
					if((edad < datos_tarifa.edad_inicio)){
						error_message += '<li>El alumno no cumple con el requisito. Edad requerida: mayor o igual a '+ datos_tarifa.edad_inicio +' años.</li>';
						valido = false;
					}
				}
			}
			else if((servicio == 'Prueba Academia') || (servicio == 'Academia')){
				if((edad < datos_tarifa.edad_inicio)){
					error_message += '<li>El alumno no cumple con el requisito. Edad requerida: mayor o igual a '+ datos_tarifa.edad_inicio +' años.</li>';
					valido = false;
				}
			
			}
		}

		if(text2 == ""){
			error_message += '<li>El nombre del alumno es obligatorio</li>';
			valido = false;
		}

		if(text5 == ""){
			error_message += '<li>El nombre del colegio al que asiste el atleta es obligatorio</li>';
			valido = false;
		}

		if(text9 == ""){
			error_message += '<li>El apellido del alumno es obligatorio</li>';
			valido = false;
		}

		if(servicio == 'Prueba Academia'){
			var f_prueba = document.getElementById('atleta_fecha_prueba').value;
			if(f_prueba == ""){
				error_message += '<li>Debe seleccionar una fecha para su prueba</li>';
				valido = false;
			}
		}

		if(servicio == 'Academia'){
			var text6 = document.getElementById('atleta_talla_top').value;
			var text7 = document.getElementById('atleta_talla_camiseta').value;
			var locacion = document.querySelector('input[name="check_ubicacion_academia"]:checked');
			var dias = document.querySelector('input[name="check_dias_horario[]"]:checked');
			
			if(locacion == null){
				error_message += '<li>No ha seleccionado la ubicación de la academia</li>';
				valido = false;
			}

			if(dias == null){
				error_message += '<li>Debe seleccionar los días que desea la clase</li>';
				valido = false;
			}else{
				var horario_valores = new Array();
				var horario_descripciones = new Array();
				$('input[name="check_dias_horario[]"]:checked').map(function(){
					horario_valores.push($(this).val());
					horario_descripciones.push($(this).attr('descripcion'));
				});

				if(horario_valores == 1){
					error_message += '<li>Debe seleccionar al menos 2 días para las clases</li>';
					valido = false;
				}
			}
		}

		error_message += '</ul></div>';

		if(cantidad_alumnos == 1){
			array_form = 0;
		}else{
			array_form = cantidad_alumnos - cabecera;
		}

		if(valido){

			var cell1 = row.insertCell(0);
			
			if(servicio == 'Academia'){
				cell1.innerHTML = '<input type="hidden" value="'+locacion.value+'" name="form_atleta['+ array_form +'][locacion_academia]" readonly="readonly" /><input type="hidden" value="'+horario_valores.join(',')+'" name="form_atleta['+ array_form +'][dias_horario]" readonly="readonly" /><input type="hidden" value="'+text10+'" name="form_atleta['+ array_form +'][telf_contacto]" readonly="readonly" /><input value="'+text1+'" type="text" name="form_atleta['+ array_form +'][fecha_nacimiento]" style="border: 0px solid;" readonly="readonly">';
				var hora = "";

				var table_resume = document.getElementById("resumen-pago-academia");
				var row_resume = table_resume.insertRow(0);
				row_resume.id = array_form;
				row_resume.style.text_align = 'left';
				
				var cell_resume1 = row_resume.insertCell(0);
				cell_resume1.innerHTML = text9 + ', ' + text2;

				var cell_resume2 = row_resume.insertCell(1);
				cell_resume2.innerHTML = edad + ' años';

				var cell_resume3 = row_resume.insertCell(2);
				cell_resume3.innerHTML = $(locacion).attr('descripcion');

				var cell_resume4 = row_resume.insertCell(3);
				cell_resume4.innerHTML = horario_descripciones.join(' - ');

				var cell_resume5 = row_resume.insertCell(4);

				$.each(datos_tarifa.horario, function(key, horario) {
					if((parseInt(edad) >= parseInt(horario.edad_inicio)) && (parseInt(edad) <= parseInt(horario.edad_fin))){
						cell_resume5.innerHTML = horario.hora;
					}
				});

				var cell_resume6 = row_resume.insertCell(5);
				var info_semana = calcularSemanaRestantes(dia_actual);
					
				if((info_semana.actual > 0) && (info_semana.actual <= 3)){
					$.each(datos_tarifa.tarifas, function(key, tarifa) {
						if(parseInt(horario_descripciones.length) == parseInt(tarifa.cant_dias)){
							var proporcional = tarifa.tarifa_individual/4;
							proporcional = proporcional*info_semana.restantes;
							cell_resume6.innerHTML = '<input value="'+proporcional.toFixed(2)+'" type="hidden" name="form_atleta['+ array_form +'][tarifa]" style="border: 0px solid;" readonly="readonly">'+ '$ '+ proporcional.toFixed(2);
							$(cell_resume6).attr('subtotal', proporcional.toFixed(2));
						}

						$('#resumen-pago-academia tbody').append(row_resume);
						recalcularTarifaAcademia("resumen-pago-academia", dia_actual, datos_tarifa.descuento, cantidad_alumnos);
					});
				}else{
					console.log('fecha => ' + dia_actual + ' cantd_alumnos => ' + cantidad_alumnos + ' precio => PAGAR CLASES POR DÍA');
				}
			}
			
			else if(servicio == 'Prueba Academia'){
				var locacion_seleccionada = document.querySelector('input[name="atleta[locacion_prueba]"]:checked').value;
				cell1.innerHTML = '<input type="hidden" value="'+f_prueba+'" name="form_atleta['+ array_form +'][fecha_prueba]" readonly="readonly" /><input type="hidden" value="'+locacion_seleccionada+'" name="form_atleta['+ array_form +'][locacion_prueba]" readonly="readonly" /><input value="'+text1+'" type="text" name="form_atleta['+ array_form +'][fecha_nacimiento]" style="border: 0px solid;" readonly="readonly">';
			}

			else{
				cell1.innerHTML = '<input value="'+text1+'" type="text" name="form_atleta['+ array_form +'][fecha_nacimiento]" style="border: 0px solid;" readonly="readonly">';
			}
			
			var cell2 = row.insertCell(1);
			cell2.innerHTML = '<input value="'+text2+'" type="text" name="form_atleta['+ array_form +'][nombre]" style="border: 0px solid;" readonly="readonly">';

			var cell10 = row.insertCell(2);
			cell10.innerHTML = '<input value="'+text9+'" type="text" name="form_atleta['+ array_form +'][apellido]" style="border: 0px solid;" readonly="readonly">';

			var cell3 = row.insertCell(3);
			cell3.innerHTML = '<input value="'+text3+'" type="text" name="form_atleta['+ array_form +'][cedula]" style="border: 0px solid;" readonly="readonly">';

			var cell4 = row.insertCell(4);
			cell4.innerHTML = '<input value="'+text4+'" type="text" name="form_atleta['+ array_form +'][genero]" style="border: 0px solid;" readonly="readonly">';
			cell4.style.display = "none";

			var cell5 = row.insertCell(5);
			cell5.innerHTML = '<input value="'+text5+'" type="text" name="form_atleta['+ array_form +'][instituto]" style="border: 0px solid;" readonly="readonly">';

			var cell6 = row.insertCell(6);
			cell6.innerHTML = '<input value="'+text6+'" type="text" name="form_atleta['+ array_form +'][talla_top]" style="border: 0px solid;" readonly="readonly">';
			cell6.style.display = "none";

			var cell7 = row.insertCell(7);
			cell7.innerHTML = '<input value="'+text7+'" type="text" name="form_atleta['+ array_form +'][talla_camiseta]" style="border: 0px solid;" readonly="readonly">';
			cell7.style.display = "none";

			var cell8 = row.insertCell(8);
			cell8.innerHTML = '<input value="'+text8+'" type="text" name="form_atleta['+ array_form +'][red_social]" style="border: 0px solid;" readonly="readonly">';
			cell8.style.display = "none";
			var c = 8;

			for (var i = 0; i < preguntas.length; i++) {
				c++;
				var t = row.insertCell(c);
				var tt = $('#atleta_respuesta_'+preguntas[i].id).val();
				t.innerHTML = '<input value="'+tt+'" type="text" name="form_atleta['+ array_form +'][respuestas]['+preguntas[i].id+']" style="border: 0px solid;" readonly="readonly">';
				t.style.display = "none";
				$('#atleta_respuesta_'+preguntas[i].id).val('');
			}

			c++;
			var cell9 = row.insertCell(c);

			if((servicio == 'Vacacional') || (servicio == 'Campamento') || (servicio == 'Academia')){
				cell9.innerHTML = '<a href="#" name="remove" onclick="eliminar_atleta(this, \''+array_form+'\', \''+dia_actual+'\', \''+datos_tarifa.fecha_limite+'\', \''+datos_tarifa.porc_individual+'\', \''+datos_tarifa.porc_grupal+'\', \''+servicio+'\', \''+datos_tarifa.descuento+'\')"><i class="fa fa-times"></i></a>';
			}else{
				cell9.innerHTML = '<a href="#" name="remove" onclick="eliminar_invitado(this)"><i class="fa fa-times"></i></a>';
			}
			
			document.getElementById('atleta_fecha_nacimiento').value = "";
			document.getElementById('atleta_nombre').value = "";
			document.getElementById('atleta_apellido').value = "";
			document.getElementById('atleta_cedula').value = "";
			document.getElementById('atleta_instituto').value = "";
			/*document.getElementById('atleta_talla_top').value = "0";
			document.getElementById('atleta_talla_camiseta').value = "0";*/
			document.getElementById('atleta_red_social').value = "";

			if(document.getElementById('atleta_telf_contacto') != undefined){
				document.getElementById('atleta_telf_contacto').value = "";
			}

			$('#lista-atletas tbody').append(row);

			document.getElementById('button-datos-sig').style.display = "block";
			recalcular_resumen(cantidad_alumnos, datos_tarifa.fecha_limite, datos_tarifa.porc_individual, datos_tarifa.porc_grupal, servicio);
		}else{
			swal("Oops...", error_message, "error");
		}
    }

    function recalcularTarifaAcademia(id_table, date, descuento_academia, cantd_alumnos){
    	var subtotal = 0;
		var total = 0;
		var descuento = 0;

		$("table#" + id_table + " tr td").map(function () {
			var s = $(this).attr('subtotal');
			if(!isNaN(parseFloat(s)) || (s != undefined)){
				subtotal += parseFloat(s);
			}
    	});

		if(cantd_alumnos > 1){
			var info_semana = calcularSemanaRestantes(date);
			if(info_semana.actual == 1){
				if((cantd_alumnos % 2) == 1){
					var alumnos_par = cantd_alumnos - 1;
					descuento = descuento_academia * alumnos_par;
				}else{
					descuento = descuento_academia * cantd_alumnos;
				}
			}
		}

		total = subtotal - descuento;
		document.getElementById('academia_subtotal').innerHTML = '<input value="'+parseFloat(subtotal).toFixed(2)+'" type="hidden" name="factura[subtotal]" style="border: 0px solid;" readonly="readonly">$ ' + parseFloat(subtotal).toFixed(2);
		document.getElementById('academia_descuento').innerHTML = '<input value="'+parseFloat(descuento).toFixed(2)+'" type="hidden" name="factura[descuento]" style="border: 0px solid;" readonly="readonly">$  ' + parseFloat(descuento).toFixed(2);
		document.getElementById('academia_total').innerHTML = '<input value="'+parseFloat(total).toFixed(2)+'" type="hidden" name="factura[total]" style="border: 0px solid;" readonly="readonly">$ ' + parseFloat(total).toFixed(2);
		//console.log('fecha => ' + date + ' cantd_alumnos => ' + cantd_alumnos + ' precio => ' + parseFloat(total).toFixed(2));
    }

    function eliminar_atleta(obj, id_atleta, date, fecha_limite, porc_individual, porc_grupal, servicio, descuento_academia){

    	var count = $('#lista-atletas tbody').children().length;

    	if(servicio == 'Academia'){

    		$('table#resumen-pago-academia tr#'+id_atleta).remove();
    		recalcularTarifaAcademia("resumen-pago-academia", date, descuento_academia, count);
    	}

    	if(count == 2){

    		document.getElementById('button-datos-sig').style.display = "none";

    	}else{

	    	recalcular_resumen(count, fecha_limite, porc_individual, porc_grupal, servicio);

	    	document.getElementById('button-datos-sig').style.display = "block";
    	}

    	$(obj).closest('tr').remove();

    }

	function agregarZero(i) {
	    if (i < 10) {
	        i = '0' + i;
	    }
	    return i;
	}

    function disponibilidad_reserva(){
    	var cantidad_invitados = $('#lista-invitados tbody').children().length;
    	var h_inicio = $('select[name=reserva_hora_inicio]').val();
    	var h_fin = $('select[name=reserva_hora_fin]').val();
    	var hora_inicio = $("#reserva_hora_inicio option:selected").text();
    	var hora_fin = $("#reserva_hora_fin option:selected").text();
    	var fecha_reserva = $('#reserva_fecha_alquiler').val();
    	var error_message = '<div class="text-left">Su formulario presenta errores<ul>';
    	var valido = true;
    	var locacion = document.querySelector('input[name="reserva_locacion"]:checked');
    	var today = new Date();
		var h_actual = today.getHours();

		var dd = today.getDate();
		var mm = today.getMonth()+1;
		var yyyy = today.getFullYear();
		var fecha_actual = yyyy+'-'+agregarZero(mm)+'-'+agregarZero(dd);

		document.getElementById('reserva_fecha').innerHTML = fecha_reserva;
		document.getElementById('reserva_h_inicio').innerHTML = hora_inicio;
		document.getElementById('reserva_h_fin').innerHTML = hora_fin;
		document.getElementById('reserva_cantidad_horas').innerHTML = h_fin - h_inicio;

    	if(fecha_reserva == ""){
    		error_message += '<li>La fecha de reserva no puede estar en blanco.</li>';
    		valido = false;
    	}

    	if((fecha_reserva == fecha_actual) && (parseInt(h_inicio) < h_actual)){
    		error_message += '<li>La hora de inicio no puede ser menor a la hora actual.</li>';
    		valido = false;
    	}

    	if(parseInt(h_inicio) >= parseInt(h_fin)){
    		error_message += '<li>La hora de inicio no puede ser mayor o igual a la hora de fin para la reserva.</li>';
    		valido = false;
    	}

    	if(locacion == null){
    		error_message += '<li>No ha seleccionado el lugar de la reserva.</li>';
    		valido = false;
    	}else{
    		locacion = document.querySelector('input[name="reserva_locacion"]:checked').value;
    	}

    	if(valido){
    		$.ajax({
	           	url: 'alquiler/reserva/buscar-disponibilidad',
	            dataType: "JSON",
	            type: 'GET',
	            data: {fecha_reserva: fecha_reserva, h_inicio: hora_inicio, h_fin: hora_fin, locacion: locacion},
	            success: function (response) {
	            	if(response.status == 'disponible'){
	            		document.getElementById('cancha_asignada').value = response.cancha;
						document.getElementById('reserva_cancha').innerHTML = response.cancha;
	            		document.getElementById('form-alquiler-canchas').style.display = "block";
	            	}else{
	            		swal("No hay disponibilidad!", response.status, "error");
	            		document.getElementById('form-alquiler-canchas').style.display = "none";
	            	}
	            },

	            error: function (xhr, ajaxOptions, thrownError) {
	                swal("Ocurrió un error!", "No se pudo consultar la disponibilidad de las canchas, intente más tarde", "error");
	            }
	        });
    	}else{
    		error_message += '</ul></div>';
    		swal("Ocurrió un error!", error_message, "error");
    	}
    }

    function agregar_invitado(){
    	var h_inicio = $('select[name=reserva_hora_inicio]').val();
    	var h_fin = $('select[name=reserva_hora_fin]').val();
    	var hora_inicio = $("#reserva_hora_inicio option:selected").text();
    	var hora_fin = $("#reserva_hora_fin option:selected").text();
    	var fecha_reserva = $('#reserva_fecha_alquiler').val();
    	var table = document.getElementById("lista-invitados");
    	var row = table.insertRow(0);
    	var cantidad_invitados = $('#lista-invitados tbody').children().length;
    	var error_message = '<div class="text-left">Su formulario presenta errores<ul>';
    	var valido = true;
		var text1 = document.getElementById('guest_cedula').value;
		var text2 = document.getElementById('guest_nombre').value;
		var text3 = document.getElementById('guest_apellido').value;
		var text4 = document.getElementById('guest_telefono').value;
		var text5 = document.getElementById('guest_email').value;
		var text6 = document.getElementById('guest_red_social').value;

		var adicional = 0;

		if(text1 == ""){
			error_message += "<li>El campo <strong>cédula</strong> es obligatorio.</li>";
			valido = false;
		}

		if(text2 == ""){
			error_message += "<li>El campo <strong>nombre</strong> es obligatorio.</li>";
			valido = false;
		}

		if(text3 == ""){
			error_message += "<li>El campo <strong>apellido</strong> es obligatorio.</li>";
			valido = false;
		}

		if(text4 == ""){
			error_message += "<li>El campo <strong>teléfono</strong> es obligatorio.</li>";
			valido = false;
		}

		if(valido){
			var cell1 = row.insertCell(0);
				cell1.innerHTML = '<input value="'+text1+'" type="text" name="form_guest['+ cantidad_invitados +'][cedula]" style="border: 0px solid;" readonly="readonly">';

			var cell2 = row.insertCell(1);
				cell2.innerHTML = '<input value="'+text2+'" type="text" name="form_guest['+ cantidad_invitados +'][nombre]" style="border: 0px solid;" readonly="readonly">';

			var cell3 = row.insertCell(2);
				cell3.innerHTML = '<input value="'+text3+'" type="text" name="form_guest['+ cantidad_invitados +'][apellido]" style="border: 0px solid;" readonly="readonly">';

			var cell4 = row.insertCell(3);
				cell4.innerHTML = '<input value="'+text4+'" type="text" name="form_guest['+ cantidad_invitados +'][telefono]" style="border: 0px solid;" readonly="readonly">';

			var cell5 = row.insertCell(4);
				cell5.innerHTML = '<input value="'+text5+'" type="text" name="form_guest['+ cantidad_invitados +'][email]" style="border: 0px solid;" readonly="readonly">';

			var cell6 = row.insertCell(5);
				cell6.innerHTML = '<input value="'+text6+'" type="text" name="form_guest['+ cantidad_invitados +'][red_social]" style="border: 0px solid;" readonly="readonly">';

			var cell7 = row.insertCell(6);
				cell7.innerHTML = '<a href="#" name="remove" onclick="eliminar_invitado(this)"><i class="fa fa-times"></i></a>';

			$('#lista-invitados tbody').append(row);

			document.getElementById('guest_cedula').value = "";
			document.getElementById('guest_nombre').value = "";
			document.getElementById('guest_apellido').value = "";
			document.getElementById('guest_telefono').value = "";
			document.getElementById('guest_email').value = "";
			document.getElementById('guest_red_social').value = "";

			document.getElementById('reserva_cantidad_invitados').innerHTML = cantidad_invitados + 1;
			document.getElementById('reserva_fecha').innerHTML = fecha_reserva;
			document.getElementById('reserva_h_inicio').innerHTML = hora_inicio;
			document.getElementById('reserva_h_fin').innerHTML = hora_fin;
			document.getElementById('reserva_cantidad_horas').innerHTML = h_fin - h_inicio;

			var min_personas = $('#min_personas').text();
			var tarifa_hora = $('#tarifa_hora').text();
			var tarifa_adicional = $('#tarifa_adicional_persona').text();

			document.getElementById('reserva_pago').innerHTML = '$ ' + ((parseInt(tarifa_hora) * (cantidad_invitados + 1)) * (h_fin - h_inicio)) + '.00';
		}
		else{
			error_message += '</ul></div>';
    		swal("Ocurrió un error!", error_message, "error");
		}
    }

    function detalles_alquiler(alquiler_id){
    	$.ajax({
           	url: 'detalles/jugadores/'+alquiler_id,
            dataType: "HTML",
            type: 'GET',
            success: function (response) {
            	$('#detalles-alquiler .modal-body').html(response);
    			$('#detalles-alquiler').modal('show');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
            }

        });
    }

    function eliminar_invitado(obj){
    	$(obj).closest('tr').remove();
    }

    function validar_form_alquiler(){
    	var valido = true;
    	var cantidad_invitados = $('#lista-invitados tbody').children().length;
    	var min_personas = $('#min_personas').text();
		var text1 = document.getElementById('responsable_cedula').value;
		var text2 = document.getElementById('responsable_nombre').value;
		var text3 = document.getElementById('responsable_apellido').value;
		var text4 = document.getElementById('responsable_telefono').value;
		var text5 = document.getElementById('responsable_email').value;

		var error_message = '<div class="text-left">Su formulario presenta errores<ul>';
		
		if(text1 == ""){
			error_message += "<li>El campo <strong>cédula</strong> del responsable es obligatorio.</li>";
			valido = false;
		}

		if(text2 == ""){
			error_message += "<li>El campo <strong>nombre</strong> del responsable es obligatorio.</li>";
			valido = false;
		}

		if(text3 == ""){
			error_message += "<li>El campo <strong>apellido</strong> del responsable es obligatorio.</li>";
			valido = false;
		}

		if(text4 == ""){
			error_message += "<li>El campo <strong>teléfono</strong> del responsable es obligatorio.</li>";
			valido = false;
		}

		if(text5 == ""){
			error_message += "<li>El campo <strong>correo electrónico</strong> del responsable es obligatorio.</li>";
			valido = false;
		}

		if(cantidad_invitados < parseInt(min_personas)){
			error_message += "<li>La cantidad mínima de personas para reservar es de: <strong>"+parseInt(min_personas)+"</strong>.</li>";
			valido = false;
		}

    	if(valido){
    		document.getElementById('form-alquiler').submit();
    	}else{
			error_message += '</ul></div>';
    		swal("Ocurrió un error!", error_message, "error");
		}
    }

    function registrar_pago_alquiler(idalquiler, id){
    	swal({
            title: "Registrar pago",
			text: "¿Ya recibió el pago de este alquiler?",
			icon: "success",
            showCancelButton: true,
            confirmButtonColor: '#DD4B39',
            cancelButtonColor: '#00C0EF',
            buttons: ["Cancelar", true],
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm.value) {
				$.ajax({
		           	url: 'registrar/pago/'+idalquiler,
		            dataType: "JSON",
		            type: 'GET',
		            success: function (response) {
		            	//console.log(response);
		            	if(response.status == 'success'){
		            		swal("Hecho!", response.msg, "success");
		            		console.log(document.getElementById("status_" + id));
		            		if(document.getElementById("status_" + id).className.match(/(?:^|\s)label-warning(?!\S)/)){
								document.getElementById("status_" + id).className = document.getElementById("status_" + id).className.replace( /(?:^|\s)label-warning(?!\S)/g , '');
								document.getElementById("status_" + id).className += ' label-success';
		            			document.getElementById("status_" + id).innerHTML = 'Pagado';
		            			document.getElementById("link_" + id).innerHTML = '-';
		            		}

		            	}else{
		            		swal("Ocurrió un error!", response.msg, "error");
		            	}
		                
		            },
		            error: function (xhr, ajaxOptions, thrownError) {
		                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
		            }
		        });
            }
        });
    }

    function pago_vacacional(id){
    	swal({
            title: "Registrar pago",
			text: "¿Ya fue recibido y confirmado el pago de este alumno?",
			icon: "success",
            showCancelButton: true,
            confirmButtonColor: '#DD4B39',
            cancelButtonColor: '#00C0EF',
            buttons: ["Cancelar", true],
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm.value) {
				$.ajax({
		           	url: 'registrar/pago/'+id,
		            dataType: "JSON",
		            type: 'GET',
		            success: function (response) {
		            	if(response.status == 'success'){
		            		swal("Hecho!", response.msg, "success");
		            		if(document.getElementById("status_" + id).className.match(/(?:^|\s)label-warning(?!\S)/)){
								document.getElementById("status_" + id).className = document.getElementById("status_" + id).className.replace( /(?:^|\s)label-warning(?!\S)/g , '');
								document.getElementById("status_" + id).className += ' label-success';
		            			document.getElementById("status_" + id).innerHTML = 'Pagado';
		            			document.getElementById("link_" + id).innerHTML = '<a href="#" onclick="deshabilitar_inscripcion_vacacional('+id+');"><i class="fa fa-trash"></i></a>';
		            		}

		            	}else{
		            		swal("Ocurrió un error!", response.msg, "error");
		            	}
		                
		            },
		            error: function (xhr, ajaxOptions, thrownError) {
		                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
		            }
		        });
            }
        });
    }

	function deshabilitar_inscripcion_vacacional(id){
		swal({
            title: "Deshabilitar inscripción",
			text: "¿Está seguro de inhabilitar a este alumno?",
			icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD4B39',
            cancelButtonColor: '#00C0EF',
            buttons: ["Cancelar", true],
            closeOnConfirm: false
        }).then(function(isConfirm) {
        	
            if (isConfirm.value) {
				$.ajax({
		           	url: 'deshabilitar/inscripcion/'+id,
		            dataType: "JSON",
		            type: 'GET',
		            success: function (response) {
		            	if(response.status == 'success'){
		            		swal("Hecho!", response.msg, "success");
		            		location.reload();
		            	}else{
		            		swal("Ocurrió un error!", response.msg, "error");
		            	}
		                
		            },
		            error: function (xhr, ajaxOptions, thrownError) {
		                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
		            }
		        });
            }
        });
	}

    function pago_campamento(id){
    	swal({
            title: "Registrar pago",
			text: "¿Ya fue recibido y confirmado el pago de este alumno?",
			icon: "success",
            showCancelButton: true,
            confirmButtonColor: '#DD4B39',
            cancelButtonColor: '#00C0EF',
            buttons: ["Cancelar", true],
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm.value) {
				$.ajax({
		           	url: 'registrar/pago/'+id,
		            dataType: "JSON",
		            type: 'GET',
		            success: function (response) {
		            	if(response.status == 'success'){
		            		swal("Hecho!", response.msg, "success");
		            		if(document.getElementById("status_" + id).className.match(/(?:^|\s)label-warning(?!\S)/)){
								document.getElementById("status_" + id).className = document.getElementById("status_" + id).className.replace( /(?:^|\s)label-warning(?!\S)/g , '');
								document.getElementById("status_" + id).className += ' label-success';
		            			document.getElementById("status_" + id).innerHTML = 'Pagado';
		            			document.getElementById("link_" + id).innerHTML = '<a href="#" onclick="deshabilitar_inscripcion_campamento('+id+');"><i class="fa fa-trash"></i></a>';
		            		}

		            	}else{
		            		swal("Ocurrió un error!", response.msg, "error");
		            	}
		                
		            },
		            error: function (xhr, ajaxOptions, thrownError) {
		                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
		            }
		        });
            }
        });
    }

	function deshabilitar_inscripcion_campamento(id){
		swal({
            title: "Deshabilitar inscripción",
			text: "¿Está seguro de inhabilitar a este alumno?",
			icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD4B39',
            cancelButtonColor: '#00C0EF',
            buttons: ["Cancelar", true],
            closeOnConfirm: false
        }).then(function(isConfirm) {
            if (isConfirm.value) {
				$.ajax({
		           	url: 'deshabilitar/inscripcion/'+id,
		            dataType: "JSON",
		            type: 'GET',
		            success: function (response) {
		            	if(response.status == 'success'){
		            		swal("Hecho!", response.msg, "success");
		            		location.reload();
		            	}else{
		            		swal("Ocurrió un error!", response.msg, "error");
		            	}
		                
		            },
		            error: function (xhr, ajaxOptions, thrownError) {
		                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
		            }
		        });
            }
        });
	}

	function listado_asistencia(){
		var modalidad = $("#asistencia_modalidad option:selected").val();
		var locacion = $("#asistencia_locacion option:selected").val();
		var horario = $("#asistencia_horario option:selected").val();
		var error_message = '<div class="text-left"><ul>';
    	var valido = true;
    	var d = new Date();
  		var n = d.getDay();
  		var fecha_seleccionada = "";

  		if(document.getElementById('asistencia_fecha') != undefined){
  			fecha_seleccionada = document.getElementById('asistencia_fecha').value;
  		}

		if(modalidad == ""){
			error_message += "<li>Debe elegir la modalidad que desea cargar</li>";
			valido = false;
		}

		if(locacion == ""){
			error_message += "<li>Debe elegir la ubicación donde se encuentra</li>";
			valido = false;
		}

		if(horario == ""){
			error_message += "<li>Debe elegir el horario del listado</li>";
			valido = false;
		}

		if(valido){

			$.ajax({
	           	url: 'cargar/asistencia',
	            dataType: "JSON",
	            type: 'POST',
	            headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
	            data: {modalidad: modalidad, locacion: locacion, horario: horario, dia_actual: n, fecha_asistencia: fecha_seleccionada},
	            success: function (response) {
	            	if(response.title != ""){
            			$("#asistencia_desc_dia_fecha").html(response.title);
            		}

	            	if(response.error_message != ""){
						swal("Ocurrió un error!", response.error_message, "error");
						document.getElementById('content-tabla-asistencia').style.display = 'none';
	            	}else{
	            		var asistencia_no_regular = response.asistencia_no_regular;
	            		var atletas = response.atletas;
	            		var table = document.getElementById("tabla-asistencia");

						$('#tabla-asistencia').dataTable().fnDestroy();

	            		$("#tabla-asistencia tbody").html("");

	            		$.each(atletas, function(id, alumno) {
	            			var row = table.insertRow(0);
							var cell1 = row.insertCell(0);
							cell1.innerHTML = alumno;

							var cell2 = row.insertCell(1);
							if(inArray(id, response.asistencia_reg)){
								cell2.innerHTML = '<input value="'+id+'" type="checkbox" name="asistencia[]" checked>';	
							}else{
								cell2.innerHTML = '<input value="'+id+'" type="checkbox" name="asistencia[]">';	
							}
							
							$('#tabla-asistencia tbody').append(row);
						});

						$.each(asistencia_no_regular, function(id, alumno) {
							var option = document.createElement("option");
							option.value = id;
							option.text = alumno;
							document.getElementById('recupera-clase').appendChild(option);
						});
						
						$('input').iCheck({
							checkboxClass: 'icheckbox_square-red',
							radioClass: 'iradio_square-red',
							increaseArea: '10%' // optional
						});

						$('#tabla-asistencia').DataTable({
							responsive: true,
							language: {
								url: '../public/js/datatable-spanish.json' //Ubicacion del archivo con el json del idioma.
							}
						});

	            		
						document.getElementById('content-tabla-asistencia').style.display = 'block';
	            	}
	            },

	            error: function (xhr, ajaxOptions, thrownError) {
	                swal("Ocurrió un error!", "Por favor, intente de nuevo", "error");
	            }
	        });

		}else{
			error_message += '</ul></div>';
	    	swal("Ocurrió un error!", error_message, "error");	
		}
	}

	function inArray(needle, haystack) {
	    var length = haystack.length;
	    for(var i = 0; i < length; i++) {
	        if(haystack[i] == needle) return true;
	    }
	    return false;
	}

	function empty(e) {
		switch (e) {
			case "":
			case 0:
			case "0":
			case null:
			case false:
			case typeof this == "undefined":
				return true;
			default:
				return false;
		}
	}


	function recuperar_clase(){
		var id_alumno_recupera_clase = $("#recupera-clase option:selected").val();

		if(empty(!id_alumno_recupera_clase)){
			$('#tabla-asistencia').dataTable().fnDestroy();
			var alumno_recupera_clase = $("#recupera-clase option:selected").text();
			var table = document.getElementById("tabla-asistencia");

			var row = table.insertRow(0);
			var cell1 = row.insertCell(0);
			cell1.innerHTML = alumno_recupera_clase;

			var cell2 = row.insertCell(1);
			cell2.innerHTML = '<input value="'+id_alumno_recupera_clase+'" type="checkbox" name="asistencia[]">';

			$('#tabla-asistencia > tbody:last-child').append(row);

			$('input').iCheck({
				checkboxClass: 'icheckbox_square-red',
				radioClass: 'iradio_square-red',
				increaseArea: '10%' // optional
			});

			$('#tabla-asistencia').DataTable({
				responsive: true,
				language: {
					url: '../public/js/datatable-spanish.json' //Ubicacion del archivo con el json del idioma.
				}
			});

			$("#recupera-clase option[value='"+id_alumno_recupera_clase+"']").remove();
		}
	}
</script>