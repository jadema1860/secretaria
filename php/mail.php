<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require('conexion.php');

$consulta="select nom_emp, nom_contacto, correo_emp 
from empresa 
where 
id_emp=9
";

$result = mysqli_query($myconex, $consulta);

while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 $nombre=$fila["nom_emp"];
 $correo=$fila["correo_emp"];

$mail = new PHPMailer(true);                 
             // Passing `true` enables exceptions
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
    $mail->setFrom('desarrollo@escuelasaludsurcolombiana.com', 'Bolsa de empleo egresados ESSC');
    $mail->addAddress($correo, $nombre);     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML

    /* $mail->Subject = 'Numero de postulaciones completada, vacante laboral';
    $mail->Body    = 'En el momento hay una empresa que requiere los servicios profesionales de un egresado de la Escuela de Salud Sur Colombiana, por ello te invitamos a que ingrese a nuestro sitio web www.essc.edu.co, en la opcion BOLSA DE EMPLEO para que realices la postulacion a este cargo.<br><br>
       El usuario y contrasena corresponden al numero de documento de identidad (sin puntos, espacios o comas).

    <br><br>
    Por seguridad los invitamos a cambiar su contrase√±a de acceso.</b>';
*/

    $mail->Subject = 'Numero de postulaciones completada, vacante laboral';
    $mail->Body    = 'Cordial saludo, en el momento ya se cuentan con la totalidad de hojas de vida (4) solicitadas para buscar dentro de dichas postulaciones al egresado mas apropiado para el cargo de Auxiliar en Salud Oral<br>No olvide por favor, una vez realizado el proceso de selecciÛn propio de su empresa, indicar en el sistema que egresado fue contratado en la opciÛn SELECCIONAR';

    $mail->AltBody = 'Escuela de Salud Sur Colombiana';

    $mail->send();
    echo 'Message has been sent'.$correo.'<br>';
   //echo 1;
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
   // echo 0;
}
$mail->setLanguage('es', '/optional/path/to/language/directory/');


} 


                ?>