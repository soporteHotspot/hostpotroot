<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {
	
$com=$_POST['comentario'];

	 $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
            ".proplist" => ".id,comment",
            "?comment" => $com,
            ));

$TotalReg = count($obtenerusers);


			if ($TotalReg<1){
				
				echo 2;
			}
			
			else{

for ($i = 0; $i < $TotalReg; $i++) {


	$users = $obtenerusers[$i];
	$id = $users['.id'];

		$API->comm("/ip/hotspot/user/remove",
        array(
            ".id" => $id,
            )
        );	
		}
			echo 1;

		}
}


else {
	
	echo 3;
}
 
 

 ?>