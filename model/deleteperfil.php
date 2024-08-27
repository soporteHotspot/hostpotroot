<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {
	
$per=$_POST['nombre'];

	 $obtenerper= $API->comm("/ip/hotspot/user/profile/print", array(
            ".proplist" => ".id",
            "?name" => $per,
            ));
			if ($obtenerper[0][".id"]==""){
				echo 3;
				
				
			}
			else {
				$API->comm("/ip/hotspot/user/profile/remove",
        array(
            ".id" => $obtenerper[0][".id"],
            )
        );	
		
		echo 1;
			}
		
}


else {
	
	echo 3;
}
 
 

 ?>
