	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on


if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$nombre= $_POST['nombrep'];
$velocidad=$_POST['velocidadp'];
$nusuarios=	$_POST['nusuariosp'];
$cokie=	$_POST['cookiep'];

$tipo=	$_POST['tipop'];
$mail= $_POST['email'];
$inbox1= $_POST['mensajelogin'];
$inbox2= $_POST['mensajedelete'];
$body1=' :local informacion "\r\n Usuario: $user \r\n MAC: $"mac-address",\r\n IP: $address, \r\n Routerboard: $[/system identity get name], \r\n Hora de inicio: $[/system clock get time],\r\n Fecha de inicio: $[/system clock get date].";';
$subjet1=':local subject1 "El usuario $user se ha conectado a $[/system identity 
get name]"'; 
$subjet2=':local subject1 "El usuario $user se ha eliminado de $[/system identity get name]"';

$scriptdelete='eyAgWy9pcCBob3RzcG90IHVzZXIgc2V0ICR1c2VyIGNvbW1lbnQ9IiAkdXNlciAgY29uZWN0YWRAICBob3JhOiAkWy9zeXN0ZW0gY2xvY2sgZ2V0IHRpbWVdIGZlY2hhOiAkWy9zeXN0ZW0gY2xvY2sgZ2V0IGRhdGVdIl0gWy9zeXN0ZW0gc2NoZWR1bGVyIGFkZCBjb21tZW50PSIgRWwgdXN1YXJpbyAkdXNlciBzZSBlbGltaW5hcmEgYXV0b21hdGljYW1lbnRlIiBuYW1lPSR1c2VyIG9uLWV2ZW50PSJcblw1QlwyRlw2OVw3MFwyMFw2OFwyMFw3NVwyMFw3M1w2NVw3NFwyMFwyMiR1c2VyXDIyXDIwXDY0XDY5XDczXDNEXDIyXDc5XDY1XDczXDIyXDVEIFxyXCBcblw1QlwyRlw3M1w3OVw3M1wyMFw3M1w2M1w2OFwyMFw3M1w2NVw3NFwyMFwyMiR1c2VyXDIyXDIwXDY5XDZFXDc0XDY1XDcyXDNEXDMwXDMwXDNBXDMwXDMxXDNBXDMwXDMwXDVEIFxyXCBcblw1QlwyRlw2OVw3MFwyMFw2OFw2Rlw3NFw3M1w3MFw2Rlw3NFwyMFw2MVw2M1w3NFw2OVw3Nlw2NVwyMFw3Mlw2NVw2RFw2Rlw3Nlw2NVwyMFw1Qlw2Nlw2OVw2RVw2NFwyMFw3NVw3M1w2NVw3MlwzRFwyMiR1c2VyXDIyXDVEXDVEIFxyXCBcblw1QlwyRlw2OVw3MFwyMFw2OFw2Rlw3NFw3M1w3MFw2Rlw3NFwyMFw2M1w2Rlw2Rlw2Qlw2OVw2NVwyMFw3Mlw2NVw2RFw2Rlw3Nlw2NVwyMFw1Qlw2Nlw2OVw2RVw2NFwyMFw3NVw3M1w2NVw3MlwzRFwyMiR1c2VyXDIyXDVEXDVEIFxyXCBcblwzQVw2NFw2NVw2Q1w2MVw3OVwyMFwzMlxyXCBcblw1QlwyRlw3M1w3OVw3M1wyMFw3M1w2M1w2OFwyMFw3Mlw2NVw2RFwyMFwyMiR1c2VyXDIyXDVEIFxyXCBcblw1QlwyRlw2OVw3MFwyMFw2OFwyMFw3NVwyMFw3Mlw2NVw2RFwyMFwyMiR1c2VyXDIyXDVEIiBpbnRlcnZhbD1bL2lwIGhvdHNwb3QgdXNlciBnZXQgIiR1c2VyIiBsaW1pdC11cHRpbWVdXX0=';
$scriptdelete= base64_decode($scriptdelete);

$comentario='eyAgWy9pcCBob3RzcG90IHVzZXIgc2V0ICR1c2VyIGNvbW1lbnQ9IiAkdXNlciAgY29uZWN0YWRAICBob3JhOiAkWy9zeXN0ZW0gY2xvY2sgZ2V0IHRpbWVdICBmZWNoYTogJFsvc3lzdGVtIGNsb2NrIGdldCBkYXRlXSJdfQ==';
$comentario= base64_decode($comentario);

$task =':local p "'.$nombre.'"; foreach u in [/ip h u f profile="$p"] do={ :if ([/ip h u get $u limit-u] <= [/ip h u get $u upt]) do={/ip h u rem $u } }';

 if ($tipo==1){
$API->comm("/ip/hotspot/user/profile/add", array(
       "name" =>  $nombre,		  
		 "shared-users" => $nusuarios,
	     "rate-limit" => $velocidad,
	     "on-login" => $scriptdelete,
	     "mac-cookie-timeout" => $cokie
   ));

echo 1;	 
	 
 }
	else if ($tipo==2){
		
		$API->comm("/ip/hotspot/user/profile/add", array(
       'name' =>  $nombre,		  
		 'shared-users' => $nusuarios,
	     'rate-limit' => $velocidad,
	     'on-login' => $comentario,
	     'mac-cookie-timeout' => $cokie
   ));
   
   $API->comm("/system/scheduler/add", array(
         'name' =>  $nombre,
         'interval' => "5m",
         'on-event' => $task,		 
		   'comment' => "monitoreo ".$nombre
			
    )
	);

echo 1;
		
	}
	
	
	}
 
 else {
	 
	 echo 3;
 }
 
 
  
?>
 