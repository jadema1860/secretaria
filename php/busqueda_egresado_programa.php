<?php
require("conexion.php");

if (isset($_REQUEST['desRango'])) {
$desRango = $_REQUEST['desRango'];
} else {
$desRango = "";
}

        /*
"select * from estudiante, titulo where
          estudiante.id_titulo=titulo.id_titulo
          and titulo.id_titulo='$id_titulo'
        */
        $result = mysqli_query($myconex, "SELECT 
        * FROM agente a INNER JOIN rango r ON a.rango= r.desRango 
        WHERE r.desRango='$desRango' ") ;
     //}
$row_numero = mysqli_num_rows($result);

if(mysqli_num_rows($result)==0){
echo"<br><div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>No encontrado</strong> No se encuentran registros</div>";

}else{  
echo "<h5 class='text-success'>Egresados: $row_numero</h5>";   
echo"<div id='container'><table class='table table-striped table-bordered table-hover table-condensed'>";
echo "<tr class='info'><th>Nombres</th><th>Rango</th><th>Editar</th></tr>";
  $i=1;
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  
    echo "<tr><td>".$fila["nomAgente"]."</td><td>".$fila["Rango"]."</td>";
		     
    echo"<td>"; ?><a class="btn btn-info" onClick="cargarFormulario('formulario_egresado_modificar.php?idAgente=<?php echo $fila["idAgente"]; ?>')" href="#"><span class="glyphicon glyphicon-search"></span></a> <?php echo"</td>";?>


<?php echo"</tr>"; 
$i++;
}
echo"</table></div>";

}

// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>
 <script type="text/javascript" src="../js/codigo.js"></script>
 