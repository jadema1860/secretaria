<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require('conexion.php');

if (isset($_REQUEST['titulo'])) {
    $titulo = $_REQUEST['titulo'];
    } else {
    $titulo = "";
    }

if (isset($_REQUEST['asunto'])) {
    $asunto = $_REQUEST['asunto'];
    } else {
    $asunto = "";
    }

if (isset($_REQUEST['mensaje'])) {
    $mensaje = $_REQUEST['mensaje'];
    } else {
    $mensaje = "";
    }
$mensaje.= " <br>Escuela de Salud Sur Colombiana - www.essc.edu.co";
$inicial="SELECT nom_est, ape_est, correo_est 
FROM estudiante 
WHERE id_titulo = '$titulo' ";

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

    $mail->setFrom('desarrollo@escuelasaludsurcolombiana.com', 'Escuela de Salud Sur Colombiana');
    $mail->isHTML(true); 
    $i=0;
        while ($fila = mysqli_fetch_array($sql_inicial, MYSQLI_ASSOC)) {

                $nom_est=$fila['nom_est'];
                $ape_est=$fila['ape_est'];
                $correo_est=$fila['correo_est'];
                $nom_contacto=$nom_est.' '.$ape_est;
                $mail->addAddress($correo_est, $nom_contacto);    

            try {
                $mail->Subject = $asunto;
                $mail->Body    = $mensaje;
                $mail->AltBody = 'Escuela de Salud Sur Colombiana';
                $mail->send();
               
               // echo 'Message has been sent: '.$correo_est.'<br>';   
                } catch (Exception $e) {
               // echo $correo_est.' <br>Message could not be sent. Mailer Error: ', $mail->ErrorInfo; 
               
                }
                $mail->setLanguage('es', '/optional/path/to/language/directory/');
                $mail->clearAddresses();
                $i++;
        }
        echo $i;
?>