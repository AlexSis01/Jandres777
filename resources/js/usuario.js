$(document).ready(function(){
			// Configuracion del DataTable 
	 		$("#listadoUsuarios").DataTable({
			    "language": {
			        "sProcessing":    "Procesando...",
			        "sLengthMenu":    "Mostrar _MENU_ registros",
			        "sZeroRecords":   "No se encontraron resultados",
			        "sEmptyTable":    "Ningún dato disponible en esta tabla",
			        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
			        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
			        "sInfoPostFix":   "",
			        "sSearch":        "Buscar:",
			        "sUrl":           "",
			        "sInfoThousands":  ",",
			        "sLoadingRecords": "Cargando...",
			        "oPaginate": {
			            "sFirst":    "Primero",
			            "sLast":    "Último",
			            "sNext":    "Siguiente",
			            "sPrevious": "Anterior"
			        },
			        "oAria": {
			            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			        }
			    }
			    //Fin de la configuracion del Data Table
			});

//Evento clic de nuevoUsuario
	$("#nuevoUsuario").on("click", function(){
		$("#modalIngresoUsuario").modal({backdrop: 'static',keyboard: false});

	})

//Envio de la informacion

$('#agregarUsuario').on("click", function(){

	var dataUsuario= JSON.stringify($('#infoUsuario :input').serializeArray());
			$.ajax({
				type: 'POST',
				async: false,
				dataType: 'json',
				data: {dataUsuario:dataUsuario,key: 'agregar'},
				url: "../controller/UsuarioController.php",
				success: function(data)
				{
					
					if(data.estado==true)
					{
						swal({
							title: "Exito!",
							text: data.descripcion,
							timer: 2500,
							type: 'success',
							closeOnConfirm: true,
							closeOnCancel: true
						});
						setTimeout(function(){
							location.reload();
						},1000);
					}
				},
				error: function(xhr, status)
				{

				}

			});

	//fin del clic de agregar usuario
})

$("#username").on("change", function(){
	var valor= $(this).val();
	$.ajax({
				type: 'POST',
				async: false,
				dataType: 'json',
				data: {valor:valor,key: 'findUser'},
				url: "../controller/UsuarioController.php",
				success: function(data)
				{
					
					if(data.estado==false)
					{
						swal({
							title: "Eror!",
							text: data.descripcion,
							timer: 2500,
							type: 'error',
							closeOnConfirm: true,
							closeOnCancel: true
						});

						$("#username").val("tugfa");
						
					}
				},
				error: function(xhr, status)
				{

				}
					//FIN DEL AJAX
			});

	//FIN DEL CHANGE DE USERNAME
});

$(document).on("click",".editarUsuario", function(){

		var idUsuario = $(this).attr("id");
		$.ajax({
					type: 'POST',
					async: false,
					dataType: 'json',
					data: {idUsuario:idUsuario,key: 'getUser'},
					url: "../controller/UsuarioController.php",
					success: function(data)
					{
						
						$("#usernameEdit").val(data.username);
						$("#rolEdit").val(data.idRol);
						$("#idUsuario").val(data.idUsuario);
						$("#modalModificacionUsuario").modal({backdrop: 'static',keyboard: false});

					},
					error: function(xhr, status)
					{

					}
					//FIN DEL AJAX
			});

});

// Fin del document ready
});