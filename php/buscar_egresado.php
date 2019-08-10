<?php
session_start();
/*if (!isset($_SESSION['control'])) {
 header("Location: ../index.html");
 exit;*/
//}
?>

	<script src="../js/codigo.js"></script>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapsed" data-target="#navbar-1"><span class="sr-only">Menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>	
				</button>
				<!--<a href="#" class="navbar-brand">IEM</a>-->
			</div>
			<div class="collapsed navbar-collapse" id="navbar-1">

				<form action="" class="navbar-form navbar-left" rol="search">
				<div class="form-group">
				

       
       <?php  require('conexion.php');
                                                    $consulta="select * from rango";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="estado" id="desRango" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                       {
                                                        ?>
                                                   
                                                        <option value="<?php echo $row['desRango']?>">
                                                        <?php echo $row['desRango']?> </option>  
                                                        <?php 
                                                          }
                                                      //  }     
                                                          ?>
                                                         </select>                
                                         
                          

				 <button class="btn btn-info" type="button" id="btn_bus_pro">Buscar por Rango</button>
				</div>	

			</form>
			
		</nav>

<div id="consultax"></div>

		<div class="container" id="res_tabla">
	     
		</div>
