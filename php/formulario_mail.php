<?php session_start();
 //$id_lectivo=$_SESSION['id_lectivo'];
 ?>
	<script type="text/javascript" src="../js/codigo.js"></script>

<div class="container" id="resultado">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h3><p class="text-center">Envio correo electrónico</p></h3>



            <div class="form-group">
		                <label for="Usuario" class="textos" >Título </label>
		                       <select class="form-control" id="titulo">
		                         	<?php require('titulos.php'); ?>
                               </select>
                </div>

           <div class="form-group">
             <label for="user">Asunto Mensaje</label>
             <input type="text" id="asunto" name="" placeholder="Asunto" class="form-control">
             <div id="mensaje2" class="errores">Asunto mensaje</div>
           </div>
            
           <div class="form-group">
             <label for="user">Mensaje</label>
             <textarea rows="3" cols="8" id="mensaje" name="" placeholder="Mensaje" class="form-control"></textarea>
             <div id="mensaje3" class="errores">Escriba su Mensaje</div>
           </div>
            <div id="resultadox">
             </div>  

           <div id="resultado">     
                  
           </div>
           
            <div class="form-group">
          
              <input type="submit" name="" id="btn-env-mail" value="Enviar" class="btn btn-success"> 
              <!--<input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">-->
             
            </div>

            <br>
             <div id="result">
             
             </div>  
            </form>
        </div>
      </div>
    </div>

  <script type="text/javascript" src="../js/script.js"></script>