<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$user=$_POST['nombre'];

	 $obtenerusers = $API->comm("/system/schedule/print", array(
            ".proplist" => ".id",
            "?name" => $user,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {
		$API->comm("/system/schedule/remove",
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