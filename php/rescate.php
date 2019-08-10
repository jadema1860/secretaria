<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
require('conexion.php');
//


if (isset($_REQUEST['correo'])) {
$correo = $_REQUEST['correo'];
} else {
$correo = "";
}

if (isset($_REQUEST['tipo_usuario'])) {
$tipo_usuario = $_REQUEST['tipo_usuario'];
} else {
$tipo_usuario = "";
}
$control_correo="";

//echo "$tipo_usuario";

switch ($tipo_usuario) {
  case '0':
    $sql = "SELECT nom_est, ape_est, doc_est, contrasena 
  FROM estudiante 
  WHERE correo_est ='$correo' ";
  $result = mysqli_query($myconex, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $nom_usu = $data["nom_est"];
    $ape_usu = $data["ape_est"];
    $doc_usu = $data["doc_est"];
    $contrasena_usu=$data["contrasena"];
    $nom_completo=$nom_usu." ".$ape_usu;
    $control_correo=true;
}
    break;

    case '1':
     $sql = "SELECT nom_emp, nom_contacto, nit_emp, contrasena 
  FROM empresa
  WHERE correo_emp ='$correo'
  and estado=1";
  $result = mysqli_query($myconex, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $nom_usu = $data["nom_emp"];
    $ape_usu = $data["nom_contacto"];
    $doc_usu = "a".$data["nit_emp"];
    $contrasena_usu=$data["contrasena"];
    $nom_completo=$ape_usu;
    $control_correo=true;
}
  
  break;
    case '2':
  $sql = "SELECT nom_usu, ape_usu, doc_usu, contrasena_usu 
  FROM usuarios 
  WHERE correo_usu ='$correo'
  and id_estado=1";
  $result = mysqli_query($myconex, $sql);
  $num_row = mysqli_num_rows($result);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result);
    $nom_usu = $data["nom_usu"];
    $ape_usu = $data["ape_usu"];
    $doc_usu = $data["doc_usu"];
    $contrasena_usu=$data["contrasena_usu"];
    $nom_completo=$nom_usu." ".$ape_usu;

    $control_correo=true;
}
break;
}


if($control_correo){
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
   // $mail->SMTPDebug = 2;  
    $mail->isSMTP();                              // Enable verbose debug output
    //$mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'desarrollo@escuelasaludsurcolombiana.com';                 // SMTP username
    $mail->Password = 'desarrollo1820';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('desarrollo@escuelasaludsurcolombiana.com', 'Recuperacion acceso ESSC');
    $mail->addAddress($correo, $nom_completo);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Recuperacion de contraseña Sistema de Egresados ESSC';
    $mail->Body    = 'Hola <b>'.$nom_completo.'</b>, La Escuela de Salud Sur Colombiana, le permite realizar la recuperación de su contraseña de acceso a la aplicacion de egresados, sus datos son:<br> Usuario es: <b>'.$doc_usu.'</b>  <br>Contraseña es: <b>'. $contrasena_usu.'</b><br>
    Lo invitamos a cambiar tu contraseña mas adelante. </b>';
    $mail->AltBody = 'Escuela de Salud Sur Colombiana';
    $mail->setLanguage('es', '/optional/path/to/language/directory/');

    $mail->send();
    //echo 'Message has been sent';
    echo 1;
} catch (Exception $e) {
   // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    echo 0;
}

// To load the French version

//finaliza correo


}
//echo "correo buscado: $correo";
?>
   
