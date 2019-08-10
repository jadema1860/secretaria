<?php session_start(); ?>
<?php
require('conexion.php');

if (isset($_REQUEST['grado'])) {
$grado = $_REQUEST['grado'];
} else {
$grado = "";
}

if (isset($_REQUEST['nomenclatura'])) {
$nomenclatura = $_REQUEST['nomenclatura'];
} else {
$nomenclatura = "";
}
if (isset($_REQUEST['doc_docente'])) {
$doc_docente = $_REQUEST['doc_docente'];
} else {
$doc_docente = "";
}
if (isset($_REQUEST['id_jornada'])) {
$id_jornada = $_REQUEST['id_jornada'];
} else {
$id_jornada = "";
}
if (isset($_REQUEST['num_cupos'])) {
$num_cupos = $_REQUEST['num_cupos'];
} else {
$num_cupos = "";
}
$curso_compuesto=$grado.$nomenclatura;
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
$fecha_reg_estudiante=date('Y-m-d');
$estado_curso=1;
$id_lectivo= $_SESSION['id_lectivo'];
//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
$inicial="select id_curso from curso where id_grado='$grado' and curso='$nomenclatura' and id_jornada='$id_jornada' and id_lectivo='$id_lectivo' ";

$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_inicial = mysqli_num_rows($sql_inicial);

//while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
//}

//echo "la primera: $resultado_estado";

if($resultado_inicial==0){
//	if($resultado_estado==0){  // no existe
			$consulta="INSERT INTO curso (id_grado, curso, id_docente, id_jornada, cupos, estado_curso, id_lectivo, curso_compuesto)
			VALUES ('$grado',
					'$nomenclatura',
					'$doc_docente',
					'$id_jornada',
					'$num_cupos',
					 $estado_curso,
					 $id_lectivo,
					'$curso_compuesto'
					)";
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";}else{echo"0";}
		 	 //} //else {
		 	//echo "error";
		 	 //}
	
			}else{
				echo"0";

			}





?>