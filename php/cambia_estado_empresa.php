<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';
require('conexion.php');

if (isset($_REQUEST['id_emp'])) {
$id_emp = $_REQUEST['id_emp'];
} else {
$id_emp= "";
}

if (isset($_REQUEST['est'])) {
$est = $_REQUEST['est'];
} else {
$est= "";
}

if (isset($_REQUEST['correo'])) {
$correo = $_REQUEST['correo'];
} else {
$correo= "";
}
		//echo "Es el estado: $est";	

 
 
  $sql = "SELECT *
  FROM empresa 
  WHERE id_emp=$id_emp";


  $result1 = mysqli_query($myconex, $sql);
  $num_row = mysqli_num_rows($result1);
  if ($num_row == "1") {
    $data = mysqli_fetch_array($result1);
    $nom_emp = $data["nom_emp"];
    $nom_contacto = $data["nom_contacto"];
    $nit_emp = $data["nit_emp"];
    $estado=$data["estado"];
    $tel_emp=$data["tel_emp"];
  }

		$consulta="UPDATE empresa set 
		estado='$est' where 
		id_emp='$id_emp' ";
			 	# code...
			$result = mysqli_query($myconex, $consulta);
		if($est==1){//echo"1";

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
    $mail->setFrom('desarrollo@escuelasaludsurcolombiana.com', 'Activacion cuenta de usuario en Sistema de Egreados ESSC');
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
    $mail->Subject = 'Activacion cuenta de acceso  Sistema de Egresados ESSC';
    $mail->Body    = 'Felicitaciones señores: <b>'.$nom_emp.'</b> ,La Escuela de Salud Sur Colombiana, se permite informarle que su cuenta de usuario ha sido Activada satisfactoriamente; sus datos de acceso son: <br>
    Usuario: <b>a'.$nit_emp.'</b><br>
    Contraseña: <b>'. $tel_emp.'</b><br>
    Por seguridad los invitamos a cambiar su contraseña de acceso.</b>';
    $mail->AltBody = 'Escuela de Salud Sur Colombiana';

    $mail->send();
    //echo 'Message has been sent';
   //echo 1;
} catch (Exception $e) {
   // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
   // echo 0;
}
$mail->setLanguage('es', '/optional/path/to/language/directory/');
}
//aqui finaliza el correo
// To load the French version
if($result){ // si realiza la acutalizacion del estado de la empresa.
echo "1";
}else{
echo "0";
}

mysqli_close($myconex);


?>