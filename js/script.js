 $(document).ready(function() {
//  alert("inicial");

 $("#fileToUpload").change(function(e){

var archivo = $("#fileToUpload").val();
//alert("Es archivo"+archivo);
var extensiones = archivo.substring(archivo.lastIndexOf("."));
//alert("la extesnion para la imagen");
if(extensiones != ".jpg" && extensiones != ".JPG" && extensiones != ".JPEG")
{
 //  alert("El archivo de tipo " + extensiones + "no es válido");
   $("#fileToUpload").val("");
     $("#control").val(0);
     $("#mensaje_foto").show(1500);
     $("#mensaje_foto").val("Imagen no soportada, solo formato JPG");
}else{
    //$("#mensaje_foto").val("Imagen correcta");
    $("#mensaje_foto").hide(1500);
    $("#control").val(1);
  //  $("#imagen").attr("src",archivo);
}
 })
//carga hoja de vida

 $("#fileToUploadPDF").change(function(e){

var archivo = $("#fileToUploadPDF").val();
//alert("Es archivo hoja de vida"+archivo);
var extensiones = archivo.substring(archivo.lastIndexOf("."));
//alert("la extesnion para la imagen");
if(extensiones != ".pdf" && extensiones != ".PDF")
{
 //  alert("El archivo de tipo " + extensiones + "no es válido");
   $("#fileToUploadPDF").val("");
     $("#controlPDF").val(0);
     $("#mensaje_hdv").show(1500);
     $("#mensaje_hdv").val("Archivo no soportado");
}else{
    //$("#mensaje_foto").val("Imagen correcta");
    $("#mensaje_hdv").hide(1500);
    $("#controlPDF").val(1);
  //  $("#imagen").attr("src",archivo);
}
 })
//fin carga hoja de vida
//inicia insertar docentes
$("#login5").click(function(e){
  e.preventDefault();

    var nit_emp=$('#nit_emp').val();
    var nit_emp = nit_emp.trim();
    var id_titulo = $('#id_titulo').val();
    var observacion_sol=$('#observacion_sol').val();    
    var id_horario=$('#id_horario').val();
    var fecha_act_hasta=$('#fecha_act_hasta').val();
    var num_aspirantes=$('#num_aspirantes').val();

      if(nit_emp ==""){
        $("#mensaje1").fadeIn();
        return false;
      }else{
        $("#mensaje1").fadeOut();
         if(id_titulo=='0'){
        
            $("#mensaje2").fadeIn();
            return false;
          }else{
            $("#mensaje2").fadeOut();
          if(observacion_sol==""){
                   
                      $("#mensaje3").fadeIn();
                      return false;
                    }else{
                      $("#mensaje3").fadeOut();
                    if(id_horario=='0'){
                   
                      $("#mensaje4").fadeIn();
                      return false;
                    }else{
                      $("#mensaje4").fadeOut();
                   
        $.ajax({
          url:"recibe_formulario_solicitud.php",
          method:"POST",
          data:{         
          nit_emp:nit_emp,
          id_titulo:id_titulo,
          observacion_sol:observacion_sol,
          id_horario:id_horario,
          fecha_act_hasta:fecha_act_hasta,
          num_aspirantes:num_aspirantes
             },
          cache:"false",
          beforeSend:function() {
            $('#login5').val("Conectando...");
            $("#resultado").html("<br><div class='alert alert-dismissible alert-info'><strong>¡Enviando!</strong>Enviando Solicitud, espere un momento por favor.</div>");

          },
          success:function(data) {

            $('#login5').val("Ingresar");

            var data = data.charAt(0);


           //  $("#resultado").html(data);
         if (data=="1") {
             $("#resultado").html("<br><div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Solicitud creada con Éxito.</div>");
            } else {
              $("#resultado").html("<br><div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al crear solicitud.</div>");
            }
          }



        });
//}
          }
        }

      }
    }
    }); 
//finaliza insersion docentes


//inicia insertar administrativos
$("#btn-reg-adm").click(function(e){
  e.preventDefault();
  // alert("admin registro");
    var nom_admin=$('#nom_admin').val();
    var ape_admin = $('#ape_admin').val();
    var doc_admin=$('#doc_admin').val();
    var correo_admin = $('#correo_admin').val();
    var contrasena_admin=$('#contrasena_admin').val();
   
      if(nom_admin ==""){
        $("#mensaje1").fadeIn();
        return false;
      }else{
        $("#mensaje1").fadeOut();
         if(ape_admin==""){
        
            $("#mensaje2").fadeIn();
            return false;
          }else{
            $("#mensaje2").fadeOut();
          if(doc_admin==""){
                   
                      $("#mensaje3").fadeIn();
                      return false;
                    }else{
                      $("#mensaje3").fadeOut();

                 if(correo_admin==""){
                   
                      $("#mensaje4").fadeIn();
                      return false;
                    }else{
                      $("#mensaje4").fadeOut();
                          if(contrasena_admin==""){
                       
                          $("#mensaje5").fadeIn();
                          return false;
                        }else{
                          $("#mensaje5").fadeOut();
     
     
        $.ajax({
          url:"recibe_formulario_administrativos.php",
          method:"POST",
          data:{ 
          nom_admin:nom_admin,
          ape_admin:ape_admin,
          correo_admin:correo_admin,
          contrasena_admin:contrasena_admin,
          doc_admin:doc_admin,
                },
          cache:"false",
          beforeSend:function() {
            $('#btn-reg-adm').val("Conectando...");
          },
          success:function(data) {
            $('#btn-reg-adm').val("Ingresar");
            if (data==1) {
             $("#resultado").html("<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Administrativo registrado con Éxito.</div>");
            } else {
              $("#resultado").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Error al Actualizar Administrativo </div>");
            }
          }



        });
}
          }
        }

      }
    }
    }); 
//finaliza insersion adinistrativos



    //var expr = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/;

 $("#new_con").change(function(e){
 // alert();
 var n = $("#new_con").val().length;
if(n<6){
 $("#new_con").focus();
  bootbox.alert("La contraseña debe tener MAS de 6 caracteres, Letras MAYÚCULAS, minúsculas y Números.");
  $("#new_con").val("");
 
  $("#new_con_rep").val("");
}
$("#new_con_rep").focus();
})

 $("#new_con_rep").change(function(e){
if($("#new_con").val()!=$("#new_con_rep").val()){

  bootbox.alert("Error en la confirmacion de la contraseña.");
  $("#new_con").val("");
  $("#new_con").focus();
  $("#new_con_rep").val("");
}
})

//inicia contraseña estudiante

   $("#login").click(function(e){
    //ingresar egresado.
    e.preventDefault();
    var nombre=$('#nombre').val();
    //var documento=$('#documento').val();
    var rango=$('#rango').val();
    
    /*
    var apellido = $('#apellido').val();
    var documento=$('#documento').val();
    var fecha_nac = $('#fecha_nac').val();
    var id_titulo = $('#id_titulo').val();
    var tel=$('#tel').val();
    var email = $('#email').val();
    var new_con=$('#new_con').val();
    var observacion=$('#observacion').val();
    var control=$('#control').val();
    var controlPDF=$('#controlPDF').val();
   
    var new_con_rep = $('#new_con_rep').val();
    var email=$('#email').val();*/
   
   
      if(nombre ==""){
        $("#mensaje1").fadeIn();
        return false;
      }else{
        $("#mensaje1").fadeOut();
        
      /*   var inputFileImage = document.getElementById("fileToUpload");
         var file = inputFileImage.files[0];
         var inputFileImagePDF = document.getElementById("fileToUploadPDF");
         var filePDF = inputFileImagePDF.files[0];*/
         var data = new FormData();    
        // data.append('fileToUpload',file);
         data.append('nombre',nombre);
        // data.append('apellido',apellido);
        // data.append('documento',documento);
       //  data.append('fecha_nac',fecha_nac);
         data.append('rango',rango);
       /*  data.append('id_titulo',id_titulo);
         data.append('tel',tel);
         data.append('email',email);
         data.append('new_con',new_con); 
         data.append('control',control); 
         data.append('observacion',observacion);
         
         data.append('fileToUploadPDF',filePDF);
         data.append('controlPDF',controlPDF);  */

      
        $.ajax({
          url:"recibe_formulario_egresado.php",
           type: "POST",             // Type of request to be send, called as method
                    data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData:false,           
         
          beforeSend:function() {
            $('#login').val("Conectando...");
          },
          success:function(data) {
            $('#login').val("Registrado con Exito");
        

            switch(data){
              case "0": 
              $("#resultado").html("<br><div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Egresado no registrado.</div>");
              break;
              case "1": 
             $("#resultado").html("<br><div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Egresado Registrado con Éxito.</div>");
              break;
              case "2":
              $("#resultado").html("<br><div class='alert alert-dismissible alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Advertencia!</strong> Egresado ya registrado.</div>");
              break;
            }
            }
          });
         }
        
       
     
 }); 

//inicial el nuevo de correo
 $("#btn-env-mail").click(function(e){
  
  e.preventDefault();
  var titulo=$('#titulo').val();
  var asunto = $('#asunto').val();
  var mensaje=$('#mensaje').val();
  
    if(titulo ==""){
      $("#mensaje1").fadeIn();
      return false;
    }else{
      $("#mensaje1").fadeOut();
       if(asunto==""){
      
          $("#mensaje2").fadeIn();
          return false;
        }else{
          $("#mensaje2").fadeOut();
        if(mensaje==""){
                 
                    $("#mensaje3").fadeIn();
                    return false;
                  }else{
                    $("#mensaje3").fadeOut();

       var data = new FormData();    
       data.append('titulo',titulo);
       data.append('asunto',asunto);
       data.append('mensaje',mensaje);
         
      $.ajax({
        url:"recibe_mail.php",
         type: "POST",             // Type of request to be send, called as method
                  data: data,               // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                  contentType: false,       // The content type used when sending data to the server.
                  cache: false,             // To unable request pages to be cached
                  processData:false,           
       
        beforeSend:function() {
          $('#btn-env-mail').val("Conectando...");
        },
        success:function(data) {
          $('#btn-env-mail').val("Enviado con Exito");

          $("#resultado").html("<br><div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Se enviaron correos masivos </strong>Correos enviados.</div>");
          }
        });
       }
      }
     }   
}); //finaliza el nuevo de correo


   $(".borrarF").click(function(e){
      $('.formulario')[0].reset();
    
      });


   // inicia actualiza docente
  
$("#btn-reg-emp").click(function(e){
  e.preventDefault();
    var nit_empresa=$('#nit_empresa').val();
    var razon = $('#razon').val();
    var nom_contacto=$('#nom_contacto').val();
    var tipo_empresa = $('#tipo_empresa').val();
    var dir_empresa=$('#dir_empresa').val();
    var correo_empresa = $('#correo_empresa').val();
    var tel_empresa=$('#tel_empresa').val();
        if(nit_empresa ==""){
        $("#mensaje1").fadeIn();
        return false;
      }else{
        $("#mensaje1").fadeOut();
         if(razon==""){
            $("#mensaje2").fadeIn();
            return false;
          }else{
            $("#mensaje2").fadeOut();
          if(nom_contacto==""){                   
                      $("#mensaje3").fadeIn();
                      return false;
                    }else{
                      $("#mensaje3").fadeOut();
                 if(tipo_empresa==""){                   
                      $("#mensaje4").fadeIn();
                      return false;
                    }else{
                      $("#mensaje4").fadeOut();     
        $.ajax({
          url:"recibe_formulario_empresa.php",
          method:"POST",
          data:{         
          'nit_empresa':nit_empresa,
          'razon':razon,
          'nom_contacto':nom_contacto,
          'tipo_empresa':tipo_empresa,
          'dir_empresa':dir_empresa,
          'correo_empresa':correo_empresa,
          'tel_empresa':tel_empresa,
          },
          cache:"false",
          beforeSend:function() {
            $('#btn-reg-emp').val("Conectando..."); 
           },
          success:function(data) {
            $('#btn-reg-emp').val("Ingresar");
     
            switch(data){
              case "0": 
              $("#resultado").html("<br><div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Error!</strong> Empresa/Entidad no registrada.</div>");
              break;
              case "1": 
             $("#resultado").html("<br><div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Empresa/Entidad Registrada con Éxito.</div>");
              break;
              case "2":
              $("#resultado").html("<br><div class='alert alert-dismissible alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Advertencia!</strong> Empresa/Entidad ya registrada.</div>");
              break;
            }

          }
        });
      }
          }
        }

      }
    });

//finaliza actualiza empresa  


 })