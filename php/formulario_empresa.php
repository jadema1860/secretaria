<div class="container" id="resultado">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h3><p class="text-center">Empresa/Entidad </p></h3>
             <div class="form-group">
              <label for="user">Nit Empresa/Entidad</label>
              <input type="text" id="nit_empresa" class="form-control" placeholder="00000000-0">
              <div id="mensaje1" class="errores">Ingrese Nit Empresa/Entidad</div>
            </div>

            <div class="form-group">
              <label for="user">Razon Social</label>
              <input type="text" id="razon" class="form-control" placeholder="Razon Social Empresa/Entidad">
              <div id="mensaje2" class="errores">Ingrese Razon Social</div>
            </div>

            <div class="form-group">
              <label for="pass">Nombres y Apellidos Conctacto</label>
              <input type="text" id="nom_contacto" class="form-control" placeholder=" Nombres y Apellidos Contacto">
              <div id="mensaje4" class="errores">Ingrese Nombres y Apellidos Contacto</div>
            </div>  

           <div class="form-group">
                                            <label for="Usuario" class="textos" >Tipo Empresa/Entidad</label>
                                                         <?php  require('conexion.php');
                                                              $consulta="select * from tipo_empresa";
                                                              $sql=mysqli_query($myconex,$consulta);
                                                              ?>
                                                                  <select id="tipo_empresa" class="form-control">
                                      <option>Seleccionar Tipo Empresa/Entidad</option>
                                                                  <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                                  { ?>
                                      <option value="<?php echo $row['id_tipo_empresa']?>"><?php echo $row['des_tipo_empresa']?></option>  
                                                                  <?php
                                                                    }                                                            
                                                                    ?>
                                                                      </select>

                                    <div id="mensaje" class="errores">Seleccione Sexo</div>
                                        </div>

            <div class="form-group">
              <label for="user">Direccion Entidad/Empresa</label>
              <input type="text" id="dir_empresa" class="form-control" placeholder="Direccion Entidad/Empresa">
              <div id="mensaje3" class="errores">Ingrese Direccion Empreda/Entidad</div>
            </div>

           

           
							
             <div class="form-group">
              <label for="pass">Correo Institucional</label>
              <input type="text" id="correo_empresa" class="form-control" placeholder="correo@operador.com">
              <div id="mensaje4" class="errores">Ingrese Correo Institucinal</div>
            </div>                  
              
				
            <div class="form-group">
              <label for="pass">Telefono/Celular Institucional</label>
              <input type="text" id="tel_empresa" class="form-control" placeholder="Tel/Cel">
              <div id="mensaje4" class="errores">Ingrese Télefono Casa</div>
            </div>                  
             
          
            <br>
            <div class="form-group">

              <input type="submit" name="login" id="btn-reg-emp" value="Registrar" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
            </div>

            <br>
          
          </form>
        </div>
      </div>
    </div>
  <script type="text/javascript" src="../js/script.js"></script>