<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require('conexion.php');

if (isset($_REQUEST['nit_empresa'])) {
$nit_empresa = $_REQUEST['nit_empresa'];
} else {
$nit_empresa = "";
}
if (isset($_REQUEST['razon'])) {
$razon = $_REQUEST['razon'];
} else {
$razon = "";
}
if (isset($_REQUEST['nom_contacto'])) {
$nom_contacto = $_REQUEST['nom_contacto'];
} else {
$nom_contacto = "";
}
if (isset($_REQUEST['tipo_empresa'])) {
$tipo_empresa = $_REQUEST['tipo_empresa'];
} else {
$tipo_empresa = "";
}
if (isset($_REQUEST['dir_empresa'])) {
$dir_empresa = $_REQUEST['dir_empresa'];
} else {
$dir_empresa = "";
}
if (isset($_REQUEST['correo_empresa'])) {
$correo_empresa = $_REQUEST['correo_empresa'];
} else {
$correo_empresa = "";
}
if (isset($_REQUEST['tel_empresa'])) {
$tel_empresa = $_REQUEST['tel_empresa'];
} else {
$tel_empresa = "";
}
$fecha_reg_empresa=date('Y-m-d');
$inicial="select nit_emp from empresa where nit_emp='$nit_empresa'";
$sql_inicial=mysqli_query($myconex,$inicial);
$resultado_estado = mysqli_num_rows($sql_inicial);

	if($resultado_estado==0){  // no existe
			$consulta="INSERT INTO empresa(nom_emp,dir_emp,tel_emp,
			nom_contacto,tipo_emp,correo_emp,nit_emp,fecha_reg_emp,con_emp,contrasena,estado)
			VALUES ('$razon',
					'$dir_empresa',
					'$tel_empresa',
					'$nom_contacto',
					'$tipo_empresa',
					'$correo_empresa',
					'$nit_empresa',
					'$fecha_reg_empresa',
					'1',
					'$tel_empresa',
					'0'	
					)";
			$result = mysqli_query($myconex, $consulta);
			if($result){
			echo"1";

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
    $correo="bienestar@escuelasaludsurcolombiana.com";
    //Recipients
    $mail->setFrom('desarrollo@escuelasaludsurcolombiana.com', 'Solicitud Registro Empresa-Sistema de Egresados');
    $mail->addAddress($correo, $nom_contacto);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Solicitud Registro Empresa de $razon';
    $mail->Body    = 'La emprea: <b>'.$razon.'</b> , a traves de <b> '.$nom_contacto.'</b> ha solicitado su registro  en el Sistema de Egresados de la Escuela de Salud Sur Colombiana; verfique la existencia e idoneidad de dicha empresa y cambie el estado de esta empresa a Activo, de lo contrario dicha empresa No podrá ingresar al sistema.

    <br>Razon social: <b>'.$razon.'</b><br>
    Contacto: <b>'. $nom_contacto.'</b><br>
    Dirección: <b>'. $dir_empresa.'</b><br>
    Tel/Cel: <b>'. $tel_empresa.'</b><br>
    Nit: <b>'. $nit_empresa.'</b><br>
    Correo: <b>'. $correo_empresa.'</b><br>';
    $mail->AltBody = 'Escuela de Salud Sur Colombiana';

    $mail->send();
    //echo 'Message has been sent';
   //echo 1;
} catch (Exception $e) {
   // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
   // echo 0;
}
$mail->setLanguage('es', '/optional/path/to/language/directory/');
//}
				}else{echo"0";}
		 	 } else {
		 	echo "2";
		 	 }
?>