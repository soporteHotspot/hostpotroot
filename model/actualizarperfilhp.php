<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {	

	$nombreactual =$_POST['nombre1'];
	$postname =$_POST['nombre2'];
	$newname= str_replace(" ", "-", $postname);
    $velocidad=$_POST['velocidad'];
    $nusuarios=	$_POST['nusuarios'];
    $cokie=	$_POST['cookie'];
     

	 $obtenerusers = $API->comm("/ip/hotspot/user/profile/print", array(            
            "?name" => $nombreactual,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {

				

$API->comm("/ip/hotspot/user/profile/set",
		  array(
			   ".id" => $obtenerusers[0][".id"],
			    "name" =>  $newname,		  
		        "shared-users" => $nusuarios,
	            "rate-limit" => $velocidad,	     
	            "mac-cookie-timeout" => $cokie
			   )
		  );
        echo 1;
		}
}


else {
	
	echo 3;
}
 
 

 ?>