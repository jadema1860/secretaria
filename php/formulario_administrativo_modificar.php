<script type="text/javascript" src="../js/codigo.js"></script>
<script type="text/javascript" src="../js/login.js"></script>
	<?php 
 // $_POST['documento']="";
  $doc_usu=$_GET['doc_usu'];
  require("conexion.php");
  $result = mysqli_query($myconex, "select * from usuarios where doc_usu = '$doc_usu'");

  while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  
    $nom_usu=$fila["nom_usu"];
    $ape_usu=$fila["ape_usu"];
    $contrasena_usu=$fila["contrasena_usu"];  
    $correo_usu=$fila["correo_usu"];
    $estado_usu=$fila["id_estado"];
   }
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

?>
<div class="container" id="resultado">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h4><p class="text-center">Administrativo: <?php echo $nom_usu." ".$ape_usu ?></p></h4>
             <div class="form-group">
              <label for="user">Nombres</label>
              <input type="text" name="nombre" id="nom_usu" class="form-control" placeholder="Nombres" value="<?php echo $nom_usu ?> ">
              <div id="mensaje1" class="errores">Ingrese Nombres</div>
            </div>

            <div class="form-group">
              <label for="user">Apellidos</label>
              <input type="text" name="apellido" id="ape_usu" class="form-control" placeholder="Apellidos" value="<?php echo $ape_usu ?> " >
              <div id="mensaje2" class="errores">Ingrese Apellidos</div>
            </div>

            <div class="form-group">
              <label for="user">Documento de Identidad</label>
              <input type="text" name="documento" id="doc_usu" class="form-control" placeholder="Documento" value="<?php echo $doc_usu ?>" readonly="readonly">
              <div id="mensaje3" class="errores">Ingrese Número de Documento</div>
            </div>
               							
			
          <!-- <div class="form-group">
              <label for="pass">Contraseña</label>
              <input type="password" name="tel" id="contrasena_usu" class="form-control" placeholder="Contraseña" value="<?php echo $contrasena_usu ?>">
              <div id="mensaje4" class="errores">Ingrese Contraseña</div>
            </div>-->


             <div class="form-group">
                          <label for="pass" id="btn-contra" class="text-danger" >Cambiar Contraseña</a></label>
                          <div id="contra" class="info">
                            <label for="pass" id="btn-contra" >Nueva Contraseña</a></label>
                            <input type="password"  id="new_con" class="form-control" placeholder="Contraseña: minimo 6 caracteres" >
                            <div id="mensaje4" class="errores">Nueva Contraseña</div>
                          
                          <label for="pass" id="btn-contra" >Repita Contraseña</a></label>
                            <input type="password"  id="new_con_rep" class="form-control" placeholder="Contraseña : minimo 6 caracteres" >
                            <div id="mensaje4" class="errores">Repita Contraseña</div>
                         <br>
                          <input type="submit" name="btn-act-con-doc" id="btn-act-con-doc" value="Actualizar Contraseña" class="btn btn-success"> 
                          <input type="submit" name="cancelar" id="btn-cerrar-con" value="Cancelar" class="btn btn-danger">
                        </div>
                      </div>      


              <div class="form-group">
              <label for="pass">Correo Administrativo</label>
              <input type="text" name="direccion" id="correo_usu" class="form-control" placeholder="Correo Administrativo" value="<?php echo $correo_usu ?>">
              <div id="mensaje2" class="errores">Ingrese Correo Docente</div>
            </div>


             
             <div class="form-group">
              <label for="pass">Estado Administrativo</label>
              <?php  require('conexion.php');
                                                    $consulta="select * from estado where id_estado <=1";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="estado" id="estado_usu" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['id_estado']==$estado_usu){
                                                        ?>
                                                        <option value="<?php echo $row['id_estado']; ?>" selected="selected" ><?php echo $row['estado']?></option>
                                                        <?php } else {
                                                        ?>
                                                        <option value="<?php echo $row['id_estado']?>">
                                                        <?php echo $row['estado']?></option>  
                                                        <?php
                                                          }
                                                        }      
                                                          ?>
                                                            </select>
                   </div>

                                 

            
            <br>
            <div class="form-group">
            <!--<button name="login" id="login" value="Login" class="btn btn-success"></button>-->
              <input type="submit" name="btn-act-adm" id="btn-act-adm" value="Actualizar" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
            </div>

            <br>
         
          </form>
        </div>
      </div>
    </div>
<?php 

?>
