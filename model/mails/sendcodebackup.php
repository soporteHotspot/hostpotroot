
<?php

 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../require/mailer/src/Exception.php';
require '../../require/mailer/src/PHPMailer.php';
require '../../require/mailer/src//SMTP.php';
require("../../require/configmailer.php");

require("../../require/connect_db.php");

 
$mayus = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_code($input, $strength = 16) {
    $input_length = strlen($input);
    $GetUP = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $GetUP .= $random_character;
    }
 
    return $GetUP;
}
 
 
session_start();
$code= generate_code($mayus, 10);  
 $emailadmin=$_SESSION['email'];
$namesis="Sistema WISP";
$emailcliente=$email;
$namec="RECOVERY";
 
$subjet="Sistema de resutauracion de base de datos";

 $bodycliente='Hola, '.$emailadmin.' nececitará validar el siguiente código para restauracion de base de datos: <strong>'.$code.'</strong> gracias por utilizar nuestro servicio';

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
   
   
      // Attachments
    

    $mail->send();
$fecha2= date("Ymd");
$tiemporea2= date("His");
$id2=$fecha2.$tiemporea2; 
$rnd= rand(5, 1000);
$idx= strtotime ( $rnd." seconds" , strtotime ( $id2 ) ) ;
  mysqli_query($mysqli,"INSERT INTO `recoverydb` (`id`, `code`, `email`) VALUES('$idx','$code','$emailadmin')");
     echo 1 ;
} catch (Exception $e) {
  
    echo 2 ;
}
?>