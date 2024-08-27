<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$per=$_POST['nombre'];

	 $obtenerper= $API->comm("/ppp/profile/print", array(
            ".proplist" => ".id,name",
            "?name" => $per,
            ));
			
		$API->comm("/ppp/profile/remove",
        array(
            ".id" => $obtenerper[0][".id"],
            )
        );	
		
		echo 1;
}


else {
	
	echo 3;
}
 
 

 ?>