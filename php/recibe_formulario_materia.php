<?php session_start(); ?>
<?php
require('conexion.php');

if (isset($_REQUEST['nom_materia'])) {
$nom_materia = $_REQUEST['nom_materia'];
} else {
$nom_materia = "";
}

if (isset($_REQUEST['nom_corto_materia'])) {
$nom_corto_materia = $_REQUEST['nom_corto_materia'];
} else {
$nom_corto_materia = "";
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
$fecha_reg_materia=date('Y-m-d');
//$estado_curso=1;
//$id_lectivo= $_SESSION['id_lectivo'];
//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
$inicial="select id_materia from materia where materia ='$nom_materia' ";

$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_inicial = mysqli_num_rows($sql_inicial);

//while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
//}

//echo "la primera: $resultado_estado";

if($resultado_inicial==0){
//	if($resultado_estado==0){  // no existe
			$consulta="INSERT INTO materia (materia,estado,nom_corto, fecha_registro_materia)
			VALUES ('$nom_materia',1,'$nom_corto_materia','$fecha_reg_materia')";
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";
			//$id_materia
		//FROM `usuario` ORDER BY `etiqueta` DESC LIMIT 1
			$inicial_interno="select id_materia from materia ORDER BY id_materia DESC LIMIT 1 ";
			$sql_inicial_interno=mysqli_query($myconex,$inicial_interno);
			while($row_interno = mysqli_fetch_array($sql_inicial_interno)){
				$id_materia=$row_interno['id_materia'];

			}

			$consulta_interna="INSERT INTO matriz_grado (id_materia,fecha_registro_matriz,estado_matriz,m0,m1,m2,m3,m4,m5,m6,m7,m8,m9,m10,m11,m12)
			VALUES ('$id_materia','$fecha_reg_materia',1,0,0,0,0,0,0,0,0,0,0,0,0,0)";
			$result = mysqli_query($myconex, $consulta_interna);



		}else{echo"0";}
		 	 //} //else {
		 	//echo "error";
		 	 //}
	
			}else{
				echo"0";

			}





?>