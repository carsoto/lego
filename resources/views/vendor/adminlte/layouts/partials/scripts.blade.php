<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/public/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/plugins/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('/public/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
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
		        ajax: 'usuarios/table/listado',
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
				           	url: 'usuarios/eliminar/'+_this.attr("data-id"),
				            dataType: "JSON",
				            type: 'GET',
				            success: function (response) {
				            	console.log(response);
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

    	$('.datepicker-nac').datepicker({
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
    });
    	
    })(jQuery);

</script>
