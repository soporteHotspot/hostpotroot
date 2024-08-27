	 
<?php

require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password)) {
 $puerto= $_POST['puerto'];
 

 $obtenerusers = $API->comm("/ip/service/print", array(
            ".proplist" => ".id",
            "?name" => "api",
            ));
			 

				

$API->comm("/ip/service/set",
		  array(
			   ".id" => $obtenerusers[0][".id"],
			   "port"  => $puerto, 
			   
			   )
		  );
$_SESSION['puerto']=$puerto;
        echo 1;


		
}	


else {
	
	echo 3;
}

	
?>
 