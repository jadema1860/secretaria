

<div class="container" id="resultado">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h3><p class="text-center">Administrativo Nuevo</p></h3>
             <div class="form-group">
              <label for="user">Nombres</label>
              <input type="text" id="nom_admin" class="form-control" placeholder="Nombres Administrativo">
              <div id="mensaje1" class="errores">Ingrese Nombres</div>
            </div>

            <div class="form-group">
              <label for="user">Apellidos</label>
              <input type="text" id="ape_admin" class="form-control" placeholder="Apellidos Administrativo">
              <div id="mensaje2" class="errores">Ingrese Apellidos</div>
            </div>

            <div class="form-group">
              <label for="user">Documento de Identidad</label>
              <input type="text" id="doc_admin" class="form-control" placeholder="Documento">
              <div id="mensaje3" class="errores">Ingrese Número de Documento</div>
            </div>

            
         <!--   <div class="form-group">
                                  <label for="Usuario" class="textos" >Privilegios</label>
                                               <?php  //require('conexion.php');
                                                    //$consulta="select * from roles where estado_rol";
                                                    //$sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select id="nivel_admin" class="form-control">
                            <option>Seleccionar Privilegios</option>
                                                        <?php //while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                       // { ?>
                            <option value="<?php// echo $row['id_rol']?>"><?php //echo $row['nom_rol']?></option>  
                                                        <?php
                                                          //}                                                            
                                                          ?>
                                                            </select>

                 					<div id="mensaje" class="errores">Seleccione Sexo</div>
                              </div>-->
							
             <div class="form-group">
              <label for="pass">Correo Administrativo</label>
              <input type="text" id="correo_admin" class="form-control" placeholder="Correo Electrónico">
              <div id="mensaje4" class="errores">Ingrese Correo Administrativo</div>
            </div>                  
              
				
            <div class="form-group">
              <label for="pass">Contraseña</label>
              <input type="password" id="contrasena_admin" class="form-control" placeholder="Contraseña">
              <div id="mensaje5" class="errores">Ingrese Contraseña</div>
            </div>
           
            <br>
            <div class="form-group">
            <!--<button name="login" id="login" value="Login" class="btn btn-success"></button>-->
              <input type="submit" name="login" id="btn-reg-adm" value="Registrar" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
            </div>

            <br>
      
          </form>
        </div>
      </div>
    </div>


  <script type="text/javascript" src="../js/script.js"></script>