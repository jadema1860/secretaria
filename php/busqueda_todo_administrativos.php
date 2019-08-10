<?php
require("conexion.php");

if (isset($_REQUEST['nom_ape'])) {
$nom_ape = $_REQUEST['nom_ape'];
} else {
$nom_ape = "";
}

$ano_lectivo="";

//$ano_lectivo=$_REQUEST['ano_lectivo'];


if (isset($_REQUEST['documento'])) {
$documento = $_REQUEST['documento'];
} else {
$documento = "";
}


if(is_numeric($nom_ape)) {
       // $result = mysqli_query($myconex, "select * from tbestudiante where documento = '$nom_ape'");
        $result = mysqli_query($myconex, "select id_usu,nom_usu,ape_usu,correo_usu,contrasena_usu,estado.estado,doc_usu,fecha_reg_usu, usuarios.id_estado from usuarios, estado where usuarios.id_estado=estado.id_estado order by usuarios.id_estado desc, ape_usu, nom_usu") ;

    } else {
        $result = mysqli_query($myconex, "select id_usu,nom_usu,ape_usu,correo_usu,contrasena_usu,estado.estado,doc_usu,fecha_reg_usu, usuarios.id_estado from usuarios, estado where usuarios.id_estado=estado.id_estado order by usuarios.id_estado desc, ape_usu, nom_usu") ;
    }

// WHERE name LIKE '%w%'; //class='btn btn-lg btn-default'

//$result = mysqli_query($myconex, "select * from tbestudiante where nom_estudiante = '$nom_ape'");
//echo "<option>Seleccionar</option>";
echo"<br><div id='container'><table class='table table-striped table-bordered table-hover table-condensed'>";
echo "<tr class='info'><th>N°</th><th>Documento</th><th>Nombres y Apellidos</th><th>Estado</th><th>Consultar</th></tr>";
$i=1;// MYSQLI_ASSOC
//echo mysqli_error();
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  //..$fila["id_usuario"].
	//
    //if($fila["foto"]==1){ $foto=$fila["documento"].".jpg";}else{$foto='sinfoto.jpg';}<img src='../fotos/$foto' class='img-thumbnail' width='60'>
    echo "<tr><td> $i </td>
              <td>".$fila["doc_usu"]."</td>
              <td class='mayusculas'>".$fila["ape_usu"]." ".$fila["nom_usu"]."</td>
              <td>";
              switch ($fila["id_estado"]) {
                case '0':
                  echo "<strong class='text-danger'>Inactivo</strong>";
                  break;                
                case '1':
                  echo "<strong class='text-success'>Activo</strong>";
                  break;
              }
              echo"</td>
              <td>"; ?><a class="btn btn-info" onClick="cargarFormulario('formulario_administrativo_modificar.php?doc_usu=<?php echo $fila["doc_usu"]; ?>')" href="#"><span class="glyphicon glyphicon-search"></span></a> <?php echo"</td><tr>";

 $i++;  	 
}
echo"</table></div>";



// Liberar resultados
//mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>
 