
<?php

require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$id=$_POST['id'];

	 $obtenerper = $API->comm("/ip/hotspot/user/profile/print", array(
            ".proplist" => ".id,name,session-timeout",
            "?.id" => "*".$id,
            ));
			
			$px = $obtenerper[0];			
echo json_encode($px);
		 
}


else {
	
	echo 3;
}
 ?>