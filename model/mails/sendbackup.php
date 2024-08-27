
<?php

 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../require/mailer/src/Exception.php';
require '../../require/mailer/src/PHPMailer.php';
require '../../require/mailer/src//SMTP.php';
require("../../require/configmailer.php");

require("../../require/connect_db.php");

 
$file=$_POST["file"];
$namesis="Sistema hotspot";
$emailcliente=$email;
$namec="RESPALDO";
 
$subjet="BACKUP SISTEMA HOTSPOT";
$bodycliente="ENVIO DE RESPALDO DESDE SISTEMA HOTSPOT";
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = $host;                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $email;                     // SMTP username
    $mail->Password   = $passuser;                               // SMTP password
    $mail->SMTPSecure = $cifrado;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = $puerto;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($emailcliente, $nombre);
    $mail->addAddress($emailcliente, $namec);  // Add a recipient
    
    

    // Attachments
         // Add attachments
      // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subjet;
     
    $mail->Body    = $bodycliente;
   
     $mail->AddAttachment($file);
      // Attachments
    

    $mail->send();
	
     echo 1 ;
} catch (Exception $e) {
	
    echo 2 ;
}
?>