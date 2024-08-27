	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on


if ($API->connect($ip,$Usuario,$password,$puerto)) {	

	$postname= $_POST['nombre'];
	$nombre= str_replace(" ", "-", $postname);
$mtu= $_POST['mtu'];
$arp= $_POST['arp'];
$idvaln=$_POST['vlanid'];

$interz= $_POST['inter'];
$com= $_POST['comentario'];	

$API->comm("/interface/vlan/add", array(
          'name' =>  $nombre,		   
          
		   'mtu' => $mtu,
		   'arp' => $arp,
		   
		   'vlan-id' => $idvaln,
		   
		   'interface' => $interz,
		   
		  'comment' => $com,
	     
	    
   ));
	
 

echo 1;
		
	}
	
	
	
 
 else {
	 
	 echo 3;
 }
 
 
  
?>
 