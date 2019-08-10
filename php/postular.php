<?php require_once('conexion.php'); ?>
<?php


$fecha_reg=date('Y-d-m');

if (isset($_REQUEST['id_plaza'])) {
$id_plaza = $_REQUEST['id_plaza'];
} else {
$id_plaza = "";
}
if (isset($_REQUEST['nit'])) {
$nit = $_REQUEST['nit'];
} else {
$nit = "";
}

if (isset($_REQUEST['doc_est'])) {
$doc_est = $_REQUEST['doc_est'];
} else {
$doc_est = "";
}

$updateSQL = "UPDATE solicitud SET id_estado=0 WHERE id_solicitud='$id_plaza'";
               
 
$Result1 = mysqli_query($myconex,$updateSQL);

  // el otro
$updateEst = "UPDATE estudiante SET estado_est=3 WHERE doc_est='$doc_est'";
  
$Resultest = mysqli_query($myconex,$updateEst);
  // la insercion en la tabla nueva.
$sql = "insert into vinculacion (doc_est, nit_emp, fecha_vin, id_solicitud) 
values ('$doc_est', '$nit','$fecha_reg', '$id_plaza')";

  $R = mysqli_query($myconex,$sql); 
  
  // fin del otro
  //header("Location: ver_solicitudes.php");
  if($R and $Resultest and $Result1){echo "1";}else{echo "0";}

?>


