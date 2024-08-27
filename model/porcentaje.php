	 
<?php

require_once '../require/routerboard.phar';
require("../require/connect_db.php");
if ($API->connect($ip,$Usuario,$password)) {


	 $obtenerusers= $API->comm("/ip/hotspot/user/print");

$cantidad=20;//$_POST['cantidad'];
$totalusers3=count($obtenerusers);
define ("rest", ($cantidad+$totalusers3));

     
     


     $Restante=rest-$totalusers3;


     print json_encode($Restante);


    



}
else {
	$data=4; echo  json_encode($data);
	  
}

	
?>
 
