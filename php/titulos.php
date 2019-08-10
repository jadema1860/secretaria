<?php
require("conexion.php");
$result = mysqli_query($myconex, "select * from titulo");
//echo "<option value='0'>Seleccionar Titulo Obtenido</option>";

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
    echo "<option value='".$fila["id_titulo"]."'>".$fila["des_titulo"]."</option>";
}
// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>