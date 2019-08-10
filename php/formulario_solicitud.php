<?php session_start(); ?>
<?php
if($_SESSION["tipo_olinea"]=="Empresa"){
echo"<script>
//document.getElementById('nit_emp').readOnly = true;
  </script>";
  $nit=$_SESSION["nit_emp"];}else{$nit="";}

?>

<div class="container" id="resultado">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h3><p class="text-center">Solicitud Egresado </p></h3>
             <div class="form-group">
              <label for="user">Nit Empresa/Entidad</label>
              <input type="text" id="nit_emp" class="form-control" placeholder="00000000-0" value="<?php echo $nit; ?>">
              <div id="mensaje1" class="errores">Ingrese Nit Empresa/Entidad</div>
            </div>

              <div class="form-group">
                                            <label for="Usuario" class="textos" >Titulacion Egresado</label>
                                                         <?php  require('conexion.php');
                                                              $consulta="select * from titulo";
                                                              $sql=mysqli_query($myconex,$consulta);
                                                              ?>
                                                                  <select id="id_titulo" class="form-control">
                                      <option value="0">Seleccionar Titulacion Egresado</option>
                                                                  <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                                  { ?>
                                      <option value="<?php echo $row['id_titulo']?>"><?php echo $row['des_titulo']?></option>  
                                                                  <?php
                                                                    }                                                            
                                                                    ?>
                                                                      </select>

                                    <div id="mensaje2" class="errores">Seleccione Titulo de Egresado</div>
                                        </div>

             <div class="form-group">
              <label for="pass">Información Adicional Cargo</label>
              <textarea class="form-control" id="observacion_sol" placeholder="Una breve descripcion del perfil requerido"></textarea>
               <div id="mensaje3" class="errores">Ingrese una breve descripcion del perfil requerido</div>
              </div>
              
                    <div class="form-group">
                      <label for="Usuario" class="textos" >Seleccionar el Horario</label>
                       <?php  require('conexion.php');
                         $consulta="select * from horario where estado=1 ";
                         $sql=mysqli_query($myconex,$consulta);
                       ?>
                              <select id="id_horario" class="form-control">
                                     <!--<option value="0">Seleccionar el Horario</option>-->
                                                                  <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                                  { ?>
                                      <option value="<?php echo $row['id_horario']?>"><?php echo $row['des_horario']?></option>  
                                                                  <?php
                                                                    }                                                            
                                                                    ?>
                                                                      </select>

                    <div id="mensaje4" class="errores">Seleccione Horario de trabajo</div>
                    </div>
            <div class="form-group">
              <label for="user">Cerrar Vacante en la siguiente fecha </label>
              <input type="date" id="fecha_act_hasta" class="form-control" value="<?php echo date('Y-m-d'); ?>">
              <div id="mensaje1" class="errores">Ingrese Nit Empresa/Entidad</div>
            </div>
          
          <div class="form-group">
                      <label for="Usuario" class="textos" >Número de candidatos a recibir</label>
                      
                           <select id="num_aspirantes" class="form-control">
                             <option value="3">3</option>
                             <option value="5">5</option>
                             <option value="8">8</option>
                           </select>

                    <div id="mensaje4" class="errores">Número de candidatos a recibir</div>
                    </div>
          
            <br>
            <div class="form-group">
            <!--<button name="login" id="login" value="Login" class="btn btn-success"></button>-->
              <input type="submit" name="login" id="login5" value="Registrar" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
            </div>

            <br>
   
          </form>
        </div>
      </div>
    </div>


  <script type="text/javascript" src="../js/script.js"></script>