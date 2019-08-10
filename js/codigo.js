$(document).ready(function() {	

//$('.hab').attr('disabled','disabled');

$("#new_nota").change(function(e){
alert('');

$("#calculada").html('hola');

})


$("#grado").change(function(e){
	//alert();
           // alert($('select[id=grado]').val());
            id_grado=$('select[id=grado]').val();
			id_jornada=$('#id_jornada').val();
         //   $('#valor2').val($(this).val());
       //alert(id_jornada);

		e.preventDefault();
		//if($("#documento").val()!=""){		
		var datos =  {
			'id_grado': id_grado,
			'id_jornada': id_jornada,
			};					
		$.ajax({
			data: datos,
			url:'nomenclatura.php',
			type:'post',
			beforeSend: function(){
				$("#nomenclatura").html("Buscando...");
			},
			success: function(response){
			$("#nomenclatura").val(response);
			}
				});

	});
	//carga de institiciones
	$("#btn-ingreso").click(function(e){
		//alert("busqueda");
		//$("#consulta").html("<p></p>");
		//$("#informacion").html("<p></p>");
		e.preventDefault();
		//if($("#documento").val()!=""){		
		var datos =  {
			'usuario': $("#usuario").val(),
			'contra': $("#contra").val()
			};					
		$.ajax({
			data: datos,
			url:'php/control.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta-ingreso").html("Buscando...");
			},
			success: function(response){
			$("#respuesta-ingreso").html(response);
			$("#btn-ingreso").hide();
			$("#btn-cerrar").hide();			
			//$("#respuesta-ingreso").load("php/menu.php");
				//if(("#respuesta-ingreso").text()=="1"){
				//window.location.href = "menu.php";
					//echo "$ddd";
				//}		
			}			
		});
		// }else{
			//alert("Ingrese el nombre o apellido del estudiante."); 
		// }
		 /*
		 */
	});

//carga de institiciones
	$("#btn-reg-hor").click(function(e){
	//	alert($("#nom_horario").val());
		//$("#consulta").html("<p></p>");
		//$("#informacion").html("<p></p>");
		e.preventDefault();
		var nom_horario= $("#nom_horario").val();
	    if(nom_horario =="" || nom_horario.length <3){
        $("#mensaje1").fadeIn();
        return false;
         }else{
        $("#mensaje1").fadeOut();
		var datos =  {
			'nom_horario': $("#nom_horario").val(),
			};					
		$.ajax({
			data: datos,
			url:'recibe_formulario_horario.php',
			type:'post',
			beforeSend: function(){
				$("#btn-reg-hor").val("Registrando...");
			},
			success: function(response){
			//$("#btn-reg-hor").val(response);
			  if (response=="1") {
             $("#resultadox").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Año Lectivo Creado con Éxito.</div>");
            } else {
             $("#resultadox").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al crear el Año Lectivo.</div>");
            }
			}			
			});
			}
		
	});

	//registro lectivo
	
		// }else{
			//alert("Ingrese el nombre o apellido del estudiante."); 
		// }
		 /*
		 */
	
//finaliza registro lectivo

	//busqueda estudiante

	//cambiar estado curso

	$("#btn-ver-hor").click(function(e){
	//alert("estado");
		//$("#consulta").html("<p></p>");
		//$("#informacion").html("<p></p>");
		e.preventDefault();
		//if($("#documento").val()!=""){		
		var datos =  {
		//	'id_curso': $("#id_curso").val(),
			//'contra': $("#contra").val()
			};					
		$.ajax({
			data: datos,
			url:'consulta_horario.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta-ingreso").html("Buscando...");
			},
			success: function(response){
			$("#result").html(response);
			//$("#btn-ingreso").hide();
			//$("#btn-cerrar").hide();
			
			//$("#respuesta-ingreso").load("php/menu.php");
				//if(("#respuesta-ingreso").text()=="1"){
				//window.location.href = "menu.php";
					//echo "$ddd";
				//}		
			}			
		});
		// }else{
			//alert("Ingrese el nombre o apellido del estudiante."); 
		// }
		 /*
		 */
	});

	

// fin buscar estudianate

//busqueda estudiante curso
	$("#btn_bus_mod").click(function(e){
		e.preventDefault();
		//alert("Modificar "+$("#documento").val());
		if($("#documento").val()!=""){		
		var datos =  {
			'documento': $("#documento").val(),
			//'documento': $("#documento").val()
			};		
		$.ajax({
			data: datos,
			url:'busqueda_todos_cursos_modificar.php',
			type:'post',
			beforeSend: function(){
				$("#res_tabla").html("Buscando...");
			},
			success: function(response){
			$("#res_tabla").html(response);
			//$("#btn-ingreso").hide();
			//$("#btn-cerrar").hide();
			}			
		});
		}else{
			alert("Ingrese Documento Estudiante.");
		}
	});

// fin buscar estudianate curso




//busqueda estudiante
	$("#btn_bus_cur_doc").click(function(e){
		e.preventDefault();
		//alert($("#doc_docente").val());
		if($("#doc_docente").val()!=""){		
		var datos =  {
			'doc_docente': $("#doc_docente").val(),
			//'documento': $("#documento").val()
			};		
		$.ajax({
			data: datos,
			url:'busqueda_todos_cursos_docente.php',
			type:'post',
			beforeSend: function(){
				$("#res_tabla").html("Buscando...");
			},
			success: function(response){
			$("#res_tabla").html(response);
			//$("#btn-ingreso").hide();
			//$("#btn-cerrar").hide();
			}			
		});
		}else{
			alert("Ingrese Nombres, Apelidos ó Documento");
		}
	});

// fin buscar estudianate

//busqueda estudiante
	$("#btn_bus_est").click(function(e){
		e.preventDefault();
		if($("#nom_ape").val()!=""){		
		var datos =  {
			'nom_ape': $("#nom_ape").val(),
			'documento': $("#documento").val()
			};				
		$.ajax({
			data: datos,
			url:'busqueda_estudiantes.php',
			type:'post',
			beforeSend: function(){
				$("#pagina").html("Buscando...");
			},
			success: function(response){
			$("#pagina").html(response);
			//$("#btn-ingreso").hide();
			//$("#btn-cerrar").hide();
			}			
		});
		}else{
			alert("Ingrese Nombres, Apelidos ó Documento");
		}
	});

// fin buscar estudianate

//busqueda estudiante con estado
	$("#btn_bus_est_est").click(function(e){
		e.preventDefault();
		if($("#nom_ape_est").val()!=""){		
		var datos =  {
			'nom_ape': $("#nom_ape_est").val(),
			'estado_est': $("#estado_est").val()
			};				
		$.ajax({
			data: datos,
			url:'busqueda_egresado_estado.php',
			type:'post',
			beforeSend: function(){
				$("#consultax").html("Buscando...");
			},
			success: function(response){
			$("#consultax").html(response);
		   }			
		});
		}else{
			alert("Ingrese Nombres o Apelidos del estudiante");
		}
	});

// fin buscar estudianate

//busqueda estudiante por programa
	$("#btn_bus_pro").click(function(e){
		e.preventDefault();
		alert($("#desRango").val());
		if($("#desRango").val()!=""){		
		var datos =  {
			
			'desRango': $("#desRango").val()
			};				
		$.ajax({
			data: datos,
			url:'busqueda_egresado_programa.php',
			type:'post',
			beforeSend: function(){
				$("#consultax").html("Buscando...");
			},
			success: function(response){
			$("#consultax").html(response);
		   }			
		});
		}else{
			alert("Ingrese Nombres o Apelidos del estudiante");
		}
	});

// fin buscar estudianate
//inicio cerrar y borrar 

//inico otro

$("#btn_bus_est").click(function(e){
		e.preventDefault();
	$('.header').load('URL #header');
	});

	//fin otro
		

		$(".close").click(function(e){
			//alert("cerrar");
			//$("#usuario").empty();
			//$("#contra").empty();
			$('#formulario1')[0].reset();
			window.location.href = "index.html";
		});

	   $("#btn_cerrar_cargar").click(function(e){
			//alert("cerrar y cargar");
			//$("#usuario").empty();
			//$("#contra").empty();
			//$('#formulario1')[0].reset();
			window.location.href = "menu.php";
		});


		$(".closeModal").click(function(e){
			//alert("cerrar");
			//$("#usuario").empty();
			//$("#contra").empty();
			//$('#formulario1')[0].reset();
			window.location.href = "menu.php";
		});

		$("#btn-cerrar").click(function(e){
			$('#formulario1')[0].reset();
			//modificar cerrar
			//window.location.href = "menu.php";
			});


		//fin cerrar

		//cargar datos

		$("#btn-con-est").click(function(e){
		//	alert();
		e.preventDefault();
		//if($("#nom_ape").val()!=""){		
		var datos =  {
			'nom_ape': $("#nom_ape").val(),
			'documento': $("#documento").val()
			};				
		$.ajax({
			data: datos,
			url:'../php/busqueda_estudiantes.php',
			type:'post',
			beforeSend: function(){
				$("#carga_consulta").html("Buscando...");
			},
			success: function(response){
			$("#carga_consulta").html(response);
			//$("#btn-ingreso").hide();
			//$("#btn-cerrar").hide();
			}			
		});
		//}else{
			//alert("Ingrese Nombres, Apelidos ó Documento");
		//}
	});	


		//inicio odal importado

		$('#dataUpdate').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var codigo = button.data('codigo') // Extraer la información de atributos de datos
		  var id_estudiante = button.data('id_estudiante') // Extraer la información de atributos de datos
		  var nom_estudiante = button.data('nom_estudiante') // Extraer la información de atributos de datos
		  var ape_estudiante = button.data('ape_estudiante') // Extraer la información de atributos de datos
		  var tel = button.data('tel') // Extraer la información de atributos de datos
		  var continente = button.data('continente') // Extraer la información de atributos de datos
		  var nombres_completo=nom_estudiante+' '+ape_estudiante
		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar Estudiantez: '+nombres_completo)
		  modal.find('.modal-body #id_estudiante').val(id_estudiante)
		  modal.find('.modal-body #codigo').val(codigo)
		  modal.find('.modal-body #nom_estudiante').val(nom_estudiante)
		  modal.find('.modal-body #ape_estudiante').val(ape_estudiante)
		  modal.find('.modal-body #tel').val('<opcion>hola</opcion')
		  modal.find('.modal-body #continente').val(continente)

		  $('.alert').hide();//Oculto alert
		})

			$('#dataUpdateUsuario').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var codigo = button.data('codigo') // Extraer la información de atributos de datos
		  var doc_usuario = button.data('doc_usuario') // Extraer la información de atributos de datos
		  var nom_estudiante = button.data('nom_estudiante') // Extraer la información de atributos de datos
		  var ape_estudiante = button.data('ape_estudiante') // Extraer la información de atributos de datos
		  var tel = button.data('tel') // Extraer la información de atributos de datos
		  var continente = button.data('continente') // Extraer la información de atributos de datos
		  var nombres_completo=nom_estudiante+' '+ape_estudiante
		  var modal = $(this)

		  modal.find('.modal-title').text('Modificar Usuario: '+doc_usuario)
		  modal.find('.modal-body #doc_usuario').val(doc_usuario)
		  modal.find('.modal-body #codigo').val(codigo)
		  modal.find('.modal-body #nom_estudiante').val('asdf')
		  modal.find('.modal-body #ape_estudiante').val(ape_estudiante)
		  modal.find('.modal-body #tel').val('<opcion>hola</opcion')
		  modal.find('.modal-body #continente').val(continente)
		  var myDNI = $(this).data('doc_usuario');
		  $('.alert').hide();//Oculto alert
		  var datos =  {
			'id_estudiante': myDNI			
			};			

		  $.ajax({
			data: datos,
			url:'php/control.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta-ingreso").html("Buscando...");
			},
			success: function(response){
			//$("#respuesta-ingreso").
			 modal.find('.modal-body #tel').val(response);
			
			//$("#respuesta-ingreso").load("php/menu.php");
				//if(("#respuesta-ingreso").text()=="1"){
				//window.location.href = "menu.php";
					//echo "$ddd";
				//}		
			}			
		});	

		})



		/*$(document).on("click", ".open-Modal", function () {
		var myDNI = $(this).data('id');
		$(".modal-body #DNI").val( myDNI );
		});*/


		//fin modal
	//inicio busqueda usuarios
	
	/*	$("#btn_buscar_doc").click(function(e){
		//$("#consulta").html("<p></p>");
		//$("#informacion").html("<p></p>");
		e.preventDefault();
		if($("#doc").val()!=""){		
		var datos =  {
			'doc': $("#doc").val(),
			//'opcion': $("#opcion").val(),
			};					
		$.ajax({
			data: datos,
			url:'busqueda_usuarios.php',
			type:'post',
			beforeSend: function(){
				$("#form_prestamo").html("<br><div id='busqueda'><center><h2>Buscando...</h2></center></div>");
			},
			success: function(response){
			$("#form_prestamo").html(response);		
			}			
		});
		 }else{
			alert("Ingrese el numero de documento."); 
		 }
	});
	
	// fin busqueda usuarios
		$("#btn_reg_usu").click(function(e){
		//e.preventDefault();
		/*var nom_usuario=document.getElementById('nom_usuario').value;				
		var ape_usuario =document.getElementById('ape_usuario').value;
		var doc_usuario =document.getElementById('doc_usuario').value;
		var sex_usuario =document.getElementById('sex_usuario').value;
		var fecha_nac_usuario=document.getElementById('fecha_nac_usuario').value;				
		var tel_usuario =document.getElementById('tel_usuario').value;
		var pro_usuario =document.getElementById('pro_usuario').value;
		var car_usuario =document.getElementById('car_usuario').value;
		var obs_usuario =document.getElementById('obs_usuario').value;
		e.preventDefault();	
		if($("#nom_usuario").val()=="" || $("#ape_usuario").val()=="" || $("#doc_usuario").val()=="" || $("#sex_usuario").val()=="" || $("#fecha_nac_usuario").val()=="" || $("#tel_usuario").val()=="" || $("#pro_usuario").val()=="" || $("#car_usuario").val()==""){alert("Debe diligenciar todos los campos")}else{	
		var datos =  {
					'nom_usuario': $("#nom_usuario").val(),
					'ape_usuario': $("#ape_usuario").val(),
					'doc_usuario': $("#doc_usuario").val(),
					'sex_usuario': $("#sex_usuario").val(),
					'fecha_nac_usuario': $("#fecha_nac_usuario").val(),
					'tel_usuario': $("#tel_usuario").val(),
					'pro_usuario': $("#pro_usuario").val(),
					'car_usuario': $("#car_usuario").val(),
					'obs_usuario': $("#obs_usuario").val()
													
					};
	$.ajax({
			data: datos,
			url:'registro_usuario.php',
			type:'post',
			beforeSend: function(){
			$('#registro_usuario').html('<div><img src="images/load.gif"/></div>');
			},
			success: function(response){
			$("#registro_usuario").html(response);		
			}			
		});	
		}
	});
	
	//actualiza usuario
	
	$("#btn_sav_usu").click(function(e){
		//alert("gravar")
		e.preventDefault();
		//alert($("#obs_usuario").val());
		var nom_usuario=document.getElementById('nom_usuario').value;				
		var ape_usuario =document.getElementById('ape_usuario').value;
		var doc_usuario =document.getElementById('doc_usuario').value;
		var sex_usuario =document.getElementById('sex_usuario').value;
		var fecha_nac_usuario=document.getElementById('fecha_nac_usuario').value;				
		var tel_usuario =document.getElementById('tel_usuario').value;
		var pro_usuario =document.getElementById('pro_usuario').value;
		var car_usuario =document.getElementById('car_usuario').value;
		var obs_usuario =document.getElementById('obs_usuario').value;
		var datos =  {
					'nom_usuario': $("#nom_usuario").val(),
					'ape_usuario': $("#ape_usuario").val(),
					'doc_usuario': $("#doc_usuario").val(),
					'sex_usuario': $("#sex_usuario").val(),
					'fecha_nac_usuario': $("#fecha_nac_usuario").val(),
					'tel_usuario': $("#tel_usuario").val(),
					'pro_usuario': $("#profesion").val(),
					'car_usuario': $("#cargo").val(),
					'obs_usuario': $("#obs_usuario").val(),
					'estado': $("#estado").val()
													
					};
	<!--	if(pro_usuario==-1){			
	//alert("Seleccione el tipo de consulta");	
	//}else{	-->
	$.ajax({
			data: datos,
			url:'registro_actualiza_usuarios.php',
			type:'post',
			beforeSend: function(){
			$('#form_prestamo').html('<div><img src="images/load.gif"/></div>');
			},
			success: function(response){
			$("#form_prestamo").html(response);		
			}			
		});	
		//}				
	});
	
	//fin actualiza
	
	//inicio
	$("#btn_reg_hc").click(function(e){
		e.preventDefault();
		//alert("hc");
		var num_h_c=document.getElementById('num_h_c').value;				
		var tipo_documento =document.getElementById('tipo_documento').value;
		var documento =document.getElementById('documento').value;
		var apellidos =document.getElementById('apellidos').value;
		var nombres=document.getElementById('nombres').value;				
		var sexo =document.getElementById('sexo').value;
		var id_aseguradora =document.getElementById('id_aseguradora').value;
		var obs_hc =document.getElementById('obs_hc').value;
			//alert(num_h_c);
	if(num_h_c==""|| tipo_documento=="" || documento=="" || apellidos=="" || nombres==""|| sexo=="" || id_aseguradora<=-1){
			alert("Se deben llenar todos los campos");
			}else{
			
		var datos =  {
					'num_h_c': $("#num_h_c").val(),
					'tipo_documento': $("#tipo_documento").val(),
					'documento': $("#documento").val(),
					'apellidos': $("#apellidos").val(),
					'nombres': $("#nombres").val(),
					'sexo': $("#sexo").val(),
					'id_aseguradora': $("#id_aseguradora").val(),
					'obs_hc': $("#obs_hc").val(),
													
					};
	<!--	if(pro_usuario==-1){			
	//alert("Seleccione el tipo de consulta");	
	//}else{	-->
	$.ajax({
			data: datos,
			url:'registro_hc.php',
			type:'post',
			beforeSend: function(){
			$('#registro_usuario').html('');
			},
			success: function(response){
			$("#registro_usuario").html(response);		
			}			
		});	
		}				
	});
	//final

	$("#btn11").click(function(e){
	$("#informacion").html("<br><div id='busqueda'><center><h2>Buscando citas para este dia...</h2></center></div>");					
	e.preventDefault();
	var datos =  {
	'con_fecha_cita': $("#con_fecha_cita").val(),
	};					
		$.ajax({
			data: datos,
			url:'reporte_citas.php',
			type:'post',
			beforeSend: function(){
				$("#informacion").html("<br><div id='busqueda'><center><h2>Buscando...</h2></center></div>");
			},
			success: function(response){
			$("#informacion").html(response);
		
			}
			
		});
		});
		
	$("#btn_con").click(function(e){
	e.preventDefault();
	if($("#con_nombre").val()!=""){	
		$("#informacion").html("<br><div id='busqueda'><center><h2>Buscando citas para este dia...</h2></center></div>");		
	var datos =  {
	'con_nombre': $("#con_nombre").val(),
	};					
		$.ajax({
			data: datos,
			url:'reporte_citas_estudiante.php',
			type:'post',
			beforeSend: function(){
				$("#informacion").html("<br><div id='busqueda'><center><h2>Buscando...</h2></center></div>");
			},
			success: function(response){
			$("#informacion").html(response);		
			}			
		});
		 }else{
			alert("Debe ingrear un nombre o apellido"); 
		 }
		});


	$("#btn12").click(function(e){
		//alert("Registrando novedad");		
	//	$("#informacion").html("<p>Registrando en historia clinica</p>");					
		e.preventDefault();
		var datos =  {
			
			'id_cita': $("#id_cita").val(),
			'novedad': $("#novedad").val(),
			};					
		$.ajax({
			data: datos,
			url:'registro_novedad.php',
			type:'post',
			beforeSend: function(){
				$("#contenedor_historia").html("Procesando....");
			},
			success: function(response){
			$("#contenedor_historia").html(response);
		
			}
			
		});
		// }
	});
	
	//si
	$("#si").click(function(e){
		
			
		//alert("Asistio");		
		$("#informacion").html("<p>Registrando asistencia</p>");					
		e.preventDefault();
		//if($("#documento").val().length >5){		
		//alert($("#con_fecha_cita").val());
		var datos =  {
			
			'id_cita': $("#id_cita").val(),
			/*'': $("#novedad").val(),
			'control': $("#control").val(),
			};					
		$.ajax({
			data: datos,
			url:'asistencia.php',
			type:'post',
			beforeSend: function(){
				$("#informacion").html("Procesando....");
			},
			success: function(response){
			$("#informacion").html(response);
		
			}
			
		});
		// }
	});
	
	$("#btn23").click(function(e){
			//alert("consulta");		
		$("#contenedor_pagina").html("<p></p>");
		e.preventDefault();
		if($("#nom_estudiante").val()!=""){		
			
		var datos =  {
			'year': $("#year").val(),
			'id_periodo': $("#id_periodo").val(),
			};					
		$.ajax({
			data: datos,
			url:'reporte_casos_asistidos.php',
			type:'post',
			beforeSend: function(){
				$("#contenedor_pagina").html("<br><div id='busqueda'><center><h2>Buscando...</h2></center></div>");
			},
			success: function(response){
			$("#contenedor_pagina").html(response);
		
			}
			
		});
		 }else{
			alert("Debe Ingresar un Documento Valido"); 
		 }
	});
	//actualizar informacion
	$("#btn31").click(function(e){
			//alert("actualiza");		
		$("#consulta").html("<p></p>");
		e.preventDefault();
		if($("#nom_estudiante").val()!=""){		
			
		var datos =  {
			'id_est': $("#id_est").val(),
			'nom_est': $("#nom_est").val(),
			'ape_est': $("#ape_est").val(),
			'sexo': $("#sexo").val(),
			'fecha_nac': $("#fecha_nac").val(),
			'tel_est': $("#tel_est").val(),
			'dir_est': $("#dir_est").val(),
			'nom_padre': $("#nom_padre").val(),
			'tel_padre': $("#tel_padre").val(),
			'nom_madre': $("#nom_madre").val(),
			'tel_madre': $("#tel_madre").val(),
			'grado': $("#grado").val(),
			'estado': $("#estado").val(),
			};					
		$.ajax({
			data: datos,
			url:'recibe_actualizacion_estudiante.php',
			type:'post',
			beforeSend: function(){
				$("#registro_est").html("");
			},
			success: function(response){
			$("#registro_est").html(response);
		
			}
			
		});
		 }else{
			alert("Debe Ingresar un Documento Valido"); 
		 }
	});
	
	// inicio pretamo
	$("#btn_prestamo").click(function(e){
			//alert("prestamo");		
	//	$("#consulta").html("<p></p>");
		e.preventDefault();
		if($("#id_usuario_recibe").val()>=0){		
			
		var datos =  {
			'id_usuario': $("#id_usuario").val(),		
			'id_usuario_recibe': $("#id_usuario_recibe").val(),			
			'fecha_prestamo': $("#fecha_prestamo").val(),			
			'hora_prestamo': $("#hora_prestamo").val(),
			'num_hc': $("#num_hc").val(),
			'observacion': $("#observacion").val(),
			'externo': $("#externo").val(),
			};					
		$.ajax({
			data: datos,
			url:'registro_prestamo_hc.php',
			type:'post',
			beforeSend: function(){
				$("#form_prestamo").html("");
			},
			success: function(response){
			$("#form_prestamo").html(response);
		
			}
			
		});
		 }else{
			alert("¿Que usuario recibe la H.C.?"); 
		 }
	});//fin pretamo 
	
	
	//devolucion insercion tabla
	$("#btn_hc").click(function(e){
		//	alert("Devolucion registro");		
	//	$("#consulta").html("<p></p>");
		e.preventDefault();
		if($("#num_hc").val()!=""){		
			
		var datos =  {
			   'num_hc': $("#num_hc").val(),			
				};					
		$.ajax({
			data: datos,
			url:'reporte_hc_movimiento.php',
			type:'post',
			beforeSend: function(){
				$("#form_prestamo").html("");
			},
			success: function(response){
			$("#form_prestamo").html(response);
		
			}
			
		});
		 }else{
			alert("Debe Ingresar un numero de historia clinica Valido"); 
		 }
	});//fin devolucion 
	
	
	//citas consulta rapidas
		//$("#info").click(function(e){
	   $("#fecha_cita").change(function(e){
		//alert("consulta por fecha");		
		$("#registro_cita_d").html("<p>Cargando citas para este dia</p>");					
		e.preventDefault();
		//if($("#documento").val().length >5){		
		//alert($("#con_fecha_cita").val());
		var datos =  {
			
			'con_fecha_cita': $("#fecha_cita").val(),
			
					
					};					
		$.ajax({
			data: datos,
			url:'reporte_citas_rapidas.php',
			type:'post',
			beforeSend: function(){
				$("#registro_cita_d").html("<div>Buscando....</div>");
			},
			success: function(response){
			$("#registro_cita_d").html(response);
		
			}
			
		});
		// }
	});
	//cambio periodo
	$("#btn_hc").click(function(e){
		//$("#respuesta_periodo").html("<p>Actualizando periodo academico</p>");
		//alert("reporte");					
		e.preventDefault();
		var datos =  {
			'id_periodo_v': $("#id_periodo_v").val(),
			'id_periodo_n': $("#id_periodo_n").val(),
			};					
		$.ajax({
			data: datos,
			url:'recibe_configuracion.php',
			type:'post',
			beforeSend: function(){
				$("#registro_est").html("Procesando....");
			},
			success: function(response){
			$("#registro_est").html(response);
			//$("#registro_est").html("");
		
			}
			
		});
		// }
	});
	//OTRO
	
	$("#btn_hc").click(function(e){
		//$("#respuesta_periodo").html("<p>Actualizando periodo academico</p>");
		//alert("reporte");					
		e.preventDefault();
		var datos =  {
			'id_periodo_v': $("#id_periodo_v").val(),
			'id_periodo_n': $("#id_periodo_n").val(),
			};					
		$.ajax({
			data: datos,
			url:'recibe_configuracion.php',
			type:'post',
			beforeSend: function(){
				$("#registro_est").html("Procesando....");
			},
			success: function(response){
			$("#registro_est").html(response);
			//$("#registro_est").html("");
		
			}
			
		});
		// }
	});
	
	//FIN OTRO
	$("#btn_devolucion").click(function(e){
	e.preventDefault();
	if($("#id_usuario_devuelve").val()==-1){alert("Seleccion el usuario que devuelve la H.C.");}else{	
		
	$("#respuesta_busqueda_hc").html("<br><div id='busqueda'></div>");					
	
	var datos =  {
	'id_prestamo': $("#id_prestamo").val(),
	'id_usuario_devuelve': $("#id_usuario_devuelve").val(),
	'fecha_devolucion': $("#fecha_devolucion").val(),
	'hora_devolucion': $("#hora_devolucion").val(),
	'observacion_devolucion': $("#observacion_devolucion").val(),	
	};					
		$.ajax({
			data: datos,
			url:'registro_devolucion_hc.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta_busqueda_hc").html("<br><div id='busqueda'></div>");
				$("#form_prestamo").html("");
			},
			success: function(response){
			$("#respuesta_busqueda_hc").html(response);
		
			}
			
		});
		}
		});*/
		
				$("#nomenclatura").change(function(e){
				e.preventDefault();
				var grado = ($("#grado").val());
				var extra = ($("#id_curso").val());
				//alert(extra);
				var nome = ($("#nomenclatura").val());
				 $("#nuevo_curso").html(grado+'-'+nome);
				});

		//devolucion_hc
			$("#btn-bus-grado").click(function(e){
				e.preventDefault();
			  // alert($("#grado").val());
				if($("#grado").val()!=0){
	$("#respuesta_busqueda_hc").html("<br><div id='busqueda'></div>");					
	e.preventDefault();
	var datos =  {
	'grado': $("#grado").val(),
	};					
		$.ajax({
			data: datos,
			url:'consulta_grados.php',
			type:'post',
			beforeSend: function(){
				
				$("#respuesta").html("<br><div id='busqueda'></div>");
			},
			success: function(response){
			$("#respuesta").html(response);
		
			}
			
		});
		}else{
			alert("Seleccione un Curso");
			}
		});//fin devolucion
		/*
			//insertar aseguradoras
		$("#as").click(function(e){
	 	//alert("insertar aseguradora");		
		//$("#registro_cita_d").html("<p>Cargando citas para este dia</p>");					
		e.preventDefault();
		if($("#aseguradora").val()!=""){		
		var datos =  {
			'aseguradora': $("#aseguradora").val(),					
					};					
		$.ajax({
			data: datos,
			url:'registro_aseguradora.php',
			type:'post',
			beforeSend: function(){
				$("#div_aseguradora").html("<div>Registrando....</div>");
			},
			success: function(response){
			$("#div_aseguradora").html(response);
		
			}
			
		});
		}else{
			alert('Ingrese Nombre de Aseguradora');
		}
	});
	
	// otro mas
	$("#btn_buscar_hc").click(function(e){
		//	alert("buscar para prestar");		
	//	$("#consulta").html("<p></p>");
		e.preventDefault();
		if($("#num_hc").val()!=""){		
			
		var datos =  {
			'num_hc': $("#num_hc").val(),		
		
			};					
		$.ajax({
			data: datos,
			url:'busqueda_hc.php',
			type:'post',
			beforeSend: function(){
				$("#form_prestamo").html("");
			},
			success: function(response){
			$("#form_prestamo").html(response);
		
			}
			
		});
		 }else{
			alert("Debe Ingresar un Documento Valido"); 
		 }
	});//fin pretamo 
	*/
	
$("#login1").click(function(e){
	e.preventDefault();
    //alert("actualiza egresado");
    var nomAgente=$('#nomAgente').val();
    var desRango = $('#desRango').val();
	var idAgente = $('#idAgente').val();

   // alert("es la control"+control+foto);   
      if(nomAgente ==""){
        $("#mensaje1").fadeIn();
        return false;
      }else{
        $("#mensaje1").fadeOut();
        
       
         var data = new FormData();    
         data.append('idAgente',idAgente);
         data.append('nomAgente',nomAgente);
         data.append('desRango',desRango);
    
        // alert(controlPDF);         
        $.ajax({
          url:"recibe_actualiza_egresado.php",
           type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,
                 
          beforeSend:function() {
            $('#login1').val("Conectando...");
          },
          success:function(data) {
           $("#resultado").html("<div class='alert alert-dismissible alert-info'><strong>Actualizando</strong> Actualizando información Egresado</div>");
            $('#login1').val("Ingresar");
            if (data=="1") {//<button type='button' class='close' data-dismiss='alert'>&times;</button>
             $("#resultado").html("<div class='alert alert-dismissible alert-success'><strong>¡Correcto!</strong> Egresado Actualizado con Éxito, Ahora diligencie la sigiente encuesta.<br><div class='container center-block'><iframe src='https://docs.google.com/forms/d/e/1FAIpQLSeCk-xQmdNrH1tIqhVlwZqFToNn7itrAD4-NBYNeMM5IICnnA/viewform?embedded=true' width='700' height='520' frameborder='0' marginheight='0' marginwidth='0'>Cargando...</iframe></div></div>");
            } else {
              $("#resultado").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Estudiante.</div>");
            }
          }
        });
		}
       
      
     
   }); 

//finaliza


//incio boton registro formulario curso
$("#login2").click(function(e){
	e.preventDefault();
 //  alert("formulario curso");
    //$(":input:first").focus();
    var grado=$('#grado').val();
    var nomenclatura = $('#nomenclatura').val();
    var doc_docente=$('#doc_docente').val();
    var id_jornada = $('#id_jornada').val();
    var num_cupos=$('#num_cupos').val();
      // alert("es la var"+nombre);
         if(grado ==""){
        $("#mensaje1").fadeIn();
        return false;
      }else{
        $("#mensaje1").fadeOut();
         if(nomenclatura==""){
        
            $("#mensaje2").fadeIn();
            return false;
          }else{
            $("#mensaje2").fadeOut();
          if(doc_docente==""){
                   
                      $("#mensaje3").fadeIn();
                      return false;
                    }else{
                      $("#mensaje3").fadeOut();

                 if(id_jornada==""){
                   
                      $("#mensaje4").fadeIn();
                      return false;
                    }else{
                      $("#mensaje4").fadeOut();
     
        $.ajax({
          url:"recibe_formulario_curso.php",
          method:"POST",
          data:{
               grado:grado,
               nomenclatura:nomenclatura,
               doc_docente: doc_docente,
               id_jornada:id_jornada,
               num_cupos:num_cupos              
             },
          cache:"false",
          beforeSend:function() {
            $('#login2').val("Conectando...");
          },
            success:function(data) {
            $('#login2').val("Ingresar");
            if (data=="1") {
             $("#resultado").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Curso Creado con Éxito.</div>");
            } else {
              $("#resultado").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Crear Curso.</div>");
            }
          }



        });
}
          }
        }

      }
    }); 

    //fin para 
$("#grado").change(function(){
           
            var valor = $("#grado option:selected").html();
  //  alert(valor);
$("#gradoI").val(valor);
 var va = $("#grado option:selected").val();
//alert(va);
 $("#id_curso").val(va);
	});

//finaliza


//inicia insersion admin

 $("#btn-act-adm").click(function(e){
  e.preventDefault();
    //alert("actuliza administrativo viejo");
    //$(":input:first").focus();
    var nom_usu=$('#nom_usu').val();
    var ape_usu = $('#ape_usu').val();
    var doc_usu=$('#doc_usu').val();
    //var fecha_nac_docente = $('#fecha_nac_docente').val();
    // var sexo=$('#sexo').val();
    var correo_usu = $('#correo_usu').val();
    // var contrasena_usu=$('#contrasena_usu').val();
    var estado_usu = $('#estado_usu').val();
    //var nivel_admin = $('#nivel_admin').val();
    //var observacion=$('#observacion').val();
    //+sexo+correo_docente+tel_docente+dir_docente+observacion
    //alert("id estado docente"+estado_docente);
    //alert(nom_usu+""+ape_usu+""+doc_usu+""+correo_usu+""+estado_usu);
    //  alert("es la var"+nom_docente+ape_docente+doc_docente+fecha_nac_docente+sexo+correo_docente+tel_docente+dir_docente+observacion);
   
      if(nom_usu ==""){
        $("#mensaje1").fadeIn();
        return false;
      }else{
        $("#mensaje1").fadeOut();
         if(ape_usu==""){        
            $("#mensaje2").fadeIn();
            return false;
          }else{
            $("#mensaje2").fadeOut();
          if(doc_usu==""){
                   
                      $("#mensaje3").fadeIn();
                      return false;
                    }else{
                      $("#mensaje3").fadeOut();

                 if(correo_usu==""){
                   
                      $("#mensaje4").fadeIn();
                      return false;
                    }else{
                      $("#mensaje4").fadeOut();
     
        $.ajax({
          url:"recibe_actualiza_administrativo.php",
          method:"POST",
          data:{         
          'doc_usu':doc_usu,
          'nom_usu':nom_usu,
          'ape_usu':ape_usu,
          'correo_usu':correo_usu,
          'estado_usu':estado_usu
         // nivel_admin:nivel_admin,
         // 'contrasena_usu':contrasena_usu,         
             },
          cache:"false",
          beforeSend:function() {
            $('#btn-act-adm').val("Conectando...");
          },
          success:function(data) {
            $('#btn-act-adm').val("Ingresar");
            // $("#resultado").html(data);
            if (data=="1") {
            	
             $("#resultado").html("<br><div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Administrativo actualizado con Éxito.</div>");
            } else {
              $("#resultado").html("<br><div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Administrativo.</div>");
            }
          }

        });
}
          }
        }

      }
    });

//finaliza actualiza admin	

//inicia modifica empresa 

 $("#login6").click(function(e){
  e.preventDefault();
   //alert("actuliza empresa");
    //$(":input:first").focus();
    var id_emp=$('#id_emp').val();
    var nom_emp=$('#nom_emp').val();
    var nom_contacto = $('#nom_contacto').val();
    var id_tipo_emp=$('#id_tipo_emp').val();
    var tel_emp = $('#tel_emp').val();
    var correo_emp=$('#correo_emp').val();
    var dir_emp = $('#dir_emp').val();
    var nit_emp=$('#nit_emp').val();
        if(nom_emp ==""){
        $("#mensaje1").fadeIn();
        return false;
      }else{
        $("#mensaje1").fadeOut();
         if(nom_contacto==""){
            $("#mensaje2").fadeIn();
            return false;
          }else{
            $("#mensaje2").fadeOut();
          if(id_tipo_emp==""){                   
                      $("#mensaje3").fadeIn();
                      return false;
                    }else{
                      $("#mensaje3").fadeOut();
                 if(tel_emp==""){                   
                      $("#mensaje4").fadeIn();
                      return false;
                    }else{
                      $("#mensaje4").fadeOut();     
        $.ajax({
          url:"recibe_actualiza_empresa.php",
          method:"POST",
          data:{         
          'nom_emp':nom_emp,
          'nom_contacto':nom_contacto,
          'id_tipo_emp':id_tipo_emp,
          'tel_emp':tel_emp,
          'correo_emp':correo_emp,
          'dir_emp':dir_emp,
          'nit_emp':nit_emp,
          'id_emp':id_emp,
    
             },
          cache:"false",
          beforeSend:function() {
            $('#login6').val("Conectando..."); 
           },
          success:function(data) {
            $('#login6').val("Ingresar");
            if (data=="1") {
             $("#resultadoI").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Empresa Actualizada con Éxito.</div>");
              setTimeout('document.location.reload()',1000);
            } else {
              $("#resultadoI").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Empresa.</div>");
            }
          }
        });
			}
          }
        }

      }
    });

//finaliza actualiza empresa	

//inicia modifica solicitud 

 $("#btn-act-sol").click(function(e){
   e.preventDefault();
  
    //$(":input:first").focus();
    var id_solicitud=$('#id_solicitud').val();
    var nit_emp=$('#nit_emp').val();
    var id_titulo=$('#id_titulo').val();
    var informacion = $('#informacion').val();
    var id_horario=$('#id_horario').val();
    var id_estado=$('#id_estado').val();
    //alert(id_estado);
            if(nit_emp ==""){
        $("#mensaje1").fadeIn();
        return false;
      }else{
        $("#mensaje1").fadeOut();
         if(id_titulo==""){
            $("#mensaje2").fadeIn();
            return false;
          }else{
            $("#mensaje2").fadeOut();
          if(informacion==""){                   
                      $("#mensaje3").fadeIn();
                      return false;
                    }else{
                      $("#mensaje3").fadeOut();
                 if(id_horario==""){                   
                      $("#mensaje4").fadeIn();
                      return false;
                    }else{
                      $("#mensaje4").fadeOut();     
        $.ajax({
          url:"recibe_actualiza_solicitud.php",
          method:"POST",
          data:{   
          'id_solicitud':id_solicitud,      
          'nit_emp':nit_emp,
          'id_titulo':id_titulo,
          'informacion':informacion,
          'id_horario':id_horario,
          'id_estado':id_estado,
                },
          cache:"false",
          beforeSend:function() {
            $('#btn-act-sol').val("Conectando..."); 
           },
          success:function(data) {
          //	$("#resultado").html(data);
            $('#btn-act-sol').val("Ingresar");
            $("#resultado").html(data);
          if (data=="1") {
            $("#resultado").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> solicitud Actualizada con Éxito.</div>").delay( 1000 );
          //  window.location.href = "menu.php"

           
          } else {
            $("#resultado").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar solicitud.</div>");
          }
          }
        });
			}
          }
        }

      }
    });

//finaliza actualiza solicitud	


//inicia cambio de periodo academico
$("#btn-act-per").click(function(e){
	e.preventDefault();
   //alert("cambio periodo academico");
    //$(":input:first").focus();
    var id_periodo=$('#id_periodo').val();
    ///var nomenclatura = $('#nomenclatura').val();
   
      // alert("es la var"+nombre);
             
        $.ajax({
          url:"recibe_actualiza_periodo.php",
          method:"POST",
          data:{
               id_periodo:id_periodo,
                          
             },
          cache:"false",
          beforeSend:function() {
            $('#btn-act-per').val("Conectando...");
          },
            success:function(data) {
            $('#btn-act-per').val("Ingresar");
            if (data=="1") {
             $("#resultado").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Periodo Actualizado con Éxito.</div>").delay(90000);
            setTimeout('document.location.reload()',2000);
            } else {
              $("#resultado").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Periodo.</div>");
            }
          } //data



        });

         
    }); 

    //fin para 


//inicia cambio año lectivo
    $("#btn-act-lec").click(function(e){
	e.preventDefault();
   //alert("cambio lectivo");
    //$(":input:first").focus();
    var id_lectivo=$('#id_lectivo').val();
    ///var nomenclatura = $('#nomenclatura').val();
   
      // alert("es la var"+id_lectivo);
             
        $.ajax({
          url:"recibe_actualiza_lectivo.php",
          method:"POST",
          data:{
               id_lectivo:id_lectivo,
                          
             },
          cache:"false",
          beforeSend:function() {
            $('#btn-act-lec').val("Conectando...");
          },
            success:function(data) {
            $('#btn-act-lec').val("Ingresar");
            if (data=="1") {
             $("#resultado_lec").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Años Lectivo Actualizado con Éxito.</div>").delay(90000);
            setTimeout('document.location.reload()',2000);
            } else {
              $("#resultado_lec").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Años Lectivo.</div>");
            }
          } //data



        });

         
    }); 

    //finaliza camibo de año lectivo
$("#btn-bus-grado").change(function(){
           
            var valor = $("#grado option:selected").html();
   // alert(valor);
$("#gradoI").val(valor);
 var va = $("#grado option:selected").val();
 //alert(va);
 $("#id_curso").val(va);
	});

//finaliza

//inicia cambio estado curso
	$("a.vinculo").click(function() {
		//		alert("cabio estado curso");
                var oID = $(this).attr("id");
              //  alert("variable pura: "+oID);
				var id_cur="id_cur"+oID;
				var id_curso= $('#'+id_cur).val();
			
		var datos =  {
			/*'id_materia': oID,
			'doc_docente': doc_docente,
			'grado':grado,*/
			'id_curso':id_curso,
			/*'control':control,
			'var_id_asi':var_id_asi,*/
			};					
		$.ajax({
			data: datos,
			url:'cambia_estado_curso.php',
			type:'post',
			beforeSend: function(){
				$("#result"+oID).html("<div id='exito'>Procesando...</div>");
			},
			success: function(response){
			$("#result"+oID).html(response);

			if (response=="1") {
             $('#result'+oID).html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Correcto</strong></div>");
             $('#img'+oID).removeClass( "glyphicon glyphicon-ok" ).addClass( "glyphicon glyphicon-lock" );
            }else{
			 $('#result'+oID).html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Incorrecto</strong></div>");

            }
		// location.reload();		
			}			
		});

		//}
                });

                //finaliza boton cambio estado curso

        $("button.vinculo").click(function() {
				//alert("cabio de nota se espera");
               var oID = $(this).attr("id");
             //  alert("Es id nota"+oID);
               var pro="new"+oID;
              //  alert("variable pura: "+pro);
           //  alert($('#'+pro).val());
				//var id_cur="vari"+oID;
			//	var id_curso= $('#'+id_cur).val();	
		var datos =  {
			//'id_curso':id_curso,	
			'id_nota': oID,	
			'new_nota': $('#'+pro).val(),		
			};					
		$.ajax({
			data: datos,
			url:'actualiza_nota.php',
			type:'post',
			beforeSend: function(){
				$("#men"+oID).html("<div id='exito'>Procesando...</div>");
			},
			success: function(response){
			$("#men"+oID).html(response);

			if (response=="1") {
             $('#men'+oID).html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Correcto</strong></div>");
           //  $('#img'+oID).removeClass( "glyphicon glyphicon-ok" ).addClass( "glyphicon glyphicon-lock" );
            }else{
			 $('#men'+oID).html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Incorrecto</strong></div>");

            }
		
			}			
		});

                });


//inicia ingresar materia
//registro lectivo
	$("#btn-reg-materia").click(function(e){
		alert("registro materia");
		//$("#consulta").html("<p></p>");
		//$("#informacion").html("<p></p>");
		e.preventDefault();
		//if($("#documento").val()!=""){		
		var datos =  {
			'nom_materia': $("#nom_materia").val(),
			'nom_corto_materia': $("#nom_corto_materia").val()
			};					
		$.ajax({
			data: datos,
			url:'recibe_formulario_materia.php',
			type:'post',
			beforeSend: function(){
				$("#btn-reg-materia").html("Buscando...");
			},
			 success:function(data) {
            $('#btn-reg-materia').val("Ingresar");
            if (data=="1") {
             $("#resultado").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Año Lectivo Creado con Éxito.</div>");
            } else {
              $("#resultado").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al crear el Año Lectivo.</div>");
            }
          }

			//$("#respuesta-ingreso").load("php/menu.php");
				//if(("#respuesta-ingreso").text()=="1"){
				//window.location.href = "menu.php";
					//echo "$ddd";
				//}		
			//}			
		});
		// }else{
			//alert("Ingrese el nombre o apellido del estudiante."); 
		// }
		 /*
		 */
	});
//finaliza registro materia
//inicia materias activar

$("a.vinculoy").click(function() {
	 var oID = $(this).attr("id");
	// alert(oID);
     //  $('#enviar').click(function(){
        var selected = '';   
        var ides=''; 
        var linea='';
        var marcado='';
        var valores	='';
        $('#form1 input[type=checkbox]').each(function(){
          //  if (this.checked) {
            //   linea$(this).val()+'-'+
			marcado += $(this).attr("id")+'/';
            valores += $(this).val()+'/'; 	
              //  ides  += $(this).attr("id");
               alert(marcado);
         //  } 
        }); 
       var datos =  {'marcado': marcado,
       				 'valores':valores,
   };

        $.ajax({
			data: datos,
			url:'recibe_actualiza_grado_materia.php',
			type:'post',
			beforeSend: function(){
				$("#btn-reg-materia").html("Buscando...");
			},
			 success:function(data) {
            $('#btn-reg-materia').val("Ingresar");
           /* if (data=="1") {
             $("#resultado").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Año Lectivo Creado con Éxito.</div>");
            } else {
              $("#resultado").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al crear el Año Lectivo.</div>");
            }*/
              $("#resultado").html(data);
          }

			//$("#respuesta-ingreso").load("php/menu.php");
				//if(("#respuesta-ingreso").text()=="1"){
				//window.location.href = "menu.php";
					//echo "$ddd";
				//}		
			//}			
		});

   /*     if (linea != '') 
            alert('Has seleccionado: '+linea);  
      	//	alert('son id'+ides);
        else
            alert('Debes seleccionar al menos una opción.');

        return false;*/ 
    });     

//finaliza materias finalizar

	$(".vin").click(function() {
	 		//alert("Evaluar egresado");
              var oID = $(this).attr("id");
                var a='sol'+oID;
				var b ='nit'+oID;
				var c ='nom'+oID;
				var d ='vin'+oID;
				var e = 'doc_est'+oID;
				var plaza= $('#'+a).val();
				var nit= $('#'+b).val();
				var nom= $('#'+c).val();
				var vin= $('#'+d).val();
				var doc_est= $('#'+e).val();
		
		var datos =  {
			'nit':nit,
			'plaza':plaza,	
			'nom':nom,	
			'vin':vin,	
			'doc_est':doc_est,	
			};					
	$.ajax({
			data: datos,
			url:'formulario_evaluar.php',
			type:'post',
			beforeSend: function(){
				$("#respuestax").html("Buscando...");
			},
			success: function(response){
			$("#respuestax").html(response);
		    		}			
				});
              });



//inicia prueba
	$(".vinculo").click(function() {
			//	alert("cabio estado curso");
                var oID = $(this).attr("id");
                var a='sol'+oID;
				var b ='nit'+oID;
				var plaza= $('#'+a).val();
				var nit= $('#'+b).val();
		
		var datos =  {
			'nit':nit,
			'plaza':plaza,			
			};					
	$.ajax({
			data: datos,
			url:'plaza.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta").html("Buscando...");
			},
			success: function(response){
			$("#respuesta").html(response);
		    		}			
				});
              });

                //finaliza prueba

//inicia postulacion egresado
	$(".vinculoP").click(function() {
				//alert("Plaza candidatos");
                var oID = $(this).attr("id");
                var a='sol'+oID;
				var b ='nit'+oID;
				var plaza= $('#'+a).val();
				var nit= $('#'+b).val();
		
		var datos =  {
			'nit':nit,
			'plaza':plaza,			
			};					
	$.ajax({
			data: datos,
			url:'plaza_candidato.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta").html("Buscando...");
			},
			success: function(response){
			$("#respuesta").html(response);
		    		}			
				});
              });
	//finaliza pustulacion egresado

	//inicia postulacion egresado
	$(".vinculoH").click(function() {
				//alert("Hoja de vida");
                var oID = $(this).attr("id");
                var a='postular'+oID;
				//var b ='nit'+oID;
				var documento= $('#'+a).val();
				//alert(documento);
				//var documento= '1085249954';
				//alert(documento);
		
		var datos =  {
			'documento':documento,
			//'plaza':plaza,			
			};					
	$.ajax({
			data: datos,
			//url:'formulario_egresado_modificar.php',
			url:'hoja_vida.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta5").html("Buscando...");
			},
			success: function(response){
				$("#respuesta5").html(response);
		    		}			
				});
              });
	//finaliza pustulacion egresado

                //inicia modificar empresa
	$(".vinculoE").click(function() {
				//alert("cabio estado empresa");
                var oID = $(this).attr("id");
                var a='sol'+oID;
				var b ='id_emp'+oID;
				var plaza= $('#'+a).val();
				var id_emp= $('#'+b).val();
		
		var datos =  {
			'id_emp':id_emp,
			//'plaza':plaza,			
			};					
	$.ajax({
			data: datos,
			url:'formulario_empresa_modificar.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta").html("Buscando...");
			},
			success: function(response){
			$("#respuesta").html(response);
		    		}			
				});
              });

                //finaliza modificar empresa

                 //inicia modificar solicitud
	$(".vinculoI").click(function() {
				//alert("cabio solicitu");
                var oID = $(this).attr("id");
                var a='sol'+oID;
				//var b ='id_emp'+oID;
				var id_sol= $('#'+a).val();
				//var id_emp= $('#'+b).val();
		
		var datos =  {
			'id_sol':id_sol,
			//'plaza':plaza,			
			};					
	$.ajax({
			data: datos,
			url:'formulario_solicitud_modificar.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta").html("Buscando...");
			},
			success: function(response){
			$("#respuesta").html(response);
		    		}			
				});
              });

                //finaliza modificar solicitud



                //plaza
	$("#plaza").click(function(e){
		e.preventDefault();
		//alert("Modificar "+$("#documento").val());
		if($("#documento").val()!=""){		
		var datos =  {
			'documento': $("#documento").val(),
			//'documento': $("#documento").val()
			};		
		$.ajax({
			data: datos,
			url:'plaza.php',
			type:'post',
			beforeSend: function(){
				$("#respuesta").html("Buscando...");
			},
			success: function(response){
			$("#respuesta").html(response);
			//$("#btn-ingreso").hide();
			//$("#btn-cerrar").hide();
			}			
		});
		}else{
			alert("Ingrese Documento Estudiante.");
		}
	});

// fin plaza
/*
$(".alert").click(function(e) {
	alert("hola");
})*/


$(".alert").click(function(e) {
	var oID = $(this).attr("id");
   // alert("variable pura postular: "+oID);
	var postular="postular"+oID;
	var doc_est= $('#'+postular).val();
	var id_plaza= $('#id_plaza').val();
	var nit= $('#nit').val();
    bootbox.confirm({
    message: "¿Desea Seleccionar al Egresado al cargo indicado?",
    buttons: {
    	  cancel: {
            label: 'Cancelar',
            className: 'btn-danger'
        },
        confirm: {
            label: 'Aceptar',
            className: 'btn-success'
        }
      },
    callback: function (result) {
    	//alert(result);
    	if(result==true){    		
			var datos =  {
			'doc_est':doc_est,
			'id_plaza':id_plaza,
			'nit':nit,
			};					
		$.ajax({
			data: datos,
			url:'postular.php',
			type:'post',
			beforeSend: function(){
				$("#postular"+oID).val("<div id='exito'>Procesando...</div>");
			},
			success: function(response){
			$("#result"+oID).html(response);

			if (response=="1") {
             $('#postular'+oID).val("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Correcto</strong></div>");
            // $('#img'+oID).removeClass( "glyphicon glyphicon-ok" ).addClass( "glyphicon glyphicon-lock" );
            }else{
			 $('#postular'+oID).val("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Incorrecto</strong></div>");
	            }
			}			
		});
		//alert("prueba");
		window.location.href = "menu.php";

	  }
            console.log('This was logged in the callback: ' + result);
    }
});



        });
//finaliza postulacion

// inicia postulacion del egresado por cuenta propia

$(".alert2").click(function(e) {
	var oID = $(this).attr("id");
   // alert("variable pura postular: "+oID);
	var sol="sol"+oID;
	var id_solicitud= $('#'+sol).val();
	var id_plaza= $('#id_plaza').val();
	var nit= $('#nit').val();
	//alert(id_solicitud);
    bootbox.confirm({
    message: "¿Desea postularse a la vacante laboral?",
    buttons: {
    	  cancel: {
            label: 'Cancelar',
            className: 'btn-danger'
        },
        confirm: {
            label: 'Aceptar',
            className: 'btn-success'
        }
      },
    callback: function (result) {
    	//alert(result);
    	if(result==true){    		
			var datos =  {
			//'doc_est':doc_est,
			//'id_plaza':id_plaza,
			//'nit':nit,
			id_solicitud:id_solicitud,
			};					
		$.ajax({
			data: datos,
			url:'candidatos.php',
			type:'post',
			beforeSend: function(){
			$(".u").val("<div id='exito'>Procesando...</div>");
			// $("#respueta_i").html("probando");
			},
			success: function(response){
	
if(response==0){
              $(".u").html("<br><div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Egresado no registrado</div>");

}else if(response==1){
             $(".u").html("<br><div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Egresado Registrado con Éxito.</div>");

}else{
              $(".u").html("<br><div class='alert alert-dismissible alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Advertencia!</strong> Egresado ya registrado anteriormente.</div>");

}

       
			}			
		});
		

	  }
           // console.log('This was logged in the callback: ' + result);
    }
});



        });
//finaliza postulacion estudiante


//inicia cambio estado horario
	$("button.hor").click(function(e) {
		e.preventDefault();
	            var oID = $(this).attr("id");
          		var id_hor="id_hor"+oID;
          		var id_hor= $('#'+id_hor).val();
				var est="est"+oID;
				var est= $('#'+est).val();
				if(est==0){est=1;}else if(est==1){est=0;}				
		var datos =  {		
			'id_hor':id_hor,	
			'est':est,			
			};					
		$.ajax({
			data: datos,
			url:'cambia_estado_horario.php',
			type:'post',
			beforeSend: function(){
				},
			success: function(response){
		if (response=="1") {
             $('#result').html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Correcto</strong></div>");
         }else{
			 $('#result').html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Incorrecto</strong></div>");
         }		
			}			
		});
    });
    //finaliza cambio de estado horario.

    //inicia cambio estado empresa
	$("button.emp").click(function(e) {
		//alert("cambio estado empresa");
		e.preventDefault();
		        var oID = $(this).attr("id");
          		var id_emp="id_emp"+oID;
          		var cor_emp="cor_emp"+oID;
				var id_emp= $('#'+id_emp).val();
				var est="est"+oID;
				var est= $('#'+est).val();
				var correo= $('#'+cor_emp).val();
				//alert(correo);
				if(est==0){est=1;}else if(est==1){est=0;}				
		var datos =  {		
			'id_emp':id_emp,	
			'est':est,
			'correo':correo,			
			};					
		$.ajax({
			data: datos,
			url:'cambia_estado_empresa.php',
			type:'post',
			beforeSend: function(){
				},
			success: function(response){
			// $('#result').html(response);	
		if (response=="1") {
				if(est==1){
				  $('#result').html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Correcto, se notificará a la empresa su Activación a través de correo electrónico</strong></div>");	
				}else{
					  $('#result').html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Actualizado con Éxito</strong></div>");
				}
         }else{
			 $('#result').html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Incorrecto</strong></div>");
         }	
			}			
		});
    });
    //finaliza cambio de estado empresa.

    //inicia cambio estado empresa
	$("btn-cerrar").click(function(e) {
		e.preventDefault();

	})
});

