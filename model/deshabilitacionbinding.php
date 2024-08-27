	 
<?php

require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password)) {
 $mac= $_POST['mac']; 
 $com=$_POST['comentario'];
 $validacion=$_POST['tiempo1'];
 $tiempo=$_POST['tiempo1'].$_POST['tiempo2'];
$taskdisabled=" [/ip hotspot ip-binding set disabled=yes [find mac-address=".$mac."]] [/system schedule remove [find name=".$mac."]]";
 

 $obtenerusers = $API->comm("/system/schedule/print", array(
            ".proplist" => ".id",
            "?name" => $mac,
            ));

$API->comm("/system/schedule/remove",
        array(
            ".id" => $obtenerusers[0][".id"],
            )
        );

 
 $obtenerd = $API->comm("/ip/hotspot/ip-binding/print", array(
            ".proplist" => ".id",
            "?mac-address" => $mac,
            ));

if ($validacion==0){

$API->comm("/ip/hotspot/ip-binding/set",
                  array(
                           ".id" => $obtenerd[0][".id"],
                           "disabled"  => "no",
                           'comment' => $com,
                           )
                  );
echo 1;

	}



else {	 

        $API->comm("/ip/hotspot/ip-binding/set",
                  array(
                           ".id" => $obtenerd[0][".id"],
                           "disabled"  => "no",
                           'comment' => $com,
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
 