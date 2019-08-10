<script type="text/javascript" src="../js/codigo.js"></script>
<?php
require("conexion.php");

if (isset($_REQUEST['nom_ape'])) {
$nom_ape = $_REQUEST['nom_ape'];
} else {
$nom_ape = "";
}

$ano_lectivo="";


if (isset($_REQUEST['documento'])) {
$documento = $_REQUEST['documento'];
} else {
$documento = "";
}


if(is_numeric($nom_ape)) {
        $result = mysqli_query($myconex, "SELECT * FROM empresa WHERE documento = '$nom_ape'");
    } else {
        $result = mysqli_query($myconex, "SELECT *, des_tipo_empresa 
        FROM empresa em
        INNER JOIN tipo_empresa te ON em.tipo_emp=te.id_tipo_empresa
        ORDER BY estado DESC") ;
    }

echo"<h3 class='text-info'>Entidad/Empresa</h3>";
echo "<div id='result'>";
echo"<div id='container'><table class='table table-striped table-bordered table-hover table-condensed'>";
echo "<tr class='info'><th>N°</th><th>Nombre Empresa</th><th>Nit</th><th>Contacto</th><th>Celular</th><th>Tipo Empresa</th><th>Estado</th><th>Consultar</th></tr>";
$i=1;
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    echo "<tr><td> $i </td>
              <td>
              <input id='id_emp".$i."' type='hidden' value='".$fila["id_emp"]."'>
               <input id='cor_emp".$i."' type='hidden' value='".$fila["correo_emp"]."'>
              <input id='est".$i."' type='hidden' value='".$fila["estado"]."'>".$fila["nom_emp"]."</td>
              <td>".$fila["nit_emp"]."</td>
              <td>".$fila["nom_contacto"]."</td>
              <td class='mayusculas'>".$fila["tel_emp"]."</td>
              <td>".$fila["des_tipo_empresa"]."</td>
              <td>";  if($fila["estado"]==1){echo"<button id='".$i."' class='btn btn-success emp'>Activo</button>";}else{echo"<button id='".$i."' class='btn btn-danger emp'>Inactivo</button>";}echo"</td>
              <td>"; ?><button id="<?php echo $i ?>" type="button" class="btn btn-primary vinculoE" data-toggle="modal" data-target="#exampleModalLong">
  <span class="glyphicon glyphicon-user"></span></button> <?php echo"</td><tr>";

 $i++;  	 
}
echo"</table></div></div>";



// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div id="respuesta"></div>
      </div>
    </div>
  </div>
</div>
 