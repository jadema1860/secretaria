<?php
require('conexion.php');

if (isset($_REQUEST['new_con'])) {
$new_con = $_REQUEST['new_con'];
} else {
$new_con = "";
}

if (isset($_REQUEST['nit_emp'])) {
$nit_emp = $_REQUEST['nit_emp'];
} else {
$nit_emp = "";
}

$fecha_reg_estudiante=date('Y-m-d');


			$consulta="UPDATE empresa
			set contrasena='$new_con'			 
			where 
			nit_emp='$nit_emp'";
	
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";}else{echo"0";}


?>