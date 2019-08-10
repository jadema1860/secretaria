<?php
session_start();
if (!isset($_SESSION['control'])) {
 header("Location: ../index.html");
 exit;
}
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
				<input type="text" id="nom_ape_est" class="form-control" name="" placeholder="Buscar Estudiante">
       
       <?php  require('conexion.php');
                                                    $consulta="select * from estado";
                                                    $sql=mysqli_query($myconex,$consulta);
                                                    ?>
                                                        <select name="estado" id="estado_est" class="form-control">
                                                        <?php while($row = mysqli_fetch_array($sql, MYSQLI_ASSOC))
                                                        {
                                                        if($row['id_estado']==1){
                                                        ?>
                                                       <option value="<?php echo $row['id_estado']; ?>" selected="selected" ><?php echo $row['estado']?></option>-->
                                                        <?php } else {
                                                        ?>
                                                        <option value="<?php echo $row['id_estado']?>">
                                                        <?php echo $row['estado']?></option>  
                                                        <?php
                                                          }
                                                        }      
                                                          ?>
                                                            </select>                   
                                         
                          

				 <button class="btn btn-default" type="button" id="btn_bus_est_est">Buscar</button>
				</div>	

			</form>
			
		</nav>


<!--</header>
	<div class="table-responsive">-->

<div id="consultax"></div>

		<div class="container" id="res_tabla">
	     
		</div>
