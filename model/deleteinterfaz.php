<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$interface=$_POST['nombre'];

	 $obtenerper= $API->comm("/interface/bridge/print", array(
            ".proplist" => ".id,name,type",
            "?name" =>$interface,           
            ));
			if ($obtenerper[0][".id"]==""){
				echo 2;
				
				
			}
			else {
				$API->comm("/interface/bridge/remove",
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