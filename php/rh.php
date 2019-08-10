<?php
require("conexion.php");
$result = mysqli_query($myconex, "select * from rh");
echo "<option>Seleccionar</option>";

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
    echo "<option val='".$fila["id_rh"]."'>".$fila["grupo"]."</option>";
}
// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>