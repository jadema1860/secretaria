<?php require_once("conexion.php"); ?>
<?php

  $anox = date('Y');
  $mesx = date('m');
  $diax= date('d');
$fecha_reg="$anox-$mesx-$diax";

$id_solicitud=$_GET['id_solicitud'];
$id_estado=$_GET['id_estado'];
//echo "$id_solicitud, $id_estado";
$doc_est=$_GET['doc_est'];

$updateSQL = "UPDATE solicitud SET id_estado=$id_estado WHERE id_solicitud=$id_solicitud";
               
  //mysql_select_db($database_conexion, $conexion);
  $Result1 = mysqli_query($myconex,$updateSQL) or die(mysqli_error());
  // el otro
  $updateEst = "UPDATE estudiante SET estado_est=$id_estado WHERE doc_est=$doc_est";
  //mysql_select_db($database_conexion, $conexion);
  $Resultest = mysqli_query($myconex,$updateEst) or die(mysqli_error());
  // la insercion en la tabla nueva.
  $sql = "insert into vinculacion (doc_est, id_emp, fecha_vin, id_solicitud) values ($doc_est, 2,'$fecha_reg', $id_solicitud)";
  //mysql_select_db($database_conexion, $conexion);
  $R = mysqli_query($myconex,$sql) or die(mysqli_error()); 
  
  // fin del otro
  header("Location: ver_solicitudes.php");

?>


<?php
echo "variables: $id_solicitud, estado: $id_estado, $doc_est";
?>


<a href="ver_solicitudes.php">Regresar</a></p>

