<?php session_start();
 //$id_lectivo=$_SESSION['id_lectivo'];
 ?>
	<script type="text/javascript" src="../js/codigo.js"></script>

<div class="container" id="resultado">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h3><p class="text-center">Crear Horarios:<div id="nuevo_curso"></div></p></h3>

<div class="form-group">
              <label for="user">Horario</label>
             <input type="text" id="nom_horario" name="" placeholder="8:00-12:00" class="form-control">
             <div id="mensaje1" class="errores">Ingrese Horario</div>
            </div>
            
            <div id="resultadox">
             </div>  

           
           
            <div class="form-group">
            <!--<button name="login" id="login" value="Login" class="btn btn-success"></button>-->
              <input type="submit" name="login" id="btn-reg-hor" value="Registrar" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
              <input type="submit" name="cancelar" id="btn-ver-hor" value="Consultar horarios disponibles" class="btn btn-default">
            </div>

            <br>
             <div id="result">
             
             </div>  
            </form>
        </div>
      </div>
    </div>

  <script type="text/javascript" src="../js/script.js"></script>