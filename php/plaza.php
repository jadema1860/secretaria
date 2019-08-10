<!--<script src="../js/bootbox.min.js"></script>-->
<script src="../js/codigo.js"></script>
<?php
require("conexion.php");

if (isset($_REQUEST['plaza'])) {
$plaza = $_REQUEST['plaza'];
} else {
$plaza = "";
}

if (isset($_REQUEST['nit'])) {
$nit = $_REQUEST['nit'];
} else {
$nit = "";
}


//if(is_numeric($nom_ape)) {
//        $result = mysqli_query($myconex, "select * from empresa where documento = '$nom_ape'");
//    } else {
$result = mysqli_query($myconex, "SELECT nom_est, ape_est, doc_est, correo_est, fecha_nac, tel_est
FROM solicitud, titulo, estudiante 
where solicitud.id_solicitud='$plaza'
and solicitud.id_titulo=titulo.id_titulo
and estudiante.id_titulo=solicitud.id_titulo
and estudiante.estado_est=1") ;

?> <input type='hidden' value='<?php echo $plaza ?>' id='id_plaza'>
   <input type='hidden' value='<?php echo $nit ?>' id='nit'><?php
//$result = mysqli_query($myconex, "select * from tbestudiante where nom_estudiante = '$nom_ape'");
//echo "<option>Seleccionar</option>";
echo"<div id='container'><table class='table table-striped table-bordered table-hover table-condensed'>";
echo "<tr class='info'><th>N°</th><th>Nombres Apellidos</th><th>Telefono</th><th>Correo</th><th>Edad</th><th>Postular</th></tr>";
$i=1;
while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  //..$fila["id_usuario"].
	//
    //if($fila["foto"]==1){ $foto=$fila["documento"].".jpg";}else{$foto='sinfoto.jpg';}<img src='../fotos/$foto' class='img-thumbnail' width='60'>
//if($fila["foto"]==1){ $foto=$fila["documento"].".jpg";}else{$foto='sinfoto.jpg';}
    echo "<tr><td> $i </td>
              <td class='mayusculas'>"; ?>
              <input type='hidden' value='<?php echo $fila["doc_est"] ?>' id='<?php echo "postular".$i ?>'> <?php echo $fila["nom_est"]." ".$fila["ape_est"]."</td>
              <td class='mayusculas'>".$fila["tel_est"]."</td>
              <td>".$fila["correo_est"]."</td>
              <td>"; $fecha_nac= $fila["fecha_nac"];require('edad.php'); echo"</td>"; 
              echo"<td>";?>   
  <button class="btn btn-default alert" id="<?php echo $i ?>"><span class="glyphicon glyphicon-flag text-success">
  </span></button>
               <?php echo"</td><tr>";

 $i++;  	 
}
echo"</table></div>";



// Liberar resultados
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

//echo"casa";
?>
 <script language="javascript">
 //$array = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
function postular(y,z,x){ 
if(confirm("¿ DESEA POSTULAR AL EGRESADO PARA ESTE CARGO ?")) {   
n="postular_egresado.php?id_solicitud="+y+"&doc_est="+z+"&id_estado=0";
    pagina= n ;
    //alert(pagina)
      document.location.href= pagina; 
}
}
</script>

<!--<button class="btn btn-default" id="btn-confirm">Confirm</button>-->

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Postular</h4>
      </div>
      <div class="modal-body">
        <h5>Realmente desea eliminar</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si">Si</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>

<div class="alert" role="alert" id="result"></div>
<script type="text/javascript">
var modalConfirm = function(callback){
  
  $("#btn-confirm").on("click", function(){
    $("#mi-modal").modal('show');
  });

  $("#modal-btn-si").on("click", function(){
    callback(true);
    alert("prueba");
    $("#mi-modal").modal('hide');

  });
  
  $("#modal-btn-no").on("click", function(){
    callback(false);
    $("#mi-modal").modal('hide');
  });
};

modalConfirm(function(confirm){
  if(confirm){
    //Acciones si el usuario confirma
    $("#result").html("CONFIRMADO");
  }else{
    //Acciones si el usuario no confirma
    $("#result").html("NO CONFIRMADO");
  }
});

</script>