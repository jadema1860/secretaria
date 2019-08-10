<?php
require('conexion.php');
if (isset($_REQUEST['nom_emp'])) {
$nom_emp = $_REQUEST['nom_emp'];
} else {
$nom_emp = "";
}
if (isset($_REQUEST['nom_contacto'])) {
$nom_contacto = $_REQUEST['nom_contacto'];
} else {
$nom_contacto = "";
}
if (isset($_REQUEST['dir_emp'])) {
$dir_emp = $_REQUEST['dir_emp'];
} else {
$dir_emp = "";
}
if (isset($_REQUEST['tel_emp'])) {
$tel_emp = $_REQUEST['tel_emp'];
} else {
$tel_emp = "";
}
if (isset($_REQUEST['id_tipo_emp'])) {
$id_tipo_emp = $_REQUEST['id_tipo_emp'];
} else {
$id_tipo_emp = "";
}
if (isset($_REQUEST['correo_emp'])) {
$correo_emp = $_REQUEST['correo_emp'];
} else {
$correo_emp = "";
}
if (isset($_REQUEST['nit_emp'])) {
$nit_emp = $_REQUEST['nit_emp'];
} else {
$nit_emp = "";
}

if (isset($_REQUEST['id_emp'])) {
$id_emp = $_REQUEST['id_emp'];
} else {
$id_emp = "";
}
$fecha_reg_estudiante=date('Y-m-d');
	
			$consulta="UPDATE empresa set 
			 nom_emp='$nom_emp',
			 dir_emp='$dir_emp',
			 tel_emp='$tel_emp',
			 nom_contacto='$nom_contacto', 
			 tipo_emp='$id_tipo_emp',
			 correo_emp='$correo_emp',
			 nit_emp='$nit_emp'
			 where 
			 id_emp='$id_emp'";
			 	# code...
			 
			
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";}else{echo"0";}


?>