<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require('conexion.php');
/*
if (isset($_REQUEST['nit_empresa'])) {
$nit_empresa = $_REQUEST['nit_empresa'];
} else {
$nit_empresa = "";
}
*/
$inicial="SELECT nom_est, ape_est, correo_est 
FROM estudiante 
WHERE hv = 0 ";

$sql_inicial=mysqli_query($myconex,$inicial);

 $mail = new PHPMailer(true); 

    $mail->isSMTP();                              // Enable verbose debug output
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'desarrollo@escuelasaludsurcolombiana.com';                 // SMTP username
    $mail->Password = 'desarrollo1820';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;       
  // recipient

    $mail->setFrom('desarrollo@escuelasaludsurcolombiana.com', 'Hoja de Vida-Sistema de Egresados-Bolsa de Empleo');
    $mail->isHTML(true); 

        while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {

                $nom_est=$fila['nom_est'];
                $ape_est=$fila['ape_est'];
                $correo_est=$fila['correo_est'];
                $nom_contacto=$nom_est.' '.$ape_est;
                $mail->addAddress($correo_est, $nom_contacto);    

            try {
                $mail->Subject = 'Registro Hoja de Vida '.$nom_contacto;
                $mail->Body    = 'Los gerentes de consultorios, clínicas e instituciones prestadores de servicios en salud, necesitan contar con toda la información posible de sus futuros empleados; por ello es indispensable contar con una hoja de vida completa y actualizada, la cual refleje su perfil profesional; por ello invitamos a todos nuestros egresados a actualizar sus datos de contacto y adjuntar su hoja de vida en formato PDF en nuestra Bolsa de empleo.<br>
                    Ingrese a: <b>www.essc.edu.co</b><br>';
                $mail->AltBody = 'Escuela de Salud Sur Colombiana';
                $mail->send();
                echo 'Message has been sent: '.$correo_est.'<br>';   
                } catch (Exception $e) {
                echo $correo_est.' <br>Message could not be sent. Mailer Error: ', $mail->ErrorInfo; 
                }
                $mail->setLanguage('es', '/optional/path/to/language/directory/');
                $mail->clearAddresses();
        }
?>