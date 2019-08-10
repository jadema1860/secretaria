<?php
require('conexion.php');

if (isset($_REQUEST['id_solicitud'])) {
$id_solicitud = $_REQUEST['id_solicitud'];
} else {
$id_solicitud = "";
}

if (isset($_REQUEST['nit_emp'])) {
$nit_emp = $_REQUEST['nit_emp'];
} else {
$nit_emp = "";
}

if (isset($_REQUEST['id_titulo'])) {
$id_titulo = $_REQUEST['id_titulo'];
} else {
$id_titulo = "";
}

if (isset($_REQUEST['informacion'])) {
$informacion = $_REQUEST['informacion'];
} else {
$informacion = "";
}

if (isset($_REQUEST['id_horario'])) {
$id_horario = $_REQUEST['id_horario'];
} else {
$id_horario = "";
}

if (isset($_REQUEST['id_estado'])) {
$id_estado = $_REQUEST['id_estado'];
} else {
$id_estado = "";
}
			$consulta="UPDATE solicitud set 
			 nit_emp='$nit_emp',
			 id_titulo='$id_titulo',
			 informacion='$informacion',
			 id_horario='$id_horario',	
			 id_estado='$id_estado'		
			 where 
			 id_solicitud='$id_solicitud'";
				
			$result = mysqli_query($myconex, $consulta);
			//echo "$result";
			if($result){echo"1";}else{echo"0";}

?>