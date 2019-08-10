<?php
require("conexion.php");
$result = mysqli_query($myconex, "select * from rango");


while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    echo "<option value='".$fila["desRango"]."'>".$fila["desRango"]."</option>";
}
// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>