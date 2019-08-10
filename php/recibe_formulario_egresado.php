<?php
require('conexion.php');

if (isset($_REQUEST['nombre'])) {
$nombre = $_REQUEST['nombre'];
} else {
$nombre = "";
}

if (isset($_REQUEST['rango'])) {
$rango = $_REQUEST['rango'];
} else {
$rango = "";
}


$inicial="select nomAgente from agente where nomAgente='$nombre'";
$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_estado = mysqli_num_rows($sql_inicial);

	if($resultado_estado==0){  // no existe y agrega nuevo
			$foto=$control;
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
	}else{
	$uploadOk=0;
	}
//if($uploadOk==1){$foto=1;}else{$foto=0;}
			
					$hv=$controlPDF;
					if($controlPDF==1){ //si se envio imagen

				if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["fileToUploadPDF"]["type"])){
					$target_dir = "../pdf/";
					$carpeta=$target_dir;
					$target_file = $carpeta . basename($_FILES["fileToUploadPDF"]["name"]);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
									
					$file_name=$documento.'.pdf';
					$add="$carpeta/$file_name";
				
					    if (move_uploaded_file($_FILES["fileToUploadPDF"]["tmp_name"], $add)) {
					    	$uploadOk=1;	
					    	$hv=1;				    					   
					    }else{
					    	$hv=0;
				    } 
			    }
			}

	

		
			$consulta="INSERT INTO agente (nomAgente, rango)
			VALUES ('$nombre',
					'$rango'			
					)";
			$result = mysqli_query($myconex, $consulta);
			if($result){echo "1";}else{echo "0";}
		 	 } else {
		 	echo 2;
		 	 }
?>