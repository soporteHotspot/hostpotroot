	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on


if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$nombre= $_POST['nombre']; 
$localaddress=$_POST['local'];
$remoteaddress=$_POST['remoto'];
$velocidad=$_POST['velocidad'];



		
		$API->comm("/ppp/profile/add", array(
          'name' =>  $nombre,		 
		 'local-address' => $localaddress,
	     'remote-address' => $remoteaddress,
	     'rate-limit' => $velocidad
	    
   ));
   
 
	

echo 1;
		
	}
	
	
	
 
 else {
	 
	 echo 3;
 }
 
 
  
?>
 