<?php session_start();
require("conexion.php");
$nit_emp="";
//echo $_SESSION["nit_emp"];

if(empty($_SESSION["nit_emp"])){
  if (isset($_REQUEST['id_emp'])) {
  $id_emp = $_REQUEST['id_emp'];
  } else {
  $id_emp = "";
  }
$result = mysqli_query($myconex,"select * from empresa where id_emp = '$id_emp'");
}else{
$nit_emp=$_SESSION["nit_emp"];
$result = mysqli_query($myconex,"select * from empresa where nit_emp = '$nit_emp'");
}

?>
<script type="text/javascript" src="../js/login.js"></script>
<script type="text/javascript" src="../js/codigo.js"></script>
	<?php 
  
 

  while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  
    $nom_emp=$fila["nom_emp"];
    $nom_contacto=$fila["nom_contacto"];
    $tipo_emp=$fila["tipo_emp"];  
    $tel_emp=$fila["tel_emp"];
    $dir_emp=$fila["dir_emp"];
    $correo_emp=$fila["correo_emp"];
    $estado=$fila["estado"];
    $nit_emp=$fila["nit_emp"];
    $id_emp=$fila["id_emp"];
}
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);
?>
<div id="resultadoI">
<input type="hidden" id="id_emp" value="<?php echo $id_emp ?> ">
<div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <div class="form-group">
              <label for="user">Nombre Empresa</label>
              <input type="text" name="nombre" id="nom_emp" class="form-control" placeholder="Nombres" value="<?php echo $nom_emp ?> ">
              <div id="mensaje1" class="errores">Ingrese Nombre Empresa</div>
            </div>

            <div class="form-group">
              <label for="user">Contacto Empresa</label>
              <input type="text" id="nom_contacto" class="form-control" placeholder="Apellidos" value="<?php echo $nom_contacto ?> " >
              <div id="mensaje2" class="errores">Ingrese Nombres y apellidos contacto</div>
            </div>
            <div class="form-group">
                                  <label for="Usuario" class="textos" >Tipo Empresa/Entidad</label>
                                              <?php  require('conexion.php');
                                                    $consulta="select * from tipo_empresa";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="sexo" id="id_tipo_emp" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['id_tipo_empresa']==$tipo_emp){
                                                        ?>
                                                        <option value="<?php echo $row['id_tipo_empresa']; ?>" selected="selected" ><?php echo $row['des_tipo_empresa']?></option>
                                                        <?php } else {
                                                        ?>
                                                        <option value="<?php echo $row['id_tipo_empresa']?>">
                                                        <?php echo $row['des_tipo_empresa']?></option>  
                                                        <?php
                                                          }
                                                        }      
                                                          ?>
                                                            </select>                                                 
                                          
                 					<div id="mensaje" class="errores">Seleccione Tipo Empresa</div>
                              </div>
							
			
            <div class="form-group">
              <label for="pass">Teléfono Contacto</label>
              <input type="text" name="tel" id="tel_emp" class="form-control" placeholder="Télefono Casa" value="<?php echo $tel_emp ?>">
              <div id="mensaje4" class="errores">Ingrese Télefono Empresa</div>
            </div>

              <div class="form-group">
              <label for="pass">Correo Institucional</label>
              <input type="text" name="direccion" id="correo_emp" class="form-control" placeholder="Correo Docente" value="<?php echo $correo_emp ?>">
              <div id="mensaje2" class="errores">Ingrese Correo Institucional</div>
            </div>

            <div class="form-group">
              <label for="pass">Dirección Empresa</label>
              <input type="text" name="direccion" id="dir_emp" class="form-control" placeholder="Dirección Empresa" value="<?php echo $dir_emp ?>">
              <div id="mensaje2" class="errores">Ingrese Dirección Casa</div>
            </div>


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
                          <input type="submit" name="btn-act-con-doc" id="btn-act-con-emp" value="Actualizar Contraseña" class="btn btn-success"> 
                          <input type="submit" name="cancelar" id="btn-cerrar-con" value="Cancelar" class="btn btn-danger">
                        </div>
                      </div>      


             <div class="form-group">
              <label for="pass">Nit Empresa</label>
              <input type="text" name="" id="nit_emp" class="form-control" placeholder="Nit" value="<?php echo $nit_emp ?>" readonly='readonly'>
            </div>       
            <br>
            <div class="form-group">
              <input type="submit" name="login6" id="login6" value="Actualizar Empresa" class="btn btn-success"> 
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <br>  
          </form>
        </div>
      </div>
    </div>
    </div>
  </html>
