	 
<?php

require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password)) {
 $mac= $_POST['macbinding'];
 $ip= $_POST['ipbinding'];
 $serv=$_POST['serverbinding']; 
 $tipo=$_POST['tipobinding'];
 $com=$_POST['comentariobinding'];
 $validacion=$_POST['tiempo1'];
 $tiempo=$_POST['tiempo1'].$_POST['tiempo2'];
$taskdisabled=" [/ip hotspot ip-binding set disabled=yes [find mac-address=".$mac."]] [/system schedule remove [find name=".$mac."]]";
$vel=$_POST['velocidad'];

 $obtenerusers = $API->comm("/system/schedule/print", array(
            ".proplist" => ".id",
            "?name" => $mac,
            ));

$API->comm("/system/schedule/remove",
        array(
            ".id" => $obtenerusers[0][".id"],
            )
        );

 
 $obtenerd = $API->comm("/ip/dhcp-server/lease/print", array(
            ".proplist" => ".id",
            "?mac-address" => $mac,
            ));

$API->comm("/ip/dhcp-server/lease/remove",
        array(
            ".id" => $obtenerd[0][".id"],
            )
        );

$API->comm("/ip/dhcp-server/lease/add", array(       
       'mac-address' => $mac,
        'address' => $ip,
	'server' => $serv,
        'rate-limit' => $vel,
	'comment' =>  $com,
		)
	
	
);

if ($validacion==0){    
$API->comm("/ip/hotspot/ip-binding/add", array(       
        'mac-address' => $mac,
        'address' => $ip,
		'server' => $serv,
        'type' =>  $tipo,
		'comment' =>  $com,
		
		)
	
	
	
	
);



echo 1;

	}



else {

	$API->comm("/ip/hotspot/ip-binding/add", array(       
        'mac-address' => $mac,
        'address' => $ip,
	'server' => $serv,
        'type' =>  $tipo,
	'comment' =>  $com,
		)
	
	
); 
 
			 
$API->comm("/system/scheduler/add", array(
         'name' =>  $mac,
         'interval' =>$tiempo,
         'on-event' => $taskdisabled,		 
         'comment' => $com,
			
    )
	);
echo 1;

			 }




 


 

 


}	


else {
	
	echo 3;
}

	
?>
 