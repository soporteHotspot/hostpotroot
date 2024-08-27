<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {	
 $mac=$_POST['mac'];
 $ip= $_POST['ip'];
 $rate= $_POST['rate'];
 $com= $_POST['comentario'];
	 $obtenerusers = $API->comm("/ip/dhcp-server/lease/print", array(
            ".proplist" => ".id",
            "?mac-address" => $mac,
            ));
			if ($obtenerusers[0][".id"]==""){


				$API->comm("/ip/dhcp-server/lease/add", array( 
		'insert-queue-before'='first', 
		'address' => $ip,     
        'mac-address' => $mac,		
        'rate-limit' =>  $rate,
		'comment' =>  $com,
		);
				echo 2;
			}
			else {


		$API->comm("/ip/dhcp-server/lease/add", array( 
		'insert-queue-before'='first', 
		'address' => $ip,     
        'mac-address' => $mac,		
        'rate-limit' =>  $rate,
		'comment' =>  $com,
		)
	
	
);

			echo 1;


		}
			}
else {	
	echo 3;
}
 
 //remover lease

 ?>