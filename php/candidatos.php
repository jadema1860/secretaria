<?php session_start();?>
<?php require_once('conexion.php'); ?>
<?php


$fecha_reg=date('Y-m-d');


if (isset($_REQUEST['id_solicitud'])) {
$id_solicitud = $_REQUEST['id_solicitud'];
} else {
$id_solicitud = "";
}
/*
if (isset($_REQUEST['nit'])) {
$nit = $_REQUEST['nit'];
} else {
$nit = "";
}*/

if (isset($_SESSION['doc_est'])) {
$doc_est= $_SESSION['doc_est'];
} else {
$doc_est = "";
}
//indicar la consuta si existe.

 $resultInicial = mysqli_query($myconex, "SELECT doc_est from postulacion
 WHERE id_solicitud='$id_solicitud' 
 and doc_est='$doc_est'");
  $num_row = mysqli_num_rows($resultInicial);
  if ($num_row != 0) {
  	echo "2";
  }else{
//$updateSQL = "UPDATE solicitud SET id_estado=0 WHERE id_solicitud='$id_plaza'";
               
 
//$Result1 = mysqli_query($myconex,$updateSQL);

  // el otro

 $result = mysqli_query($myconex, "SELECT num_asp_rec from solicitud WHERE id_solicitud=$id_solicitud");

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$num_asp_rec=$fila['num_asp_rec'];	
$num_asp_rec++;
}

$updateEst = "UPDATE solicitud SET num_asp_rec='$num_asp_rec' WHERE id_solicitud='$id_solicitud'";
  
$Resultest = mysqli_query($myconex,$updateEst);
  // la insercion en la tabla nueva.
$sql = "insert into postulacion (id_solicitud,doc_est,fecha_reg) 
values ('$id_solicitud','$doc_est',	'$fecha_reg')";

  $R = mysqli_query($myconex,$sql); 
  
  // fin del otro
  //header("Location: ver_solicitudes.php");
  if($R and $Resultest and $resultInicial){echo "1";}else{echo "0";}
}

?>


