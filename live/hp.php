<?php
require_once '../require/routerboard.phar';
if ($API->connect($ip,$Usuario,$password,$puerto)) {	
$ARRAY3 = $API->comm("/ip/hotspot/active/print");	
	$usersactivos= count($ARRAY3);
 
   $API->disconnect();
   
   echo json_decode($usersactivos);
} else {
   echo '';

}
 ?>
 