
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$user="SYETAIHN";
	 $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,limit-uptime,comment",
            "?name" => $user,
            ));
		$r=	$obtenerusers['name'];
		$API->comm("/ip/hotspot/user/remove", array(
			"name" => $r['name'],
		));
			
echo "deleted";
		 
}



 ?>