$(document).ready(function() {	

	

//alert("cargando..");
//$('#' + id).hide();
	//var id = this.id; $("#" + this.id)
	
	
	$("a.vinculo_rep").click(function() {
		//alert($('#id_curso').val());
                var oID = $(this).attr("id");
				var v= "x"+oID;
				$("input.valores").attr("id");
				//var precio = $(this).attr("id");
				//alert(oID);
				//alert(v);
				var nvalor= $('#'+v).val();
				
			//	if(nvalor==""){ alert("Ingrese el nuevo valor")}else{
		var datos =  {
			'id_curso': $('#id_curso').val(),
			'username': oID,
			};					
		$.ajax({
			data: datos,
			url:'reporte_asistencia_individual.php',
			type:'post',
			beforeSend: function(){
				$("#reporte_individual").html("<br><div id='exito'>Procesando...</div>");
			},
			success: function(response){
			$("#reporte_individual").html(response);
		// location.reload();		
			}			
		});//}
                });
				//finaliza
	
	//inicia el de niveles.
		$("a.vinculo_nivel").click(function() {
                var oID = $(this).attr("id");
				//var v= "x"+oID;
				//$("input.vinculo_nivel").attr("id");
				//var precio = $(this).attr("id");
				//alert(oID);
				//alert(v);
				//var nvalor= $('#'+v).val();
				
				//if(nvalor==""){ alert("Ingrese el nuevo valor")}else{
		var datos =  {
			'id_nivel': oID,
			//'valor': nvalor,
			};					
		$.ajax({
			data: datos,
			url:'editar_nivel.php',
			type:'post',
			beforeSend: function(){
				$("#res").html("<div id='exito'>Procesando...</div>");
			},
			success: function(response){
			$("#res").html(response);
		 location.reload();		
			}			
		});
                });				
				//inicia el de valores bien
	
	$("a.vinculo").click(function() {
                var oID = $(this).attr("id");
				var v= "x"+oID;
				$("input.valores").attr("id");
				var prueba = "sel"+oID;
				var control = "id_asi"+oID;
				//var control = "control"+oID;
				//alert("control con asi: "+control);
				//var precio = $(this).attr("id");
				//alert(oID);
				//alert(v);
				var nvalor= $('#'+v).val();
				var var_id_asi= $('#'+control).val();
				var doc_docente = $('#'+prueba).val();
				var grado= $('#grado').val();
				var id_curso_data= $('#id_curso_data').val();
				//alert("Es id de curso"+id_curso_data);
				//alert("Muestra el valor de var_id_asi"+var_id_asi);
				//alert("Es preuba para docente"+prueba2);
				
				if(nvalor==""){ alert("Ingrese el nuevo valor")}else{
		var datos =  {
			'id_materia': oID,
			'doc_docente': doc_docente,
			'grado':grado,
			'id_curso':id_curso_data,
			'control':control,
			'var_id_asi':var_id_asi,
			};					
		$.ajax({
			data: datos,
			url:'recibe_formulario_asignacion.php',
			type:'post',
			beforeSend: function(){
				$("#result"+oID).html("<div id='exito'>Procesando...</div>");
			},
			success: function(response){
			$("#result"+oID).html(response);

			if (response=="1") {
             $('#result'+oID).html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Correcto</strong></div>");
            }else{
			 $('#result'+oID).html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Incorrecto</strong></div>");

            }
		// location.reload();		
			}			
		});}
                });
	
// inicia agregar nivel
	$("#btn_agregar_nivel").click(function(e){
	//$("#respuesta_busqueda").html("<p></p>");
		e.preventDefault();
		//alert($("#txt_busqueda_doc").val());
		if($("#nom_nivel").val()!=""){	
	//$("#txt_busqueda").val('');
		var datos =  {
			'nom_nivel': $("#nom_nivel").val(),
			'tipo_nivel':  $("#tipo_nivel").val(),
			};					
		$.ajax({
			data: datos,
			url:'agregar_nivel.php',
			type:'post',
			beforeSend: function(){
				$("#res").html("<br><div id='busqueda'><center><h2>Buscando...</h2></center></div>");
			},
			success: function(response){
			$("#res").html(response);	
			 location.reload();		
			}			
		});
		 }else{
			alert("Debe Ingresar el nombre del nivel o seminario"); 
		 }
	});	 
		
	//inicia matricula
		$("#btn_bus_mat").click(function(e){
			//alert($("#txt_bus_mat").val());
	//$("#respuesta_busqueda").html("<p></p>");
		e.preventDefault();
		//alert($("#txt_bus_mat").val());
		if($("#txt_bus_mat").val()!=""){	
	//$("#txt_busqueda").val('');
		var datos =  {
			'documento': $("#txt_bus_mat").val(),
			'tipo_nivel':  $("#tipo_nivel").val(),
			};					
		$.ajax({
			data: datos,
			url:'consulta_matricula.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta_consulta").html("<br><div id='busqueda'><center><h2>Buscando...</h2></center></div>");
			},
			success: function(response){
			$("#respuesta_consulta").html(response);	
			 //location.reload();		
			}			
		});
		 }else{
			alert("Debe Ingresar el nombre del nivel o seminario"); 
		 }
	});
		//finaliza matricula
		//inicia registro bd matricula
		
			$("#btn_reg_matricula").click(function(e){
	//$("#respuesta_busqueda").html("<p></p>");
		e.preventDefault();
		//alert($("#username").val());
		if($("#id_curso").val()!=-1){	
	//$("#txt_busqueda").val('');
	
	//alert($("#username").val()+" "+$("#id_curso").val())
		var datos =  {
			'username': $("#username").val(),
			'id_curso':  $("#id_curso").val(),
			};					
		$.ajax({
			data: datos,
			url:'registrar_matricula.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta_consulta").html("<br><div id='busqueda'><center><h2>Buscando...</h2></center></div>");
			},
			success: function(response){
			$("#respuesta_consulta").html(response);	
			
			}			
		});
		 }else{
			alert("Seleccione el Nivel o Seminario a Matricular."); 
		 }
	});
		// finaliza registro bd matricula


		
})

