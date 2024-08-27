<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$user=$_POST['nombre'];

	 $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,profile,limit-uptime,comment",
            "?name" => $user,
            ));
			
		
			$usersx = $obtenerusers[0];			
echo json_encode($usersx);
		 
}


else {
	
	echo 3;
}
 ?>