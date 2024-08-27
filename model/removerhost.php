<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {	
$mac=$_POST['mac'];
	 $obtenerusers = $API->comm("/ip/hotspot/host/print", array(
            ".proplist" => ".id",
            "?mac-address" => $mac,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {
		$API->comm("/ip/hotspot/host/remove",
        array(
            ".id" => $obtenerusers[0][".id"],
            )
        );		
			echo 1;}
			}
else {	
	echo 3;
}
 
 //remover lease

 ?>