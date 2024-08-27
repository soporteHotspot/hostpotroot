<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {
	
$user=$_POST['nombre'];

	 $obtenerusers = $API->comm("/user/print", array(
            ".proplist" => ".id,group",
            "?name" => $user,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {
				$id=$obtenerusers[0][".id"];
		       $API->comm("/user/remove",

			
            array(

            ".id" => $id,
            )
                  );	
		
			echo 1;}
                  }


else {
	
	echo 3;
}
 
 

 ?>