<?php
require('conexion.php');

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
if (isset($_REQUEST['observacion_sol'])) {
$observacion_sol = $_REQUEST['observacion_sol'];
} else {
$observacion_sol = "";
}
if (isset($_REQUEST['id_horario'])) {
$id_horario = $_REQUEST['id_horario'];
} else {
$id_horario = "";
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
//$contrasena_docente=$doc_docente;
$fecha_registro_solicitud=date('Y-m-d');
//$estado_docente=1;
//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
/*$inicial="select doc_docente from docente where doc_docente='$doc_docente'";
$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_estado = mysqli_num_rows($sql_inicial);
while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
}*/

//echo "la primera: $resultado_estado";


	//if($resultado_estado==0){  // no existe
			$consulta="INSERT INTO solicitud (nit_emp,id_titulo, informacion, id_horario, id_estado, fecha_sol, estado_sol)
			vALUES ('$nit_emp','$id_titulo','$observacion_sol','$id_horario',1,'$fecha_registro_solicitud',1)";
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";}else{echo"0";}
		 	// } //else {
		 	//echo "error";
		 	 //}
	






?>