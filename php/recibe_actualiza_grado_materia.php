<?php
require('conexion.php');

if (isset($_REQUEST['marcado'])) {
$marcado = $_REQUEST['marcado'];
} else {
$marcado = "";
}

if (isset($_REQUEST['valores'])) {
$valores = $_REQUEST['valores'];
} else {
$valores = "";
}
$cadena='';
$cadenax='';
$nombre='';
$numero=substr_count($marcado, 'm'); 
for($i=0;$i<=12;$i++){
$datam = explode("/", $marcado);
$datamx = explode("/", $valores); 
//echo $datam[$i];
if(12==$i){
$cadena =$cadena.$datam[$i];
$cadenax =$cadenax.$datamx[$i];
//$valor=substr($datam[$i], -1, 1);
$nombre=$nombre.$cadena.$cadenax;
}else{
//$valor=substr($datam[$i], -1, 1);
$cadena =$cadena.$datam[$i].",";

$cadenax =$cadenax.$datamx[$i];
$nombre=$nombre.$cadena.$cadenax;
//echo 	"<br>".$cadena;
	

}

$cadena='';
//$cadenax="";
}
//echo 	"<br>".$cadena;
//echo"<br>".$valor;
echo"<br>Nombre".$nombre;
//echo "<br>".$numero;
//echo $marcado;
//echo $resultado[2];
//$datam[0];


/*if (isset($_REQUEST['ape_docente'])) {
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
if (isset($_REQUEST['correo_docente'])) {
$correo_docente = $_REQUEST['correo_docente'];
} else {
$correo_docente = "";
}


if (isset($_REQUEST['estado_docente'])) {
$estado_docente = $_REQUEST['estado_docente'];
} else {
$estado_docente = "";
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
$fecha_reg_estudiante=date('Y-m-d');

//$observacion_estudiante=$_POST['observacion'];

/*$observacion=$_POST['observacion'];
$fecha_registro=date('Y-m-d');
*/
//echo"$username, $id_nivel, $novedad, $observacion, $id_asistencia";
/*$inicial="select documento from tbestudiante where documento='$documento'";
$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_estado = mysqli_num_rows($sql_inicial);
while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
  //  echo "<option>".$fila["nom_usuario"]."</option>";
}
*/
//echo "la primera: $resultado_estado";


	//if($resultado_estado==0){  // no existe

				
		/*	mysqli_query($myconex, "UPDATE lectivo set estado_lectivo=0");
		
			$consulta="UPDATE lectivo set 
			 estado_lectivo='1'where 
			 id_lectivo='$id_lectivo'";
			 	# code...
			 
			
			$result = mysqli_query($myconex, $consulta);*/
			//if($result){echo"1";}else{echo"0";}
			//echo $marcado;
		 	// } //else {
		 	//echo "error";
		 	 //}
	

//echo"$nom_docente, $ape_docente, $doc_docente, $fecha_nac_docente, $sexo, $tel_docente, $dir_docente, $estado_docente, $observacion";




?>