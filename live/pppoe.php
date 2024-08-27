<?php
require_once '../require/routerboard.phar';
if ($API->connect($ip,$Usuario,$password,$puerto)) {	

$ARRAY4 = $API->comm("/ppp/active/print");	
	$usersPPPoE= count($ARRAY4);	
	 echo json_decode($usersPPPoE);
   $API->disconnect();
} else {
   echo '';

}
 ?>
 