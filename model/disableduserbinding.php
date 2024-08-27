<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password,$puerto)) {
	$disabled=$_POST['estado'];
    $mac=$_POST['data'];

	 $obtenerusers = $API->comm("/ip/hotspot/ip-binding/print", array(
            ".proplist" => ".id,mac-address",
            "?mac-address" => $mac,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {

				if ($disabled=="true"){

$API->comm("/ip/hotspot/ip-binding/set",
		  array(
			   ".id" => $obtenerusers[0][".id"],
			   "disabled"  => "no",
			   )
		  );


				}
				else if ($disabled=="false"){

$API->comm("/ip/hotspot/ip-binding/set",
		  array(
			   ".id" => $obtenerusers[0][".id"],
			   "disabled"  => "yes",
			   )
		  );


				}





			echo 1;}
}


else {
	
	echo 3;
}
 
 

 ?>