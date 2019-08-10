<?php session_start(); ?>
<script type="text/javascript" src="../js/codigo.js"></script>
  <?php 
  require("conexion.php");

if (isset($_REQUEST['id_sol'])) {
$id_sol = $_REQUEST['id_sol'];
} else {
$id_sol = "";
}

  $result = mysqli_query($myconex, "select * from solicitud where id_solicitud = '$id_sol'");

  while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
    $nit_emp=$fila["nit_emp"];
    $id_titulo=$fila["id_titulo"];
    $informacion=$fila["informacion"];  
    $id_horario=$fila["id_horario"];
    $id_estado=$fila["id_estado"];
    $fecha_sol=$fila["fecha_sol"];
    $estado_sol=$fila["estado_sol"];
   
}
//mysqli_free_result($result);
// Cerrar la conexión
mysqli_close($myconex);
?>
<input type="hidden" id="id_solicitud" value="<?php echo $id_sol;?> ">
<div id='resultado'>
<div class="container" >
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h3><p class="text-center">Solicitud Egresado </p></h3>
             <div class="form-group">
              <label for="user">Nit Empresa/Entidad</label>
              <input type="text" id="nit_emp" class="form-control" placeholder="00000000-0" value="<?php echo $nit_emp;?> ">
              <div id="mensaje1" class="errores">Ingrese Nit Empresa/Entidad</div>
            </div>

              <div class="form-group">
                                            <label for="Usuario" class="textos" >Titulacion Egresado</label>
                                                         <?php  require('conexion.php');
                                                    $consulta="select * from titulo";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="sexo" id="id_titulo" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['id_titulo']==$id_titulo){
                                                        ?>
                                                        <option value="<?php echo $row['id_titulo']; ?>" selected="selected" ><?php echo $row['des_titulo']?></option>
                                                        <?php } else {
                                                        ?>
                                                        <option value="<?php echo $row['id_titulo']?>">
                                                        <?php echo $row['des_titulo']?></option>  
                                                        <?php
                                                          }
                                                        }      
                                                          ?>
                                                            </select> 
                                    <div id="mensaje" class="errores">Seleccione Titulo del egresado</div>
                                        </div>

             <div class="form-group">
              <label for="pass">Información Adicional Cargo</label>
              <textarea class="form-control" id="informacion"><?php echo $informacion ?></textarea>
              
                    <div class="form-group">
                      <label for="Usuario" class="textos" >Horario</label>
                         <?php  require('conexion.php');
                                                    $consulta="select * from horario";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="sexo" id="id_horario" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['id_horario']==$id_horario){
                                                        ?>
                                                        <option value="<?php echo $row['id_horario']; ?>" selected="selected" ><?php echo $row['des_horario']?></option>
                                                        <?php } else {
                                                        ?>
                                                        <option value="<?php echo $row['id_horario']?>">
                                                        <?php echo $row['des_horario']?></option>  
                                                        <?php
                                                          }
                                                        }      
                                                          ?>
                                                            </select> 

                                    <div id="mensaje" class="errores">Seleccione Sexo</div>
                                        </div>

                                         <div class="form-group">
                      <label for="Usuario" class="textos" >Estado</label>
                         <?php  require('conexion.php');
                                                    $consulta="select * from estado where id_estado BETWEEN 0 AND 1";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select  id="id_estado" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['id_estado']==$estado_sol){
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

                                    <div id="mensaje" class="errores">Seleccione Sexo</div>
                                        </div>

              <div id="mensaje4" class="errores">Ingrese Télefono Casa</div>
            </div>
           
          
            <br>
            <div class="form-group">
              <input type="submit" name="login" id="btn-act-sol" value="Registrar" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
            </div>

            <br>
         
          </form>
        </div>
      </div>
    </div>
    </div>

  <script type="text/javascript" src="../js/script.js"></script>