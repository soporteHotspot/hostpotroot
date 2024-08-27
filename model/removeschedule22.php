<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {


 	$monthNum  = 3;
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); // March
 $monthName= substr ( $monthName, 0, 3);

	
$user=$_POST['nombre'];

	 $obtenerS = $API->comm("/system/schedule/print", array(
            ".proplist" => ".id",
            "?name" => $user,
            ));
			if ($obtenerS[0][".id"]==""){
				$API->comm("/system/scheduler/add", array(        
        'name' => "istprr",
         'start-date'=>"jun/18/2021",
         'start-time'=>"04:00:00",
         'interval'=>"00:01:00",     
       	'on-event' =>  '[/ppp secret set "prueba" dis="yes"] /ppp active remove [find name="prueba"]'
       ));
			}
			else {
	$API->comm("/system/scheduler/set",
		  array(
			   ".id" => $obtenerS[0][".id"],			   
			   "start-date"  => $monthName."/20/2021",
			    'start-time'=>"04:00:00",
			    'interval'=>"00:01:00", 
			   )
		  );

	 $obtenersecret = $API->comm("/ppp/secret/print", array(
            ".proplist" => ".id,uptime",
            "?name" => "prueba",
            ));

		$API->comm("/ppp/secret/set",
		  array(
			   ".id" => $obtenersecret[0][".id"],			   
			   "disabled"  => "no",
			   )
		  );



			echo 1;}
}


else {
	
	echo 3;
}
 
 

 ?>