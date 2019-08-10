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
                                  <label for="Usuario" class="textos" >Seleccione Rango Agente</label>
                                               <div class="selector-pais">
                                                 
                                                  <select class="form-control" id="rango"></select>
                                                  <script type="text/javascript">
                                                      $(document).ready(function() {
                                                      	   $.ajax({
                                                                  type: "POST",
                                                                  url: "../php/rango.php",
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
            
              <input type="submit" name="login" id="login" value="Registrar Egresado" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
            </div>

            <br>
          
          </form>
        </div>
      </div>
    </div>

  <script type="text/javascript" src="../js/script.js"></script>