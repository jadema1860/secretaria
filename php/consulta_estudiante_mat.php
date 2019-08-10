
<?php
$nom_estudiante="";
if (isset($_REQUEST['documento'])) {
$documento = $_REQUEST['documento'];
} else {
$documento = "";
}

require("conexion.php");
$result = mysqli_query($myconex, "select nom_estudiante, ape_estudiante, documento from tbestudiante where estado_estudiante=1 and documento='$documento'");

if(mysqli_num_rows($result)>0){
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$nom_estudiante= $fila["nom_estudiante"]." ".$fila["ape_estudiante"];
    
}

echo"1-$nom_estudiante";

//<div id='res_int' class='alert alert-dismissible alert-success'><strong>¡Correcto!</strong> $nom_estudiante Encontrado.</div><div id='res_int' class='alert alert-dismissible alert-danger'><strong>¡Error!</strong> $nom_estudiante No Encontrado.</div>

}else{

echo"0-$nom_estudiante";

}

// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>