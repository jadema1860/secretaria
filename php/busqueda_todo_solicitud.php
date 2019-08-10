<?php session_start();
if (empty($_SESSION["nit_emp"])) {
  }else{
$nit_emp=$_SESSION["nit_emp"];    
  }


if (empty($_SESSION["tipo_olinea"])) {
  }else{
$tipo_olinea=$_SESSION["tipo_olinea"];    
  }

 ?>
<script src="../js/codigo.js"></script>
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

if (empty($_SESSION["doc_est"])) {
  }else{
$doc_est=$_SESSION["doc_est"];    
  }
switch ($tipo_olinea) {
case 'Administrador':
     $result = mysqli_query($myconex, "SELECT em.nom_emp, sol.nit_emp, em.id_emp, em.nom_emp, tit.des_titulo, hor.des_horario, id_estado, sol.fecha_sol, tit.id_titulo, informacion, id_solicitud, sol.num_asp_rec 
     FROM solicitud sol 
     INNER JOIN empresa em ON sol.nit_emp = em.nit_emp 
     INNER JOIN titulo tit ON sol.id_titulo = tit.id_titulo 
     INNER JOIN horario hor ON sol.id_horario = hor.id_horario 
     WHERE sol.id_estado=1 
     ORDER BY fecha_sol 
     DESC");
break;
case 'Empresa':
    $result = mysqli_query($myconex, "SELECT em.nom_emp, sol.nit_emp, em.id_emp, em.nom_emp, tit.des_titulo, hor.des_horario, id_estado, sol.fecha_sol, tit.id_titulo, informacion, id_solicitud, sol.num_asp_rec 
    FROM solicitud sol 
    INNER JOIN empresa em ON sol.nit_emp = em.nit_emp 
    INNER JOIN titulo tit ON sol.id_titulo = tit.id_titulo 
    INNER JOIN horario hor ON sol.id_horario = hor.id_horario 
    WHERE sol.id_estado=1 
    AND em.nit_emp='$nit_emp' 
    ORDER BY fecha_sol 
    DESC") ;  

break;

 case 'Estudiante':
    $result = mysqli_query($myconex, "SELECT em.nom_emp, sol.nit_emp, em.id_emp, em.nom_emp, tit.des_titulo, hor.des_horario, id_estado, sol.fecha_sol, tit.id_titulo, informacion, id_solicitud,sol.num_asp_rec 
    FROM solicitud sol 
    INNER JOIN empresa em ON sol.nit_emp=em.nit_emp 
    INNER JOIN titulo tit ON sol.id_titulo=tit.id_titulo 
    INNER JOIN estudiante es ON es.id_titulo = tit.id_titulo 
    INNER JOIN horario hor ON sol.id_horario = hor.id_horario 
    WHERE es.doc_est ='$doc_est' 
    AND sol.id_estado=1 
    ORDER BY sol.fecha_sol 
    DESC ");
break;
}


$num=mysqli_num_rows($result);   

if($num==0){
echo"<br><div class='alert alert-dismissible alert-warning'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Advertencia!</strong> Ninguna solicitud Disponible</div>";
}else{

echo"<h3 class='text-success'>Solicitudes Abiertas</h3>";
echo"<div id='container' class='u'><table class='table table-striped table-bordered table-hover table-condensed'>";
echo "<tr class='info'><th>N°</th><th>Empresa Solicitante</th><th>Perfil Requerido</th><th>Horario</th><th>Fecha Solicitud</th><th>Informacion Adicional</th>";

switch ($tipo_olinea) {
case 'Administrador':
echo"<th>Editar</th><th>Postulados</th>";
break;
case 'Empresa':
echo"<th>Editar</th><th>Postulados</th>";
break;
case 'Estudiante':
echo"<th>Postulación</th>";
break;
   } 
echo "</tr>";

$i=1;
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
<tr><td><?php echo $i ?></td>
    <td> <?php echo $fila["nom_emp"] ?>
    <input type='hidden' value='<?php echo $fila["id_solicitud"] ?>' id='<?php echo "sol".$i ?>'>
    <input type='hidden' value='<?php echo $fila["nit_emp"] ?>' id='<?php echo "nit".$i ?>'>
    </td>
    <td> <?php echo $fila["des_titulo"] ?></td>
    <td class='mayusculas'> <?php echo $fila["des_horario"] ?></td>
    <td> <?php echo $fila["fecha_sol"] ?></td>
    <td> <?php echo $fila["informacion"] ?></td>
    <?php 

switch ($tipo_olinea) {
case 'Administrador':
echo"<td>"; ?><button id="<?php echo $i ?>" type="button" class="btn btn-primary vinculoI" data-toggle="modal" data-target="#exampleModalLong">
<span class="glyphicon glyphicon-search"></span></button> <?php echo"</td>"; ?>
<td> <button id="<?php echo $i ?>" type="button" class="btn btn-success vinculoP" data-toggle="modal" data-target="#exampleModalLong">
  <span class="glyphicon glyphicon-user"><strong><?php echo " ".$fila["num_asp_rec"] ?></strong></span>
</button><?php echo"</td>";
break;
case 'Empresa':
echo"<td>"; ?><button id="<?php echo $i ?>" type="button" class="btn btn-primary vinculoI" data-toggle="modal" data-target="#exampleModalLong">
  <span class="glyphicon glyphicon-search"></span></button> <?php echo"</td>"; ?>


<td> <button id="<?php echo $i ?>" type="button" class="btn btn-success vinculoP" data-toggle="modal" data-target="#exampleModalLong">
  <span class="glyphicon glyphicon-user"><strong><?php echo " ".$fila["num_asp_rec"] ?></strong></span>
</button><?php echo"</td>";
break;
case 'Estudiante':
echo "<td>";?>
 <button class="btn btn-success alert2" id="<?php echo $i ?>">Postular Vacanate. <span class="glyphicon glyphicon-flag text-success">
  </span></button><?php echo"</td>";
break;
   } 
echo "</tr>";



 $i++;  	 
}
echo"</table></div>";



// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);
}
//echo"casa";
?>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Egresados postulados al cargo</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="respuesta"></div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-danger closeModal" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModalLong5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Hoja de Vida</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="respuesta5"></div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-danger closeModal" data-dismiss="modal">Cerrar</button>
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

