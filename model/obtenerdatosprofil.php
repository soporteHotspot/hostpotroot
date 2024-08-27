<?php

require_once '../require/routerboard.phar';
 

 if ($API->connect($ip,$Usuario,$password)) {
	
$name=$_POST['nombre'];

	        $obtnerprofil = $API->comm("/ip/hotspot/user/profile/print", array(
            "?name" => $name,
            ));
			if ($obtnerprofil[0][".id"]==""){
				$data=2;
				echo json_encode($data);
			}
			else {
				$name=$obtnerprofil[0]["name"];	
				$nusuarios=$obtnerprofil[0]['shared-users'];
				$cookie=$obtnerprofil[0]['mac-cookie-timeout'];
				$velocidad=$obtnerprofil[0]['rate-limit'];
				$scrypt=$obtnerprofil[0]['on-login'];			
							 
			    $data =array('nombre'=> $name,				            
				           'usuarios' => $nusuarios,
				           'cookie'=>$cookie,
				           'velocidad' => $velocidad,
				           'scrypt'=> $scrypt,
				       );	            

				echo json_encode($data);
		 
		 }
}


else { $data=3;
	
	echo json_encode($data);
}
 
 

 ?>