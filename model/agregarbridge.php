	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on


if ($API->connect($ip,$Usuario,$password,$puerto)) {
	

	$postname= $_POST['nombre'];
	$nombre= str_replace(" ", "-", $postname);

$arp= $_POST['arp'];

$com= $_POST['comentario'];
	

$API->comm("/interface/bridge/add", array(
          'name' =>  $nombre,		  
		   'arp' => $arp,
		  'comment' => $com,
	     
	    
   ));
	


echo 1;
		
	}
	
	
	
 
 else {
	 
	 echo 3;
 }
 
 
  
?>
 