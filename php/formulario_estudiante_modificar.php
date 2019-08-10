<script type="text/javascript" src="../js/codigo.js"></script>
	<?php 
  $_POST['documento']="";
  $documento=$_GET['documento'];
  require("conexion.php");
  $result = mysqli_query($myconex, "select * from tbestudiante where documento = '$documento'");

  while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  
    $nom_estudiante=$fila["nom_estudiante"];
    $ape_estudiante=$fila["ape_estudiante"];
    $fecha_nac=$fila["fecha_nac"];  
    $sexo=$fila["sexo"];  
    $rh=$fila["rh"];
    $tel_estudiante=$fila["tel_estudiante"];
    $dir_estudiante=$fila["dir_estudiante"];
    $nom_padre_estudiante=$fila["nom_padre_estudiante"];
    $tel_padre_estudiante=$fila["tel_padre_estudiante"];
    $nom_madre_estudiante=$fila["nom_madre_estudiante"];
    $tel_madre_estudiante=$fila["tel_madre_estudiante"];
    $estado_estudiante=$fila["estado_estudiante"];
    $observacion_estudiante=$fila["observacion_estudiante"];
    $foto=$fila["foto"];
    $num_act=$fila["num_act"];
}
mysqli_free_result($result);
 
// Cerrar la conexión
mysqli_close($myconex);

?>



<div class="container" id="resultado">
 <div id="izq"> <br><input type="hidden" id="control" value="0">
<?php if($foto==1){ $foto=$documento.".jpg";}else{$foto='sinfoto.jpg';}
    echo "<img id='imagen' src='../fotografias/$foto' class='img-thumbnail' width='150'>";?>
     
  <div><span class="btn btn-default btn-file bg-info">
    Cambiar Fotografia <input type="file" id="fileToUpload">
  </span>
<div id="mensaje_foto" class="errores">Error en la fotografia, solo Formato JPG</div>
</div>
    <p class="centro"><?php require('edad.php') ?></p>
  </div>

      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h4><p class="text-center">Estudiante <?php echo $nom_estudiante." ".$ape_estudiante ?></p></h4>
             <div class="form-group">

              <input type="text" id="num_act" value="<?php echo $num_act ?> ">


              <label for="user">Nombres</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" value="<?php echo $nom_estudiante ?> ">
              <div id="mensaje1" class="errores">Ingrese Nombres</div>
            </div>

            <div class="form-group">
              <label for="user">Apellidos</label>
              <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos" value="<?php echo $ape_estudiante ?> " >
              <div id="mensaje2" class="errores">Ingrese Apellidos</div>
            </div>

            <div class="form-group">
              <label for="user">Documento de Identidad</label>
              <input type="text" name="documento" id="documento" class="form-control" placeholder="Documento" value="<?php echo $documento ?>">
              <div id="mensaje3" class="errores">Ingrese Número de Documento</div>
            </div>

            <div class="form-group">
              <label for="user">Fecha de Nacimiento</label>
              <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" value="<?php echo $fecha_nac ?>">
              <div id="mensaje" class="errores">Ingrese Fecha de Nacimiento</div>
            </div>

            <div class="form-group">
                                  <label for="Usuario" class="textos" >Sexo</label>
                                              <!-- <div class="selector-pais">-->
                                                 
                                                  <!--<select class="form-control" id="sexo"></select>-->

                                                  <?php  require('conexion.php');
                                                    $consulta="select * from sexo";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="sexo" id="sexo" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['id_sexo']==$sexo){
                                                        ?>
                                                        <option value="<?php echo $row['id_sexo']; ?>" selected="selected" ><?php echo $row['sexo']?></option>
                                                        <?php } else {
                                                        ?>
                                                        <option value="<?php echo $row['id_sexo']?>">
                                                        <?php echo $row['sexo']?></option>  
                                                        <?php
                                                          }
                                                        }      
                                                          ?>
                                                            </select>
                                                  
                                             <!-- </div>-->
                 					<div id="mensaje" class="errores">Seleccione Sexo</div>
                              </div>
							
				<div class="form-group">
		                <label for="Usuario" class="textos" >Grupo Sanguíneo / RH</label>
		                      <?php  require('conexion.php');
                                                    $consulta="select * from rh";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="rh" id="rh" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['id_rh']==$rh){
                                                        ?>
                                                        <option value="<?php echo $row['id_rh']; ?>" selected="selected" ><?php echo $row['grupo']?></option>
                                                        <?php } else {
                                                        ?>
                                                        <option value="<?php echo $row['id_rh']?>">
                                                        <?php echo $row['grupo']?></option>  
                                                        <?php
                                                          }
                                                        }      
                                                          ?>
                                                            </select>
                </div>
            <div class="form-group">
              <label for="pass">Teléfono Casa</label>
              <input type="text" name="tel" id="tel" class="form-control" placeholder="Télefono Casa" value="<?php echo $tel_estudiante ?>">
              <div id="mensaje4" class="errores">Ingrese Télefono Casa</div>
            </div>

            <div class="form-group">
              <label for="pass">Dirección Casa</label>
              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección Casa" value="<?php echo $dir_estudiante ?>">
              <div id="mensaje2" class="errores">Ingrese Dirección Casa</div>
            </div>
            <div class="form-group">
              <label for="pass">Nombres Padre </label>
              <input type="text" name="nom_padre" id="nom_padre" class="form-control" placeholder="Nombres Padre" value="<?php echo $nom_padre_estudiante ?>">
              <div id="mensaje2" class="errores">Ingrese Nombres Padre</div>
            </div>
            <div class="form-group">
              <label for="pass">Tel/Cel Padre de Familia</label>
              <input type="text" name="tel_padre" id="tel_padre" class="form-control" placeholder="Tel/Cel Padre de Familia" value="<?php echo $tel_padre_estudiante ?>">
              <div id="mensaje2" class="errores">Ingrese Tel/Cel Padre de Familia</div>
            </div>
            <div class="form-group">
              <label for="pass">Nombres Madre</label>
              <input type="text" name="nom_madre" id="nom_madre" class="form-control" placeholder="Nombres Madre" value="<?php echo $nom_madre_estudiante ?>">
              <div id="mensaje2" class="errores">Nombres Madre</div>
            </div>
            <div class="form-group">
              <label for="pass">Tel/Cel Madre</label>
              <input type="text" name="tel_madre" id="tel_madre" class="form-control" placeholder="Tel/Cel Madre de Familia" value="<?php echo $tel_madre_estudiante ?>">
              <div id="mensaje2" class="errores">Ingrese Tel/Cel Madre de Familia</div>
            </div>
             
             <div class="form-group">
              <label for="pass">Estado Estudiante</label>
              <?php  require('conexion.php');
                                                    $consulta="select * from estado";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="estado" id="estado" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['id_estado']==$estado_estudiante){
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
                                              

             <div class="form-group">
              <label for="pass">ObservaciónX</label>
              <textarea id="observacion" class="form-control" placeholder="Observación"><?php echo $observacion_estudiante; ?></textarea>
            </div>
            <br>
            <div class="form-group">
            <!--<button name="login" id="login" value="Login" class="btn btn-success"></button>-->
              <input type="submit" name="login1" id="login1" value="Actualizar" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
            </div>

            <br>
          <!--  <div id="resultado">HH</div>-->
          </form>
        </div>
      </div>
    </div>
<?php 



?>
 <!--<script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
  </html>
  <script type="text/javascript" src="../js/script.js"></script>