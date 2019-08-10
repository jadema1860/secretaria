<?php
session_start();
if (!isset($_SESSION['control'])) {
 header("Location: ../index.html");

 exit;
}
// $doc_usuario=$_SESSION['doc_usuario'];
 require('valores_iniciales.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Refresh" content="25;url=menu.php">
	<title><?php echo"IEM"; ?></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico" />
</head>
<body>
	<header>
		<div class="container">
			<div class="page-header">
		
				<!--<nav class="navbar navbar-default">-->
				<div class="container-fluid">
				</div>
			</div>
		</div>
	</header>
<div class="container">
<?php
require('conexion.php');

$fecha_registro=date('Y-m-d');
/*$id_curso="";
$id_curso = $_GET["curso"];//*/

/*$id_curso_viejo="";
$id_curso_viejo = $_GET["id_curso_viejo"];//*/


//echo"Es el id del curso: $id_curso";
$c="";
//echo"Modulo $id_mod_cal";
$c = count($_GET["curso"]);
echo "Estudiantes Promovidos de grado $c<br>";
if ($c > 0) {
//if($per1==$res_periodo+1){
for ($i=0; $i<$c; $i++) {

if(isset($_GET["matricula"][$i]) && isset($_GET["m1"][$i])){ 
	
$matricula = $_GET["matricula"][$i];
$promocion= $_GET["m0"][$i];



//Aqui va tu codigo 


if($promocion==1){

$consulta="INSERT INTO tbmatricula (fecha_matricula, documento_estudiante, id_curso) VALUES 
('$fecha_registro','$matricula', $id_curso)";
$query=mysqli_query($myconex,$consulta);

		if($query){				
				echo "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong> Estudiante Promovido Satisfactoriamente</div>";

						mysqli_query($myconex,"update curso set promover = 2 where id_curso=$id_curso_viejo");
				}
}


}


	}//fin modulo
}//cierra la c


	
?>
<p><a class="btn btn-info" href="menu.php" >Continuar</a></p>
</div>
</body>
</html>