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
echo "<tr class='info'><th>Foto</th><th>Documento</th><th>Nombres</th><th>Email</th><th>Cel</th><th>Estado</th><th>Titulo</th><th>Editar</th><th>Ver HV</th></tr>";
   $i=1;
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  //..$fila["id_usuario"].
	//
    if($fila["foto"]==1){ $foto=$fila["doc_est"].".jpg?".rand(1,1000);}else{$foto='sinfoto.jpg';} 
    echo "<tr><td><img src='../fotografias/$foto' class='img-thumbnail' width='55'></td><td>".$fila["doc_est"]."</td><td class='mayusculas'>".$fila["ape_est"]." ".$fila["nom_est"]."</td><td class='minusculas'>".$fila["correo_est"]."</td></td><td class='mayusculas'>".$fila["tel_est"]."</td><td class='minusculas'>";
    $doc_est=$fila["doc_est"]; 
      ?>
    

<input type="hidden" id="<?php echo "postular".$i ?>" value="<?php echo "$doc_est"; ?>">
      <?php
   // if($fila["estado_est"]==0){echo"Disponible";}else{echo"Trabajando";}

switch ($fila["estado_est"]) {
  case 0:
  echo"<button id='' class='btn btn-danger hor'>Inactivo</button>";
  break;
  case 1:
  echo"<button id='' class='btn btn-info hor'>Activo</button>";
  break;
  case 2:
  echo"<button id='' class='btn btn-success hor'>Disponible</button>";
  break;
  case 3:
  echo"<button id='' class='btn btn-warning hor'>Trabajando</button>";
  break;
   }

    /*if($fila["estado_est"]==1){echo"<button id='' class='btn btn-info hor'>Disponible</button>";}else{echo"<button id='' class='btn btn-warning hor'>Trabajando</button>";}*/

      echo"</td>";
			 $temporal=$fila['id_titulo'];
			 $bus_mat = mysqli_query($myconex, "select des_titulo from titulo where id_titulo = $temporal");
			 //$curso_compuesto="No Asignado";

			 	while ($fila_mat = mysqli_fetch_array($bus_mat, MYSQLI_ASSOC)) {
				$des_titulo=$fila_mat['des_titulo'];
			
			 	}//
    echo "<td><span class=''>$des_titulo</span></td>";
    echo"<td>"; ?><a class="btn btn-info" onClick="cargarFormulario('formulario_egresado_modificar.php?documento=<?php echo $fila["doc_est"]; ?>')" href="#"><span class="glyphicon glyphicon-search"></span></a> <?php echo"</td>";
   echo"<td>"; ?>
   <button id="<?php echo $i ?>" type="button" class="btn btn-success vinculoH" data-toggle="modal" data-target="#exampleModalLong5">
  <span class="glyphicon glyphicon-folder-open"></span>
</button>
 <?php echo"</td></tr>";

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