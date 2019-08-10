$(document).ready(function(){
    $('.modal-footer button').click(function(){
		var button = $(this);


		//alert();
		//$("#consulta").html("<p></p>");
		//$("#informacion").html("<p></p>");



		if ( button.attr("data-dismiss") != "modal" ){


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
			
			//$("#respuesta-ingreso").load("php/menu.php");
				//if(("#respuesta-ingreso").text()=="1"){
				//window.location.href = "menu.php";
					//echo "$ddd";
				}		
			});

			var inputs = $('form input');
			var title = $('.modal-title');
			var progress = $('.progress');
			var progressBar = $('.progress-bar');

			inputs.attr("disabled", "disabled");
			

			button.hide();

			progress.show();

			progressBar.animate({width : "100%"}, 100);

			progress.delay(1000)
					.fadeOut(600);

			button.text("Continuar")										
					.removeClass("btn-primary")
					.addClass("btn-success")
    				.blur()
					.delay(1600)
					.fadeIn(function(){
						title.text("Log in is successful");
						if(button.text("Continuar")){
window.location.href = 'newPage.html';

						}
						//button.attr("data-dismiss", "modal");
						//button.attr("id","btnx");
						//alert();
	//
					});
		}
	});

	

	$('#myModal').on('hidden.bs.modal', function (e) {
		var inputs = $('form input');
		var title = $('.modal-title');
		var progressBar = $('.progress-bar');
		var button = $('.modal-footer button');

		inputs.removeAttr("disabled");

		title.text("Log in");

		progressBar.css({ "width" : "0%" });

		button.removeClass("btn-success")
				.addClass("btn-primary")
				.text("Ok")
				.removeAttr("data-dismiss");
                
	});

	$("#btn1.btn-success").click(function() {
	alert();
	window.location.href = 'newPage.html';
	})
});