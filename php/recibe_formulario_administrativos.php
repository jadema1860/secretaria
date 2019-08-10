<?php
require('conexion.php');

if (isset($_REQUEST['nom_admin'])) {
$nom_admin = $_REQUEST['nom_admin'];
} else {
$nom_admin = "";
}

if (isset($_REQUEST['ape_admin'])) {
$ape_admin = $_REQUEST['ape_admin'];
} else {
$ape_admin = "";
}
if (isset($_REQUEST['doc_admin'])) {
$doc_admin = $_REQUEST['doc_admin'];
} else {
$doc_admin = "";
}
/*if (isset($_REQUEST['fecha_nac_admin'])) {
$fecha_nac_admin = $_REQUEST['fecha_nac_admin'];
} else {
$fecha_nac_admin = "";
}
if (isset($_REQUEST['sexo'])) {
$sexo = $_REQUEST['sexo'];
} else {
$sexo = "";
}*/
if (isset($_REQUEST['correo_admin'])) {
$correo_admin = $_REQUEST['correo_admin'];
} else {
$correo_admin = "";
}
/*
if (isset($_REQUEST['tel_admin'])) {
$tel_admin = $_REQUEST['tel_admin'];
} else {
$tel_admin = "";
}*/
if (isset($_REQUEST['contrasena_admin'])) {
$contrasena_admin = $_REQUEST['contrasena_admin'];
} else {
$contrasena_admin = "";
}

if (isset($_REQUEST['nivel_admin'])) {
$nivel_admin = $_REQUEST['nivel_admin'];
} else {
$nivel_admin = "";
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
//$contrasena_admin=$doc_admin;
$fecha_registro_admin=date('Y-m-d');
$estado_admin=1;
//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
$inicial="select doc_usu from usuarios where doc_usu='$doc_admin'";
$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_estado = mysqli_num_rows($sql_inicial);
//while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
//}

//echo "la primera: $resultado_estado";


	if($resultado_estado==0){  // no existe
		$consulta="INSERT INTO usuarios (nom_usu,ape_usu,correo_usu,contrasena_usu,fecha_reg_usu,doc_usu,id_estado)
			VALUES ('$nom_admin',
			'$ape_admin',
			'$correo_admin',
			'$contrasena_admin',
			'$fecha_registro_admin',
			'$doc_admin',
			1)";
			$result = mysqli_query($myconex, $consulta);
			if($result){echo 1;}else{echo 0;}
		 	 } //else {
		 	//echo "error";
		 	 //}
	






?>