<div class="container" id="resultado">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h3><p class="text-center">Agente Nuevo</p></h3>
             <div class="form-group">
              <label for="user">Nombres y Apellidos</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres">
              <div id="mensaje1" class="errores">Ingrese Nombres</div>
            </div>

           
            <div class="form-group">
              <label for="user">Documento de Identidad</label>
              <input type="text" name="documento" id="documento" class="form-control" placeholder="Documento">
              <div id="mensaje3" class="errores">Ingrese Número de Documento</div>
            </div>

            

            <div class="form-group">
                                  <label for="Usuario" class="textos" >Sexo</label>
                                               <div class="selector-pais">
                                                 
                                                  <select class="form-control" id="sexo"></select>
                                                  <script type="text/javascript">
                                                      $(document).ready(function() {
                                                      	   $.ajax({
                                                                  type: "POST",
                                                                  url: "../php/sexo.php",
                                                                  success: function(response)
                                                                  {
                                                                   $('.selector-pais select').html(response).fadeIn();
                                                                  }
                                                          });

                                                      });
                                                  </script>
                                              </div>
                 					<div id="mensaje" class="errores">Seleccione Sexo</div>
                              </div>
							
			
            <br>
            <div class="form-group">
            <!--<button name="login" id="login" value="Login" class="btn btn-success"></button>-->
              <input type="submit" name="login" id="login" value="Registrar" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
            </div>

            <br>
          <!--  <div id="resultado">HH</div>-->
          </form>
        </div>
      </div>
    </div>

 <!--<script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </html>-->
  <script type="text/javascript" src="../js/script.js"></script>