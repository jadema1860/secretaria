<?php session_start();
if (empty($_SESSION["nit_emp"])) {
  }else{
$nit_emp=$_SESSION["nit_emp"];    
  }

 // echo"Es el nit: $nit_emp";
 ?>
 <script src="../js/codigo.js"></script>
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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


if (isset($nit_emp)) { //sino existe
        $result = mysqli_query($myconex, "SELECT estudiante.doc_est, estudiante.tel_est, estudiante.nom_est, estudiante.ape_est, solicitud.id_solicitud, empresa.id_emp, empresa.nom_emp, titulo.des_titulo, horario.des_horario, id_estado, solicitud.fecha_sol, titulo.id_titulo, informacion , fecha_vin,  id_vinculacion, estado_vin, valoracion, obs_vin
FROM solicitud, empresa, titulo, horario, vinculacion, estudiante 
where empresa.nit_emp = solicitud.nit_emp
and solicitud.id_titulo = titulo.id_titulo
and estudiante.doc_est=vinculacion.doc_est
and solicitud.id_solicitud=vinculacion.id_solicitud
and solicitud.id_horario = horario.id_horario
and empresa.nit_emp='$nit_emp'
and solicitud.id_estado = 0 order by estado_vin asc, fecha_sol desc");
    } else {
        $result = mysqli_query($myconex, "SELECT estudiante.doc_est,estudiante.tel_est, estudiante.nom_est, estudiante.ape_est, solicitud.id_solicitud, empresa.id_emp, empresa.nom_emp, titulo.des_titulo, horario.des_horario, id_estado, solicitud.fecha_sol, titulo.id_titulo, informacion , fecha_vin, id_vinculacion, estado_vin, valoracion, obs_vin
FROM solicitud, empresa, titulo, horario, vinculacion, estudiante
where empresa.nit_emp = solicitud.nit_emp
and solicitud.id_titulo = titulo.id_titulo
and estudiante.doc_est=vinculacion.doc_est
and solicitud.id_solicitud=vinculacion.id_solicitud
and solicitud.id_horario = horario.id_horario
and solicitud.id_estado = 0 order by estado_vin asc, fecha_sol desc") ;
    }

echo"<h3 class='text-danger'>Solicitudes Cerradas</h3>";
echo"<div id='container'><table class='table table-striped table-bordered table-hover table-condensed'>";
echo "<tr class='info'><th>N°</th><th>Empresa Solicitante</th><th>Perfil Requerido</th><th>Fecha Solicitud</th><th>Fecha Asignacion</th><th>Egresado</th><th>Telefono Egresado</th><th>Finalizar vínculo</th><th>Estado Vinculación</th></tr>";
$i=1;
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  //..$fila["id_usuario"].
	//
    //if($fila["foto"]==1){ $foto=$fila["documento"].".jpg";}else{$foto='sinfoto.jpg';}<img src='../fotos/$foto' class='img-thumbnail' width='60'>
//if($fila["foto"]==1){ $foto=$fila["documento"].".jpg";}else{$foto='sinfoto.jpg';}
    echo "<tr><td> $i ";
 $id_vinculacion= $fila["id_vinculacion"];
 $obs_vin=$fila["obs_vin"];
 $nom=$fila["nom_est"].' '.$fila["ape_est"];
 $valoracion= $fila["valoracion"];
 $doc_est= $fila["doc_est"];
    ?>
   
    <input type="hidden" id="<?php echo 'vin'.$i ?>" value="<?php echo $id_vinculacion; ?>">
    <input type="hidden" id="<?php echo "nom".$i ?>" value="<?php echo $nom ?>">
    <input type="hidden" id="<?php echo "doc_est".$i ?>" value="<?php echo $doc_est ?>">
    <?php echo"</td>
              <td>".$fila["nom_emp"]."</td>
              <td>".$fila["des_titulo"]."</td>
              <td class='mayusculas'>".$fila["fecha_sol"]."</td>
              <td>".$fila["fecha_sol"]."</td>
              <td>".$fila["nom_est"]." ".$fila["ape_est"]."</td>
              <td>".$fila["tel_est"]."</td>
              <td>";
if($fila["estado_vin"]==0){ ?>
  <button id="<?php echo $i ?>" type="button" class="btn btn-primary vin" data-toggle="modal" data-target="#exampleModalLong">
  <span class="glyphicon glyphicon-export"></span>
</button>
<?php }else{
           if(empty($obs_vin)){
           echo "<strong class='text-info'>$valoracion</strong>";    
           }else{
           echo "<div title='$obs_vin' class='ion-ios-chatboxes text-danger' ><span class='step size-25'> "."---".$valoracion."</span></div>"; 
  }
}
              ?>

             <?php echo"</td><td>";
              if($fila["estado_vin"]==0){echo"<span class='text-success'>Vigente</span>";}else{echo"<span class='text-warning'>Finalizado</span>";}
              echo"</td>
              <tr>";

 $i++;  	 
}
echo"</table></div>";



// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>
 <div class="modal fade bd-example-modal-mg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-mg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Calificar Egresado</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       
      </div>
      <div class="modal-body">
        <div id="respuestax"></div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_cerrar_cargar">Salir</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>