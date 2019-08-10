<?php
session_start();
require('conexion.php');

$user="";
$pass="";
//$user="c1086000";
//$pass="1086000";
//$rest = substr($user, 2);
//echo " a vers: $rest";

if(isset($_POST["user"]) && isset($_POST["pass"])){
//if($user!="" && $pass!=""){
 $user = mysqli_real_escape_string($myconex, $_POST["user"]);
 $pass = mysqli_real_escape_string($myconex, $_POST["pass"]);//(user='$user' OR email='$user') AND pass='$pass'
 
 

switch ($user[0]) { //administrador
  case 'c':
   $datam = explode("c", $user);  
 if($datam[0]==0){
  $nuser=$datam[1];

  $sql = "SELECT nom_usu, ape_usu, doc_usu FROM usuarios WHERE contrasena_usu ='$pass'
  and doc_usu ='$nuser'
  and id_estado=1";
  $result = mysqli_query($myconex, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["control"] =true;
    //." ".$data["ape_usuario"]
    $data_nombre = explode(" ", $data["nom_usu"]);
    $_SESSION["usuario_olinea"] =$data_nombre[0] ;
    $_SESSION["nom_completo"]= $data["nom_usu"]." ".$data["ape_usu"];
    $_SESSION["tipo_olinea"]="Administrador";
    $_SESSION["doc_usu"] = $data["doc_usu"];
    echo "1";
  } else {
   // echo "error";  
  }
}
    break;  
    case 'a':
     $datam = explode("a", $user);
       if($datam[0]==0){
       $nuser=$datam[1];
//empresa
  $sql = "SELECT nom_contacto, id_emp, nit_emp FROM empresa 
  WHERE nit_emp='$nuser'
  and contrasena ='$pass'
  and estado=1";
  $result = mysqli_query($myconex, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["control"] =true;
    $data_nombre = explode(" ", $data["nom_contacto"]);
    $_SESSION["usuario_olinea"] =$data_nombre[0] ;
    $_SESSION["tipo_olinea"]="Empresa";
    $_SESSION["nit_emp"] = $data["nit_emp"];
    $_SESSION["nom_completo"] = $data["nom_contacto"];
    echo "1";
  } else {
    echo "0";  
  }
}
  break;

  default:
  $sql = "SELECT nom_est, ape_est, doc_est, foto FROM estudiante WHERE doc_est ='$user'
  and contrasena ='$pass'";
 // and estado_est=1
  $result = mysqli_query($myconex, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $_SESSION["control"] =true;
    $data_nombre = explode(" ", $data["nom_est"]);
    $_SESSION["usuario_olinea"] =$data_nombre[0] ;
    $_SESSION["nom_completo"]= $data["nom_est"]." ".$data["ape_est"];
    $_SESSION["doc_est"] = $data["doc_est"];
    $_SESSION["tipo_olinea"]="Estudiante";
    $_SESSION["foto"]=$data["foto"];
   
    echo "1";
  } else {
    echo "3error";  
  }
    break;
}

} else {
  echo "4error";
}

?>
