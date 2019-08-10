<?php
require('conexion.php');

if (isset($_REQUEST['new_con'])) {
$new_con = $_REQUEST['new_con'];
} else {
$new_con = "";
}

if (isset($_REQUEST['doc_est'])) {
$doc_est = $_REQUEST['doc_est'];
} else {
$doc_est = "";
}

$fecha_reg_estudiante=date('Y-m-d');


			$consulta="UPDATE estudiante
			set contrasena='$new_con'			 
			where 
			doc_est='$doc_est'";
	
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";}else{echo"0";}


?>