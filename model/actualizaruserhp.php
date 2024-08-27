<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {	

	$nombreactual =$_POST['nombre1'];
	$postname =$_POST['nombre2'];
	$newname= str_replace(" ", "-", $postname);
	$pass =$_POST['password'];
    $perfil=$_POST['perfil'];
    $limituptime=$_POST['tiempolimite'];
    $comentario=$_POST['comentario'];

	 $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,profile,limit-uptime,comment,disabled",
            "?name" => $nombreactual,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {

				

$API->comm("/ip/hotspot/user/set",
		  array(
			   ".id" => $obtenerusers[0][".id"],
			   "name"  => $newname,
			   "password"  => $pass,
			   "profile"  => $perfil,
			   "limit-uptime"  => $limituptime,
			   "comment"  => $comentario
			   )
		  );
        echo 1;
		}
}


else {
	
	echo 3;
}
 
 

 ?>