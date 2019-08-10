<?php session_start();
if (empty($_SESSION["idAgente"])) {
  $_POST['idAgente']="";
  $idAgente=$_REQUEST['idAgente'];
  }else{
$idAgente=$_SESSION["idAgente"];    
  }
 ?>
<script type="text/javascript" src="../js/codigo.js"></script>

	<?php 
  
  require("conexion.php");
  $result = mysqli_query($myconex, "select * from agente where idAgente = '$idAgente'");

  while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $nomAgente=$fila["nomAgente"];
    $Rango=$fila["Rango"];
 
}

mysqli_free_result($result);
mysqli_close($myconex);

?>

<div class="container" id="resultado">


      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <form method="post" id="formulario">
            <h4><p class="text-center">Agente <?php echo $nomAgente ?></p></h4>
             <div class="form-group">

               <input type="hidden" id="idAgente" value="<?php echo $idAgente ?> ">


              <label for="user">Nombres</label>
              <input type="text" name="nombre" id="nomAgente" class="form-control" placeholder="Nombres" value="<?php echo $nomAgente ?> ">
              <div id="mensaje1" class="errores">Ingrese Nombres</div>
            </div>

            

           

          

            <div class="form-group">
                                  <label for="Usuario" class="textos" >Rango</label>
                                             
                                                  <?php  require('conexion.php');
                                                    $consulta="select * from rango";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="sexo" id="genero" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['desRango']==$Rango){
                                                        ?>
                                                        <option value="<?php echo $row['desRango']; ?>" selected="selected" ><?php echo $row['desRango']?></option>
                                                        <?php } else {
                                                        ?>
                                                        <option value="<?php echo $row['desRango']?>">
                                                        <?php echo $row['desRango']?></option>  
                                                        <?php
                                                          }
                                                        }      
                                                          ?>
                                                            </select>
                                                  
                                             <!-- </div>-->
                 					<div id="mensaje" class="errores">Seleccione Sexo</div>
                              </div>
							
				
           
            
            

 
            <br>
            <div class="form-group">
            
              <input type="submit" name="login1" id="login1" value="Actualizar" class="btn btn-success"> 
              <input type="submit" name="cancelar" id="btn-cerrar" value="Cancelar" class="btn btn-danger">
            </div>

            <br>
          </form>
        </div>
      </div>
    </div>
<?php 



?>
  </html>
  <script type="text/javascript" src="../js/script.js"></script>