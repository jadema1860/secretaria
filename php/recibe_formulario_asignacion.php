<?php
require('conexion.php');

if (isset($_REQUEST['doc_docente'])) {
$doc_docente = $_REQUEST['doc_docente'];
} else {
$doc_docente = "";
}

if (isset($_REQUEST['var_id_asi'])) {
$var_id_asi = $_REQUEST['var_id_asi'];
} else {
$var_id_asi = "";
}

if (isset($_REQUEST['id_materia'])) {
$id_materia = $_REQUEST['id_materia'];
} else {
$id_materia = "";
}

if (isset($_REQUEST['id_curso'])) {
$id_curso = $_REQUEST['id_curso'];
} else {
$id_curso = "";
}
/*
if (isset($_REQUEST['num_cupos'])) {
$num_cupos = $_REQUEST['num_cupos'];
} else {
$num_cupos = "";
}*/
/*$grado='123';
$nomenclatura="123"; 
$doc_docente="123";
 $id_jornada="123";
 $num_cupos="123";*/

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
$fecha_registro_asignacion=date('Y-m-d');
$estado_asignacion=1;
//$id_lectivo=1;
//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
//$inicial="select documento from tbestudiante where documento='$documento'";
//$sql_inicial=mysqli_query($myconex,$inicial);
//$resultado_estado = mysqli_num_rows($sql_inicial);
//while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
//}

//echo "la primera: $resultado_estado";


//	if($resultado_estado==0){  // no existe
//echo "LLega: $var_id_asi<br>";

if($var_id_asi==0){
$consulta="INSERT INTO asignacion (fecha_registro_asignacion,id_docente,id_curso,id_materia,estado_asignacion)
			VALUES (
			'$fecha_registro_asignacion',
			'$doc_docente',
			'$id_curso',
			'$id_materia',
			'$estado_asignacion')";
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";}else{echo"0";}
//$var_id_asi$var_id_asi
			$consulta_p="INSERT INTO control_periodo (id_curso,  id_materia, periodo ) 
						VALUES ($id_curso, $id_materia, 0)";
						$query2=mysqli_query($myconex,$consulta_p);	

}else{ 

	$consulta="UPDATE asignacion set fecha_registro_asignacion='$fecha_registro_asignacion',
	id_docente='$doc_docente',
	id_curso='$id_curso',
	id_materia='$id_materia',
	estado_asignacion='$estado_asignacion' WHERE id_asignacion='$var_id_asi' ";
			
			
		
			$result = mysqli_query($myconex, $consulta);
			//
			if($result){echo"1";}else{echo"0";}
}
	
		 	 //} //else {
		 	//echo "error";
		 	 //}
//}
//}
	






?>