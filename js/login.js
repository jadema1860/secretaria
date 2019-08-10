$(document).ready(function() {
//	alert("prueba");

$("#contra").hide();
var estado=0;
var histo=0;
$("#nov").hide();
$("#nov2").hide();
$("#new_nota").change(function(e){
//alert('');


})
	$("#btn-cerrar-con").click(function(e){
		e.preventDefault();
		//alert("cambiar contra");
		$("#contra").hide(500);
		$("#new_con_rep").val("");
		$("#new_con").val("");

	})

// fin buscar estudianate
$("#btn-contra").click(function(e){
	e.preventDefault();
	if(estado==0){
		$("#contra").show(1000);
		$("#new_con").focus();
		estado=1;
	}else{
		$("#contra").hide(500);
		estado=0;
		}
})

$("#btn-obs").click(function(e){
	//alert();
	e.preventDefault();
	if(estado==0){
		$("#nov2").hide(500);
		$("#nov").show(1000);
		$("#obs_nov").focus();
		
		estado=1;
	}else{
		$("#nov").hide(500);
		estado=0;
		}
})


$("#new_con").change(function(e){
 var n = $("#new_con").val().length;
if(n<6){

	bootbox.alert("La contraseña debe tener MAS de 6 caracteres, Letras MAYÚCULAS, minúsculas y Números.");
	$("#new_con").val("");
	$("#new_con").focus();
	$("#new_con_rep").val("");
}
})
//inicia contraseña estudiante
$("#btn-act-con-est").click(function(e){
		//	alert();
			e.preventDefault();
			var new_con=$("#new_con").val();
			var new_con_rep=$("#new_con_rep").val();

			if(new_con==new_con_rep && (new_con.length>=6 || new_con_rep.length>=6)){
          	var datos =  {
			'new_con': new_con,
			'doc_admin': $("#doc_admin").val(),
			};				
		$.ajax({
			data: datos,
			url:'../php/recibe_actualiza_contrasena_admin.php',
			type:'post',
			beforeSend: function(){
				$("#contra").html("Buscando...");
			},
			success: function(response){
		  if (response=="1") {			  	
             $("#contra").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Contraseña Actualizada con Éxito.</div>");
            } else {
              $("#contra").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Contraseña.</div>");
          	  }
			}			
		});
		}else{
			$("#new_con").val("");
			$("#new_con_rep").val("");
			$("#new_con").focus();
			bootbox.alert("Error al confirmar la contraseña.");
			

		}
	});	//finaliza actualia contraseña estudiante
		//cargar datos


$("#btn-act-con-nov").click(function(e){
			//alert("novedad");
			e.preventDefault();
			var fecha_nov=$("#fecha_nov").val();
			var obs_nov=$("#obs_nov").val();
			var estado=$("#estado").val();
			var documento=$("#documento").val();
			var id_curso=$("#id_curso").val();
			var est_act=$("#est_act").val();

			if(est_act!=estado){
          	var datos =  {
			'obs_nov': obs_nov,
			'fecha_nov': $("#fecha_nov").val(),
			'estado':estado,
			'documento':documento,
			'id_curso':id_curso,
			};				
		$.ajax({
			data: datos,
			url:'../php/recibe_formulario_novedad.php',
			type:'post',
			beforeSend: function(){
				$("#contra").html("Buscando...");
			},
			success: function(response){
			//  $("#nov").html(response);	
		 if (response=="1") {	

		 		  	
             $("#nov").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Novedad registrada con Éxito.</div>");
             $("#est_act").val(estado);
            } else {
              $("#nov").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al registrar la novedad.</div>");
          	  }
			}			
		});	
	}else{
			bootbox.alert("No se realizaron cambios");
	}

	});	//finaliza actualia contraseña estudiante
		//cargar datos

//inicia contraseña estudiante
$("#btn-act-con-doc").click(function(e){
			//alert();
			e.preventDefault();
			var new_con=$("#new_con").val();
			var new_con_rep=$("#new_con_rep").val();
			//alert("re"+new_con_rep);

			if(new_con==new_con_rep && (new_con.length>=6)){
          	var datos =  {
			'new_con': new_con,
			'doc_usu': $("#doc_usu").val(),
			};				
		$.ajax({
			data: datos,
			url:'../php/recibe_actualiza_contrasena_admin.php',
			type:'post',
			beforeSend: function(){
				$("#contra").html("Buscando...");
			},
			success: function(response){
		  if (response=="1") {			  	
             $("#contra").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Contraseña Actualizada con Éxito.</div>");
            } else {
              $("#contra").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Contraseña.</div>");
          	  }
			}			
		});
		}else{
			//alert(new_con);
			$("#new_con").val("");
			$("#new_con_rep").val("");
			$("#new_con").focus();
			bootbox.alert("Error al confirmar la contraseña.");
			

		}
	});	//finaliza actualia contraseña estudiante
		//cargar datos


		//inicia contraseña empresa
$("#btn-act-con-emp").click(function(e){
		//	alert("empresa");
			e.preventDefault();
			var new_con=$("#new_con").val();
			var new_con_rep=$("#new_con_rep").val();
			//alert("re"+new_con_rep);

			if(new_con==new_con_rep && (new_con.length>=6)){
          	var datos =  {
			'new_con': new_con,
			'nit_emp': $("#nit_emp").val(),
			};				
		$.ajax({
			data: datos,
			url:'../php/recibe_actualiza_contrasena_emp.php',
			type:'post',
			beforeSend: function(){
				$("#contra").html("Buscando...");
			},
			success: function(response){
		  if (response=="1") {			  	
             $("#contra").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Contraseña Actualizada con Éxito.</div>");
            } else {
              $("#contra").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Contraseña.</div>");
          	  }
			}			
		});
		}else{
			//alert(new_con);
			$("#new_con").val("");
			$("#new_con_rep").val("");
			$("#new_con").focus();
			bootbox.alert("Error al confirmar la contraseña.");
			

		}
	});	//finaliza actualia contraseña empresa

			//inicia contraseña egresado
$("#btn-act-con-egresado").click(function(e){
			//alert("egresado");
			e.preventDefault();
			var new_con=$("#new_con").val();
			var new_con_rep=$("#new_con_rep").val();
			//alert("re"+new_con_rep);

			if(new_con==new_con_rep && (new_con.length>=6)){
          	var datos =  {
			'new_con': new_con,
			'doc_est': $("#doc_est").val(),
			};				
		$.ajax({
			data: datos,
			url:'../php/recibe_actualiza_contrasena_egresado.php',
			type:'post',
			beforeSend: function(){
				$("#contra").html("Buscando...");
			},
			success: function(response){
		  if (response=="1") {			  	
             $("#contra").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Contraseña Actualizada con Éxito.</div>");
            } else {
              $("#contra").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Contraseña.</div>");
          	  }
			}			
		});
		}else{
			//alert(new_con);
			$("#new_con").val("");
			$("#new_con_rep").val("");
			$("#new_con").focus();
			bootbox.alert("Error al confirmar la contraseña.");
			

		}
	});	//finaliza actualia contraseña estudiante essc
		
})