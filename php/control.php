<?php
session_start();
?>
<?php
require('conexion.php');
$fecha_respuesta=date('Y-m-d');
//mysql_select_db($database_myconex, $myconex);
$usuario=$_POST['usuario'];
$contra=$_POST['contra'];
//$contra=md5($_POST['contra']);
//echo"llega: $usuario $contra";
//$consulta=" ";
//$resultado=mysqli_query($myconex,"select * from usuarios where doc_usuario='$usuario' and contrasena='$contra'");



if ($result = mysqli_query($myconex, "select * from usuario where doc_usuario='$usuario' and contrasena='$contra'")) {

    /* determinar el número de filas del resultado */
    
    if ($row_cnt = mysqli_num_rows($result)) {

    	// header ("Location: menu.php");
    	 //printf("1");
    	echo"<a href='php/menu.php' class='btn btn-success'>Continuar</a>";

			$fila = mysqli_fetch_row($result);


		//	echo $fila[0]; // 42
		//	echo $fila[1]; // el valor de email
		 
    }else{
		 printf("Usuario No Registrado");
      //  header ("Location: index.html");
    }
    /* cerrar el resulset */
    mysqli_free_result($result);

}

/* cerrar la conexión */
mysqli_close($myconex);


//$sql=mysqi_query($consulta,$myconex);
//$cantidad = mysqli_num_rows($sql); 
/*if($resultado)
{ 
while ($row = mysqli_fetch_row($sql)) {
$_SESSION['id_usuario']=$row[0];
$_SESSION['usuario_nombres']=$row[1]." ".$row[2];
$_SESSION['control']=1;       
header ("Location: menu.php");               
            }     
}
else
{ 
   //  header ("Location: ../index.html"); 
   echo"Usuario No encontrado ";

} */


?>