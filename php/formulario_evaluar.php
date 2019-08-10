<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<!--<script type="text/javascript" src="../js/rating.js"></script>-->
<script type="text/javascript" src="../js/codigo_interno.js"></script>
<!--<link rel="stylesheet" type="text/css" href="../css/rating.css" />-->

<?php session_start();
if (isset($_REQUEST['nom'])) {
$nom = $_REQUEST['nom'];
} else {
$nom = "";
}

if (isset($_REQUEST['vin'])) {
$vin = $_REQUEST['vin'];
} else {
$vin = "";
}

if (isset($_REQUEST['doc_est'])) {
$doc_est = $_REQUEST['doc_est'];
} else {
$doc_est = "";
}
 ?>
	<script type="text/javascript" src="../js/codigo.js"></script>

      <div class="row" id="respuestaX">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
           <div class="form-group">
              <label for="user">Estudiante</label>
             <input type="text" id="" value="<?php echo $nom; ?>" class="form-control" readonly="readonly">
             <input type="hidden" id="id_vin" name="" value="<?php echo $vin; ?>" >
             <input type="hidden" id="doc_est" name="" value="<?php echo $doc_est; ?>" >
            </div>
              <div id="resultadox">
              </div>  
             <div class="form-group">
              <label for="user">Fecha Término vinculacion </label>
             <input type="date" id="fecha_ter_vin" name="" value="<?php echo date('Y-m-d'); ?>" class="form-control">
            </div>
              <div id="resultadox">
              </div>  
               <div class="form-group">
              <label for="user">Valoración (Mínimo 1, Máximo 5)</label>


         <input type="number" id="val_vin" name="" placeholder="1-5" min="1" max="5" 
         class="form-control" value="0">
            </div>
              <div id="resultadox">
              </div>  
           
             <div class="form-group">
              <label for="user">Observación</label>
             <textarea class="form-control" id="obs_vin" placeholder="Observación"></textarea>
            </div>
              <div id="resultadox">
              </div>  
            <div class="form-group">
         
              <input type="submit" name="login" id="btn-reg-vin" value="Registrar" class="btn btn-success"> 
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button> 
             
            </div>

            <br>
             <div id="result">
             
             </div>  
        
          </form>
        </div>
      </div>