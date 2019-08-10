<?php
require("conexion.php");
$result = mysqli_query($myconex, "select * from tipo_empresa");
//echo "<option value='0'>Seleccionar Tipo Empresa</option>";

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	//..$fila["id_usuario"].
    echo "<option value='".$fila["id_tipo_empresa"]."'>".$fila["des_tipo_empresa"]."</option>";
}
// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>