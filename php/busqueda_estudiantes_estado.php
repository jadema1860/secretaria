<?php
require("conexion.php");

if (isset($_REQUEST['estado_est'])) {
$estado_est = $_REQUEST['estado_est'];
} else {
$estado_est = "";
}

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
        $result = mysqli_query($myconex, "select * from estudiante where doc_est = '$nom_ape' order by ape_est, nom_est");
    } else {
        $result = mysqli_query($myconex, "select * from estudiante where ((nom_est like '%$nom_ape%') or (ape_est like '%$nom_ape%')) order by ape_est, nom_est") ;
     }

  //$row_numero = mysqli_num_rows($result);

// WHERE name LIKE '%w%'; //class='btn btn-lg btn-default'

//$result = mysqli_query($myconex, "select * from tbestudiante where nom_estudiante = '$nom_ape'");
//echo "<option>Seleccionar</option>";
if(mysqli_num_rows($result)==0){
echo"<br><div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>No encontrado</strong> No se encuentran registros para: $nom_ape</div>";

}else{     
echo"<div id='container'><table class='table table-striped table-bordered table-hover table-condensed'>";
echo "<tr class='info'><th>Foto</th><th>Documento</th><th>Nombres</th><th>Curso</th><th>Editar</th><th>Revisar Notas</th></tr>";
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  //..$fila["id_usuario"].
	//
    if($fila["foto"]==1){ $foto=$fila["doc_est"].".jpg";}else{$foto='sinfoto.jpg';}
    echo "<tr><td><img src='../fotografias/$foto' class='img-thumbnail' width='55'></td><td>".$fila["doc_est"]."</td><td class='mayusculas'>".$fila["ape_est"]." ".$fila["nom_est"]."</td><td class='mayusculas'>".$fila["correo_est"]."</td></td><td class='mayusculas'>".$fila["tel_est"]."</td><td class='mayusculas'>".$fila["correo_est"]."</td>"";
			 $temporal_documento=$fila['doc_est'];
			 $bus_mat = mysqli_query($myconex, "select curso_compuesto from tbmatricula, curso where tbmatricula.documento_estudiante='$temporal_documento' and tbmatricula.id_curso=curso.id_curso");
			 $curso_compuesto="No Asignado";
			 	while ($fila_mat = mysqli_fetch_array($bus_mat, MYSQLI_ASSOC)) {
				$curso_compuesto=$fila_mat['curso_compuesto'];
				//if($curso_compuesto=="0"){
				//	$curso_compuesto="No asignado";
			//	}
			 	}//
    echo "<td><span class='btn btn-default'>$curso_compuesto</span></td>";
    echo"<td>"; ?><a class="btn btn-info" onClick="cargarFormulario('formulario_estudiante_modificar.php?documento=<?php echo $fila["documento"]; ?>')" href="#"><span class="glyphicon glyphicon-search"></span></a> <?php echo"</td><td>"; ?><a  class="btn btn-warning" onClick="cargarFormulario('consulta_notas_curso_est.php?documento=<?php echo $fila["documento"]; ?>')" href="#"><span class="glyphicon glyphicon-search"></span></a> <?php echo"</td></tr>";

    	 
}
echo"</table></div>";

}

// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>
 
 