$(document).ready(function() {	

	$("#btn-reg-vin").click(function() {
		  	//	alert("Evaluar egresado");
       
		id_vin = $("#id_vin").val();
		obs_vin = $("#obs_vin").val();
		fecha_ter_vin = $("#fecha_ter_vin").val();
		val_vin = $("#val_vin").val();
		doc_est = $("#doc_est").val();
		
		var datos =  {
			'id_vin': id_vin,
			'fecha_ter_vin':fecha_ter_vin,
			'obs_vin':obs_vin,
			'val_vin':val_vin,
			'doc_est':doc_est,
			};					
	$.ajax({
			data: datos,
			url:'recibe_formulario_valoracion.php',
			type:'post',
			beforeSend: function(){
				$("#respuestaX").html("Buscando...");
			},
			success: function(response){
			//$("#respuestax").html(response);
			  if (response=="1") {
			 $('#btn_cerrar_cargar').val("Continuar");
			 $("#respuestaX").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Valoración registrada con Éxito.</div>");
            } else {
             $("#respuestaX").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al registar Valoración </div>");
            }
		    		}			
				});
              });

})