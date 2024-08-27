<?php 

require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password)) {
$obtenerusers = $API->comm("/ip/service/print", array(
            ".proplist" => ".id,port",
            "?name" => "api",
            ));

	 
	$data = $obtenerusers[0]['port'];

print json_encode($data);

}


 ?>