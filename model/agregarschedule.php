	 
<?php

require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password)) {
 $name= $_POST['nombre'];
 $fecha= $_POST['finicio'];
 $tiempo=$_POST['hinicio'];
 $interval= $_POST['intervalo'];
 $script=$_POST['script'];
 
 

$API->comm("/system/schedule/add", array(       
       'name' => $name,
        'start-date' => $fecha,
	'start-time' => $tiempo,
        'interval' => $interval,
	'on-event' =>  $script,
		)
	
	
);
$data=1;

echo json_encode($data);

 

	}



 

else {
	
	$data=3;

echo json_encode($data);
}

	
?>
 