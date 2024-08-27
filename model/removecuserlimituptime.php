<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {
	
$user=$_POST['datadelete'];

	 $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,profile",
            "?name" => $user,
            ));
			if ($obtenerusers[0][".id"]==""){
				
				echo 2;
			}
			
			else{
		$API->comm("/ip/hotspot/user/remove",
        array(
            ".id" => $obtenerusers[0][".id"],
            )
        );	
		
			echo 1;}
}


else {
	
	echo 3;
}
 
 

 ?>