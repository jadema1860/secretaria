<?php
session_start();

/*
if (!isset($_SESSION['control'])) {
 header("Location: ../index.html");
 exit;

}*/

 //require('valores_iniciales.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Secretaria</title>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
	<script src="../js/jquery.min-1.10.2.js"></script>
	<script src="../js/codigo.js"></script>
	<script src="../js/bootbox.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">
<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
<?php


if (isset($_SESSION['foto'])) {
$foto_aux = $_SESSION['foto'];
} else {
$foto_aux = "";
}

if (isset($_SESSION['doc_est'])) {
$doc_est= $_SESSION['doc_est'];
} else {
$doc_est = "";
}

//$foto_aux="";
//$foto_aux=$_SESSION["foto"];
//echo "Es la foto: $foto_aux";
//$doc_est="";
//$doc_est=$_SESSION['doc_est'];


 //include("modal_modificar_usuario.php");?>

<script>
   function cargarFormulario(pagina)
    { 	
    	//pagina
    //	alert();
     $("#pagina").load(pagina);
    
    }
</script>

<script>
   function cargarFormulario2(pagina)
    { 	
    	alert("la otra funcion");

     $("#res_tabla").load(pagina);
    }
</script>


</head>
<body>
	<header>
	<div class="container">
	<!--<script src="../js/codigo.js"></script>	-->
	<div class="page-header">
	
			<!--<nav class="navbar navbar-default">-->
			<div class="container-fluid">
			
					<!--<h4>Escuela de Salud Sur Colombiana</h4>-->
			    <div class="navbar-left"><b class="text-default"></b><b><big class="initialism"><?php //echo  $_SESSION["tipo_olinea"] ?></big></b></div>
				<?php //echo "<big class='initialism'>";echo $_SESSION['nom_inst'];echo"</big>" ?>
				
			</div>
			</nav>
   			<!--<h2>Estudiantes</h2>   -->
 		</div>
	<!--</div>-->


		<nav class="navbar navbar-default">
			<?php //echo "<span class='success'>".$_SESSION['descripcion']."</span>"; ?>
			<div class="container-fluid">
				<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapsed" data-target="#navbar-1"
				><span class="sr-only">Menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>	
				</button>
				<a href="menu.php" class="navbar-brand">SECRETARIA DE TRANSITO</a>
			</div>

			<div class="collapsed navbar-collapse" id="navbar-1">
				<?php if("Administrador"=="Administrador"){  // inicia administrador ?>
				SECRETARIA DE TRANSITO
			<ul class="nav navbar-nav">	

				

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button">Agentes <span class="caret"></span></a>
						<ul class="dropdown-menu">
						<li><a onClick="cargarFormulario('formulario_egresado.php')" href="#">Registrar Agente</a></li>
						<li><a onClick="cargarFormulario('buscar_egresado.php')" href="#">Busqueda Agente</a></li>
						
						</ul>
					</li>
		
				

				
			

			
			</ul>
			
			<ul class="nav navbar-nav navbar-right">	
					<li class="dropdown">
					
					<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button"><span class="glyphicon  glyphicon-user"></span><?php echo "  ". $_SESSION["usuario_olinea"]; ?> <span class="caret"></span></a>-->

					<a href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button"><img src="../img/escudo.png" alt="imagen" class="img-circle" width="45px" height="45px">
					

					<!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-id_estudiante="<?php echo $fila['id_estudiante']?>" data-nom_estudiante="<?php echo $fila['nom_estudiante']?>" data-ape_estudiante="<?php echo $fila['ape_estudiante']?>" data-tel="<?php echo $fila['tel_estudiante']?>" data-capital="<?php echo $fila['documento']?>" data-continente="<?php echo $fila['documento']?>"><i class='glyphicon glyphicon-edit'></i> Modificar</button>-->

						<ul class="dropdown-menu">
						<li><a onClick="cargarFormulario('formulario_administrativo.php')"href="#" data-toggle="modal" data-target="#dataUpdateUsuario" data-doc_usuario="<?php echo $doc_usuario ?>">Agregar Usuarios</a></li>
						<li><a onClick="cargarFormulario('busqueda_todo_administrativos.php')" href="#">Gestion Administrativos</a></li>
						<li><a href="logout.php">Salir</a></li>
						</ul>
					</li>
			</ul>

			<?php }else if($_SESSION['tipo_olinea']=="Empresa"){ ?>


				<ul class="nav navbar-nav">	
					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button">Solicitud <span class="caret"></span></a>
								<ul class="dropdown-menu">
								<li><a onClick="cargarFormulario('formulario_solicitud.php')" href="#">Crear Solicitud </a></a></li>
								<li><a onClick="cargarFormulario('busqueda_todo_solicitud.php')" href="#">Solitiudes Abiertas</a></a></li>
						<li><a onClick="cargarFormulario('busqueda_solicitud_cerrada.php')" href="#">Solitiudes Cerradas</a></a></li>
								</ul>
						</li>
						</ul>

				<ul class="nav navbar-nav navbar-right">	
					<li class="dropdown">
					
					<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button"><span class="glyphicon  glyphicon-user"></span><?php echo "  ". $_SESSION["usuario_olinea"]; ?> <span class="caret"></span></a>-->

					<a href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button"><img src="../img/escudo.png" alt="imagen" class="img-circle" width="45px" height="45px">
					<?php echo "  ". $_SESSION["nom_completo"]; ?><span class="caret"></span></a>

					<!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-id_estudiante="<?php echo $fila['id_estudiante']?>" data-nom_estudiante="<?php echo $fila['nom_estudiante']?>" data-ape_estudiante="<?php echo $fila['ape_estudiante']?>" data-tel="<?php echo $fila['tel_estudiante']?>" data-capital="<?php echo $fila['documento']?>" data-continente="<?php echo $fila['documento']?>"><i class='glyphicon glyphicon-edit'></i> Modificar</button>-->

						<ul class="dropdown-menu">
						<li><a  onClick="cargarFormulario('formulario_empresa_modificar.php')" href="#" data-toggle="modal" data-target="#dataUpdateUsuario" data-doc_usuario="<?php echo $doc_usuario ?>">Configuración</a></li>
						<li><a href="logout.php">Salir</a></li>
						</ul>
					</li>
			</ul>

			 ?>
			<?php } else { $documento=$_SESSION["doc_est"]; 
			
			 //Estudiante ?>

				
				<ul class="nav navbar-nav ">	
					
					<!--<li class="dropdown">
							<a onClick="cargarFormulario('consulta_notas_estudiante.php?documento=<?php echo $documento  ?>&curso_compuesto=<?php echo $fila["curso_compuesto"]; ?>')" href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button">Revisar Calificaciones <span class="caret"></span></a>
								<ul class="dropdown-menu">
								<li><a onClick="cargarFormulario('buscar_curso_por_docente.php')" href="#">Registrar Notas</a></a></li>
								<li><a href="#">Asignacion y/o Cambio de Nota</a></li>
								</ul>-->
						</li>-->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button">Bolsa de Empleo <span class="caret"></span></a>
						<ul class="dropdown-menu">
					<!--<li><a onClick="cargarFormulario('formulario_solicitud.php')" href="#">Crear Solicitud</a></a></li>-->
						<li><a onClick="cargarFormulario('busqueda_todo_solicitud.php')" href="#">Solitiudes Abiertas</a></a></li>
					<!--<li><a onClick="cargarFormulario('busqueda_solicitud_cerrada.php')" href="#">Solitiudes Cerradas</a></a></li>-->
						</ul>
				</li>
						</ul>

				<ul class="nav navbar-nav navbar-right">	
				<li class="dropdown">
					
					<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button"><span class="glyphicon  glyphicon-user"></span><?php echo "  ". $_SESSION["usuario_olinea"]; ?> <span class="caret"></span></a>-->
	<?php
	if($_SESSION["foto"]==1){
					$foto=$documento.".jpg?".rand(1,1000);
				//	echo "Es la foto: $foto";
				}else{
					$foto="sinfoto.jpg";
				//	echo "Es la foto xx: $foto";
				}
				?>
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" rol="button">
			<img src="../fotografias/sinfoto.jpg" alt="imagen" class="img-circle" width="45px" height="45px">
					<?php echo "  ". $_SESSION["nom_completo"]; ?><span class="caret"></span></a>

					<!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#dataUpdate" data-id_estudiante="<?php echo $fila['id_estudiante']?>" data-nom_estudiante="<?php echo $fila['nom_estudiante']?>" data-ape_estudiante="<?php echo $fila['ape_estudiante']?>" data-tel="<?php echo $fila['tel_estudiante']?>" data-capital="<?php echo $fila['documento']?>" data-continente="<?php echo $fila['documento']?>"><i class='glyphicon glyphicon-edit'></i> Modificar</button>-->

						<ul class="dropdown-menu">
						<li><a onClick="cargarFormulario('formulario_egresado_modificar.php')" href="#">Configurar</a></li>
						<li><a href="logout.php">Salir</a></li>
						</ul>
					</li>
			</ul>

			<?php	} ?>
			</div>
		</nav>
	
		</div>
	</header>
<div class="container" id="pagina">
	
	<section class="main">
	
<h1 class='text-info'>Secretaria Transito</h1>	

	</section>
</div>

<!--Modal -->    <div class="modal fade" id="ventana1">
                 <div class="modal-dialog">
                    <div class="modal-content">
                    <button type="button" class="close salir" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="modal-header">
                      <h4 class="modal-title textos inicio" >Configuración</h4>                      
                       </div>
                          	<div class="modal-body" id="carga_consulta">

                          	 	<div class="form-group">
						          <!--<center></center> <img src="../fotos/13072001.jpg" alt="imagen" class="img-circle" width="120px" height="120px"></center>-->
						        </div>
                                <div class="form-group">
						            <label for="moneda" class="control-label">Nombres:</label>
						            <input type="text" class="form-control" id="ape_estudiante" name="ape_estudiante" required maxlength="3">
						         </div>
								 <div class="form-group">
						            <label for="capital" class="control-label">Apellidos:</label>
						            <select class="form-control" id="tel"></select>
						            <!--<input type="text" class="form-control" id="tel" name="capital" required maxlength="30"> -->
						         </div>
								   
						         <div class="form-group">
						            <label for="continente" class="control-label">Contraseña Actual:</label>
						            <input type="text" class="form-control" id="sexo" name="continente" required maxlength="15">
						         </div>  
						         <div class="form-group">
						            <label for="continente" class="control-label">Nueva Contraseña:</label>
						            <input type="text" class="form-control" id="sexo" name="continente" required maxlength="15">
						         </div>
						         <div class="form-group">
						            <label for="continente" class="control-label">Confirmar Contraseña:</label>
						            <input type="text" class="form-control" id="sexo" name="continente" required maxlength="15">
						         </div>                    
                         
                                 
                       		</div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        				 <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
                       </div>

                      </div>
                      </div>
                    
                 </div>
              </div>


              <!-- fin modal -->

<div class="modal fade bd-example-modal-lg" id="exampleModalLong5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Hoja de Vida</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="respuesta5"></div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-danger closeModal" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>



<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>