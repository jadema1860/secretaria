$(document).ready(function() {	

$("#btn_bus_cur_all").click(function(e){
		e.preventDefault();
	//	alert($("#ano_lectivo").val());
	//	alert("no se");
		//if($("#ano_lectivo").val()!=""){		
		var datos =  {
			'ano_lectivo': $("#ano_lectivo").val(),
			};		
		$.ajax({
			data: datos,
			url:'busqueda_todos_cursos.php',
			type:'post',
			beforeSend: function(){
				$("#res_tabla").html("Buscando...");
			},
			success: function(response){
			$("#res_tabla").html(response);
			}			
		});
		//}else{
			//alert("Ingrese Nombres, Apelidos ó Documento");
		//}
	});

})