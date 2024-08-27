<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {	
      $mac=$_POST['mac'];

 $obtenerd = $API->comm("/ip/dhcp-server/lease/print", array(
            ".proplist" => ".id",
            "?mac-address" => $mac,
            ));

$API->comm("/ip/dhcp-server/lease/remove",
        array(
            ".id" => $obtenerd[0][".id"],
            )
        );

$obtenerschedule = $API->comm("/system/schedule/print", array(
            ".proplist" => ".id",
            "?name" => $mac,
            ));

$API->comm("/system/schedule/remove",
        array(
            ".id" => $obtenerschedule[0][".id"],
            )
        );	



	 $obtenerusers = $API->comm("/ip/hotspot/ip-binding/print", array(
            ".proplist" => ".id",
            "?mac-address" => $mac,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo "";
			}
			else {
		$API->comm("/ip/hotspot/ip-binding/remove",
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