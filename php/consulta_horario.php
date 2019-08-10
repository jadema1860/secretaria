  <script type="text/javascript" src="../js/codigo.js"></script>
<?php
require("conexion.php");

if (isset($_REQUEST['nom_ape'])) {
$nom_ape = $_REQUEST['nom_ape'];
} else {
$nom_ape = "";
}

if (isset($_REQUEST['documento'])) {
$documento = $_REQUEST['documento'];
} else {
$documento = "";
}
$curso_compuesto="";

if(is_numeric($nom_ape)) {
        $result = mysqli_query($myconex, "select * from tbestudiante where documento = '$nom_ape' order by ape_estudiante, nom_estudiante");
    } else {
        $result = mysqli_query($myconex, "select * from horario order by estado desc, id_horario") ;
     }



// WHERE name LIKE '%w%'; //class='btn btn-lg btn-default'

//$result = mysqli_query($myconex, "select * from tbestudiante where nom_estudiante = '$nom_ape'");
//echo "<option>Seleccionar</option>";
     
echo"<div id='container'><table class='table table-striped table-bordered table-hover table-condensed'>";
echo "<tr class='info'><th>Horario</th><th>Estado</th></tr>";
$i=1;
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  //..$fila["id_usuario"].
	//
   // if($fila["foto"]==1){ $foto=$fila["documento"].".jpg";}else{$foto='sinfoto.jpg';}
    echo "<tr><td>".$fila["des_horario"]."
    </td><td><input id='id_hor".$i."' type='hidden' value='".$fila["id_horario"]."'>
    <input id='est".$i."' type='hidden' value='".$fila["estado"]."'>
    ";
    if($fila["estado"]==1){echo"<button id='".$i."' class='btn btn-success hor'>Activo</button>";}else{echo"<button id='".$i."' class='btn btn-danger hor'>Inactivo</button>";}
    echo"</td></tr>";
	
$i++;    	 
}
echo"</table></div>";



// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>
 