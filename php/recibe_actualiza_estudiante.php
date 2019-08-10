<?php
require('conexion.php');

if (isset($_REQUEST['nombre'])) {
$nom_estudiante = $_REQUEST['nombre'];
} else {
$nom_estudiante = "";
}

if (isset($_REQUEST['apellido'])) {
$ape_estudiante = $_REQUEST['apellido'];
} else {
$ape_estudiante = "";
}
if (isset($_REQUEST['documento'])) {
$documento = $_REQUEST['documento'];
} else {
$documento = "";
}
if (isset($_REQUEST['fecha_nac'])) {
$fecha_nac = $_REQUEST['fecha_nac'];
} else {
$fecha_nac = "";
}
if (isset($_REQUEST['sexo'])) {
$sexo = $_REQUEST['sexo'];
} else {
$sexo = "";
}
if (isset($_REQUEST['rh'])) {
$rh = $_REQUEST['rh'];
} else {
$rh = "";
}
if (isset($_REQUEST['tel'])) {
$tel_estudiante = $_REQUEST['tel'];
} else {
$tel_estudiante = "";
}
if (isset($_REQUEST['direccion'])) {
$dir_estudiante = $_REQUEST['direccion'];
} else {
$dir_estudiante = "";
}
if (isset($_REQUEST['nom_padre'])) {
$nom_padre_estudiante = $_REQUEST['nom_padre'];
} else {
$nom_padre_estudiante = "";
}
if (isset($_REQUEST['tel_padre'])) {
$tel_padre_estudiante = $_REQUEST['tel_padre'];
} else {
$tel_padre_estudiante = "";
}
if (isset($_REQUEST['nom_madre'])) {
$nom_madre_estudiante = $_REQUEST['nom_madre'];
} else {
$nom_madre_estudiante = "";
}
if (isset($_REQUEST['tel_madre'])) {
$tel_madre_estudiante = $_REQUEST['tel_madre'];
} else {
$tel_madre_estudiante = "";
}
if (isset($_REQUEST['observacion'])) {
$observacion_estudiante = $_REQUEST['observacion'];
} else {
$observacion_estudiante = "";
}
if (isset($_REQUEST['control'])) {
$control= $_REQUEST['control'];
} else {
$control= "";
}

if (isset($_REQUEST['estado'])) {
$estado_estudiante= $_REQUEST['estado'];
} else {
$estado_estudiante= "";
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
$fecha_reg_estudiante=date('Y-m-d');
//$estado_estudiante=1;
//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
$inicial="select documento from tbestudiante where documento='$documento'";
$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_estado = mysqli_num_rows($sql_inicial);
while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
}

//echo "la primera: $resultado_estado";


	//if($resultado_estado==0){  // no existe


							if($control==1){ //si se envio imagen

				if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["fileToUpload"]["type"])){
					$target_dir = "../fotografias/";
					$carpeta=$target_dir;
					$target_file = $carpeta . basename($_FILES["fileToUpload"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
									
					$file_name=$documento.'.jpg';
					$add="$carpeta/$file_name";
				
					    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $add)) {
					    	$uploadOk=1;					    					   
					    } 
				 }

	}

			$consulta="UPDATE tbestudiante set 
			 nom_estudiante='$nom_estudiante',
			 ape_estudiante='$ape_estudiante',
			 documento='$documento',
			 fecha_nac='$fecha_nac', 
			 sexo='$sexo',
			 rh='$rh',
			 tel_estudiante='$tel_estudiante',
			 dir_estudiante='$dir_estudiante',
			 nom_padre_estudiante='$nom_padre_estudiante',
			 tel_padre_estudiante='$tel_padre_estudiante',
			 nom_madre_estudiante='$nom_madre_estudiante',
			 tel_madre_estudiante='$tel_madre_estudiante',
			 fecha_reg_estudiante='$fecha_reg_estudiante',
			 estado_estudiante='$estado_estudiante',
			 observacion_estudiante='$observacion_estudiante' where 
			 documento='$documento'";
			 	# code...
			 
			
			$result = mysqli_query($myconex, $consulta);
		   if($result){echo"1";}else{echo"0";}
		//	echo"control $control";
		 	// } //else {
		 	//echo "error";
		 	 //}
	






?>