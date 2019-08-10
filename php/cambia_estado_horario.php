<?php
require('conexion.php');

if (isset($_REQUEST['id_hor'])) {
$id_hor = $_REQUEST['id_hor'];
} else {
$id_hor= "";
}

if (isset($_REQUEST['est'])) {
$est = $_REQUEST['est'];
} else {
$est= "";
}

	//echo "$est, $id_hor";	
			$consulta="UPDATE horario set 
			 estado='$est' where 
			 id_horario='$id_hor' ";
			 	# code...
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";
//echo $result;
						//$consulta_promover=mysqli_query($myconex,"UPDATE curso SET promover=1 
						//WHERE id_curso=$id_curso"); 
							

				}else{echo"0";}
		 	// } //else {
		 	//echo "error";
		 	 //}
	

//echo"$nom_docente, $ape_docente, $doc_docente, $fecha_nac_docente, $sexo, $tel_docente, $dir_docente, $estado_docente, $observacion";

//mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);


?>