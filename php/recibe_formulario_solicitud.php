<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

require('conexion.php');

if (isset($_REQUEST['nit_emp'])) {
$nit_emp = $_REQUEST['nit_emp'];
} else {
$nit_emp = "";
}

if (isset($_REQUEST['id_titulo'])) {
$id_titulo = $_REQUEST['id_titulo'];
} else {
$id_titulo = "";
}
if (isset($_REQUEST['observacion_sol'])) {
$observacion_sol = $_REQUEST['observacion_sol'];
} else {
$observacion_sol = "";
}
if (isset($_REQUEST['id_horario'])) {
$id_horario = $_REQUEST['id_horario'];
} else {
$id_horario = "";
}

if (isset($_REQUEST['fecha_act_hasta'])) {
$fecha_act_hasta = $_REQUEST['fecha_act_hasta'];
} else {
$fecha_act_hasta = "";
}

if (isset($_REQUEST['num_aspirantes'])) {
$num_aspirantes = $_REQUEST['num_aspirantes'];
} else {
$num_aspirantes = "";
}

$fecha_registro_solicitud=date('Y-m-d');

	//if($resultado_estado==0){  // no existe
			$consulta="INSERT INTO solicitud (nit_emp,id_titulo, informacion, id_horario, id_estado, fecha_sol, estado_sol,fecha_act_hasta,num_aspirantes)
			vALUES ('$nit_emp','$id_titulo','$observacion_sol','$id_horario',1,'$fecha_registro_solicitud',1,
			'$fecha_act_hasta','$num_aspirantes')";
			$result = mysqli_query($myconex, $consulta);
			if($result){echo"1";
			// se debe enviar el correo a todos

$result = mysqli_query($myconex, "SELECT nom_est, ape_est, doc_est, correo_est, tel_est
FROM solicitud, titulo, estudiante 
where solicitud.id_titulo=titulo.id_titulo
and estudiante.id_titulo=solicitud.id_titulo
and estudiante.estado_est=2") ;


while ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

$nom_completo=$fila["nom_est"]." ".$fila["ape_est"];
$correo=$fila["correo_est"];	

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
    $mail->setFrom('desarrollo@escuelasaludsurcolombiana.com', 'Oportunidad Laboral Essc');
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
    $mail->Subject = 'Oportunidad laboral para Egresados ESSC';
    $mail->Body    = 'Hola <b>'.$nom_completo.'</b>, a través de la bolsa de empleo de La Escuela de Salud Sur Colombiana, una prestigiosa Empresa require contar con los servicios profesionales de un Técnico Laboral por Competencias; por ello le invitamos a postularse a dicho cargo a traves de la Bolsa de Empleo ESSC; ingrese por medio del siguiente vinculo o a traves de la pagina de la Escuela de Salud Sur Colombiana.<br>
    <a href="http://essc.vzpla.net">Bolsa de Empleo ESSC</a><br>
	<a href="http://essc.edu.co">Escuela de Salud Sur Colombiana</a><br>
    ';
    $mail->AltBody = 'Escuela de Salud Sur Colombiana';
    $mail->setLanguage('es', '/optional/path/to/language/directory/');

    $mail->send();
    $mail->ClearAddresses();
    //echo 'Message has been sent';
    echo "1";
} catch (Exception $e) {
   // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    echo "0";
}
	} //es de la consulta.
		}else{echo"0";}
		 
	






?>