<?php
require('conexion.php');

if (isset($_REQUEST['new_con'])) {
$new_con = $_REQUEST['new_con'];
} else {
$new_con = "";
}

if (isset($_REQUEST['doc_usu'])) {
$doc_usu = $_REQUEST['doc_usu'];
} else {
$doc_usu = "";
}

$fecha_reg_estudiante=date('Y-m-d');


			$consulta="UPDATE usuarios
			set contrasena_usu='$new_con'			 
			where 
			doc_usu='$doc_usu'";
	
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";}else{echo"0";}


?>