<?php
require('conexion.php');

if (isset($_REQUEST['idAgente'])) {
$idAgente = $_REQUEST['idAgente'];
} else {
$idAgente = "";
}

if (isset($_REQUEST['nomAgente'])) {
	$nomAgente = $_REQUEST['nomAgente'];
	} else {
	$nomAgente = "";
	}
if (isset($_REQUEST['desRango'])) {
$desRango = $_REQUEST['desRango'];
}else{
$desRango = "";
}
	
			$consulta="UPDATE agente set 
			 nomAgente='$nomAgente',
			 Rango='$desRango'
			
		 where 
			 idAgente='$idAgente'";
			 			 			
			$result = mysqli_query($myconex, $consulta);
		   if($result){echo"1";}else{echo"0";}
		
?>