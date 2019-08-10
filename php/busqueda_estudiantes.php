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
        $result = mysqli_query($myconex, "select * from tbestudiante where (nom_estudiante like '%$nom_ape%') or ape_estudiante like '%$nom_ape%' order by ape_estudiante, nom_estudiante") ;
     }



// WHERE name LIKE '%w%'; //class='btn btn-lg btn-default'

//$result = mysqli_query($myconex, "select * from tbestudiante where nom_estudiante = '$nom_ape'");
//echo "<option>Seleccionar</option>";
     
echo"<div id='container'><table class='table table-striped table-bordered table-hover table-condensed'>";
echo "<tr class='info'><th>Foto</th><th>Documento</th><th>Nombres</th><th>Curso</th><th>Estado</th><th>Editar</th><th>Revisar Notas</th></tr>";
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  //..$fila["id_usuario"].
	//
    if($fila["foto"]==1){ $foto=$fila["documento"].".jpg";}else{$foto='sinfoto.jpg';}
    echo "<tr><td><img src='../fotografias/$foto' class='img-thumbnail' width='55'></td><td>".$fila["documento"]."</td><td class='mayusculas'>".$fila["ape_estudiante"]." ".$fila["nom_estudiante"]."</td>";
			 $temporal_documento=$fila['documento'];
			 $bus_mat = mysqli_query($myconex, "select curso_compuesto from tbmatricula, curso where tbmatricula.documento_estudiante='$temporal_documento' and tbmatricula.id_curso=curso.id_curso");
			 $curso_compuesto="";
			 	while ($fila_mat = mysqli_fetch_array($bus_mat, MYSQLI_ASSOC)) {
				$curso_compuesto=$fila_mat['curso_compuesto'];
				if(empty($curso_compuesto)){
					$curso_compuesto="No asignado";
				}
			 	}//

    echo "<td><span class='btn btn-default'>$curso_compuesto</span></td>";
echo "<td>";if($fila["estado_estudiante"]==1){echo"<span class='text-success'>Activo</span>";}else{echo"<span class='text-danger'>Inactivo</span>";}echo "</td>";	
    echo "<td>"; ?><a class="btn btn-info" onClick="cargarFormulario('formulario_estudiante_modificar.php?documento=<?php echo $fila["documento"]; ?>')" href="#"><span class="glyphicon glyphicon-search"></span></a> <?php echo"</td><td>"; ?><a  class="btn btn-warning" onClick="cargarFormulario('consulta_notas_curso_est.php?documento=<?php echo $fila["documento"]; ?>')" href="#"><span class="glyphicon glyphicon-search"></span></a> <?php echo"</td></tr>";
	
    	 
}
echo"</table></div>";



// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>
 