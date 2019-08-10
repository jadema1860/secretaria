<?php
require('conexion.php');
if (isset($_REQUEST['doc_est'])) {
$doc_est = $_REQUEST['doc_est'];
} else {
$doc_est = "";
}
if (isset($_REQUEST['id_vin'])) {
$id_vin = $_REQUEST['id_vin'];
} else {
$id_vin = "";
}
if (isset($_REQUEST['fecha_ter_vin'])) {
$fecha_ter_vin = $_REQUEST['fecha_ter_vin'];
} else {
$fecha_ter_vin = "";
}
if (isset($_REQUEST['obs_vin'])) {
$obs_vin = $_REQUEST['obs_vin'];
} else {
$obs_vin = "";
}
if (isset($_REQUEST['val_vin'])) {
$val_vin = $_REQUEST['val_vin'];
} else {
$val_vin = "";
}

$obs_vin=trim($obs_vin);

	//if($resultado_estado==0){  // no existe
			$consulta="UPDATE vinculacion set  estado_vin = 1,
			fecha_fin_vin='$fecha_ter_vin',
			valoracion='$val_vin',
			obs_vin='$obs_vin'
			where id_vinculacion='$id_vin'";

			$result = mysqli_query($myconex, $consulta);

			$consultaEst="UPDATE estudiante set  estado_est = 1
			where doc_est='$doc_est'";
			$resultEst = mysqli_query($myconex, $consultaEst);


			if($result){echo"1";}else{echo"0";}
		 
?>