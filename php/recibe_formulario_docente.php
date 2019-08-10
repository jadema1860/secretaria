<?php
require('conexion.php');

if (isset($_REQUEST['nom_docente'])) {
$nom_docente = $_REQUEST['nom_docente'];
} else {
$nom_docente = "";
}

if (isset($_REQUEST['ape_docente'])) {
$ape_docente = $_REQUEST['ape_docente'];
} else {
$ape_docente = "";
}
if (isset($_REQUEST['doc_docente'])) {
$doc_docente = $_REQUEST['doc_docente'];
} else {
$doc_docente = "";
}
if (isset($_REQUEST['fecha_nac_docente'])) {
$fecha_nac_docente = $_REQUEST['fecha_nac_docente'];
} else {
$fecha_nac_docente = "";
}
if (isset($_REQUEST['sexo'])) {
$sexo = $_REQUEST['sexo'];
} else {
$sexo = "";
}
if (isset($_REQUEST['correo_docente'])) {
$correo_docente = $_REQUEST['correo_docente'];
} else {
$correo_docente = "";
}
if (isset($_REQUEST['tel_docente'])) {
$tel_docente = $_REQUEST['tel_docente'];
} else {
$tel_docente = "";
}
if (isset($_REQUEST['dir_docente'])) {
$dir_docente = $_REQUEST['dir_docente'];
} else {
$dir_docente = "";
}

if (isset($_REQUEST['observacion'])) {
$observacion = $_REQUEST['observacion'];
} else {
$observacion = "";
}

//$nom_estudiante=$_POST["nombre"];
//$ape_estudiante=$_POST['apellido'];
//$fecha_nac=$_POST['fecha_nac']; 
//$sexo=$_POST['sexo'];
//$rh=$_POST['rh'];
//$tel_estudiante=$_POST['tel'];
//$dir_estudiante=$_POST['direccion'];
//$nom_padre_estudiante=$_POST['nom_padre'];
//$tel_padre_estudiante=$_POST['tel_padare'];
//$nom_madre_estudiante=$_POST['nom_madre'];
//$tel_madre_estudiante=$_POST['tel_madre'];
$contrasena_docente=$doc_docente;
$fecha_registro_docente=date('Y-m-d');
$estado_docente=1;
//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
$inicial="select doc_docente from docente where doc_docente='$doc_docente'";
$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_estado = mysqli_num_rows($sql_inicial);
while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
}

//echo "la primera: $resultado_estado";


	if($resultado_estado==0){  // no existe
			$consulta="INSERT INTO docente (doc_docente,nom_docente,ape_docente,sexo,dir_docente,tel_docente,fecha_nac_docente,
correo_docente,contrasena_docente,estado_docente,fecha_registro_docente,observacion)
			VALUES ('$doc_docente','$nom_docente','$ape_docente',$sexo,'$dir_docente','$tel_docente','$fecha_nac_docente','$correo_docente','$contrasena_docente','$estado_docente','$fecha_registro_docente','$observacion')";
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";}else{echo"0";}
		 	 } //else {
		 	//echo "error";
		 	 //}
	






?>