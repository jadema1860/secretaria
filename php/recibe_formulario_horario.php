<?php session_start(); ?>
<?php
require('conexion.php');

if (isset($_REQUEST['nom_horario'])) {
$nom_horario = $_REQUEST['nom_horario'];
} else {
$nom_horario = "";
}

if (isset($_REQUEST['num_per'])) {
$num_per = $_REQUEST['num_per'];
} else {
$num_per = "";
}

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
/*$fecha_reg_estudiante=date('Y-m-d');
$estado_curso=1;
$id_lectivo= $_SESSION['id_lectivo'];*/
//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
/*$inicial="select id_lectivo from lectivo where ano_lectivo='$anio' ";

$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_inicial = mysqli_num_rows($sql_inicial);*/

//while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
//}

//echo "la primera: $resultado_estado";

//if($resultado_inicial==0){
//	if($resultado_estado==0){  // no existe
			$consulta="INSERT INTO horario (des_horario) VALUES ('$nom_horario')";
			$result = mysqli_query($myconex, $consulta);
			//echo "casaddd6454";
			//echo $result;
			if($result){echo"1";}else{echo"0";}
			//} //else {
		 	//echo "error";
		 	 //}
	
		/*	}else{
				echo"0";

			}*/





?>