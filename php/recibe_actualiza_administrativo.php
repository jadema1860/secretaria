<?php
require('conexion.php');

if (isset($_REQUEST['nom_usu'])) {
$nom_usu = $_REQUEST['nom_usu'];
} else {
$nom_usu = "";
}
if (isset($_REQUEST['ape_usu'])) {
$ape_usu = $_REQUEST['ape_usu'];
} else {
$ape_usu = "";
}
if (isset($_REQUEST['doc_usu'])) {
$doc_usu = $_REQUEST['doc_usu'];
} else {
$doc_usu = "";
}
if (isset($_REQUEST['correo_usu'])) {
$correo_usu = $_REQUEST['correo_usu'];
} else {
$correo_usu = "";
}
/*
if (isset($_REQUEST['contrasena_usu'])) {
$contrasena_usu = $_REQUEST['contrasena_usu'];
} else {
$contrasena_usu = "";
}
*/
if (isset($_REQUEST['estado_usu'])) {
$estado_usu = $_REQUEST['estado_usu'];
} else {
$estado_usu = "";
}
// doc_usu='$doc_usu' contrasena_usu='$contrasena_usu',	
			$consulta="UPDATE usuarios set 
			 nom_usu='$nom_usu',
			 ape_usu='$ape_usu',
			 correo_usu='$correo_usu', 			 	 			 
 			 id_estado='$estado_usu'					 
		     where 
			 doc_usu='$doc_usu'";
			 	 
			
			$result = mysqli_query($myconex, $consulta);
			//echo "$result";
			if($result){echo"1";}else{echo"0";}




?>