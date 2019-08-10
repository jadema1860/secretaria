<?php
require('conexion.php');



if (isset($_REQUEST['documento'])) {
$documento_estudiante = $_REQUEST['documento'];
} else {
$documento_estudiante = "";
}
if (isset($_REQUEST['id_curso'])) {
$id_curso = $_REQUEST['id_curso'];
} else {
$id_curso = "";
}


$fecha_matricula=date('Y-m-d');
//$estado_estudiante=1;
//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
$inicial="select documento_estudiante from tbmatricula where documento_estudiante='$documento_estudiante' and id_curso=id_curso";
$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_estado = mysqli_num_rows($sql_inicial);
while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
}

//echo "la primera: $resultado_estado";


	if($resultado_estado==0){  // no existe
			$consulta="INSERT INTO tbmatricula (fecha_matricula, documento_estudiante, id_curso)
			VALUES ('$fecha_matricula',
					'$documento_estudiante',
					 $id_curso)";
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";}else{echo"0";}
		 	 } else {
		 	echo"2";
		 	}
	






?>