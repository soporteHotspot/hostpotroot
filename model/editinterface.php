	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$namedefault= $_POST['namedefault'];
$tipo= $_POST['tipo'];
$newname= $_POST['newname'];

if (){
	$comentario= $_POST['comentario'];	
		$API->comm("/interface/bridge/set", array(
          'name' =>  $nombre,		 
		 'arp' => $arp,
		  'comment' => $com, ));
	

echo 1;
}

else (){
	
}
else {
	echo 2;
}

	


		
	}
	

 else {
	 
	 echo 3;
 }
 
?>
 