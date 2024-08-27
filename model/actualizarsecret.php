<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {	

	$nombreactual =$_POST['secret1'];
	$postname =$_POST['secret2'];
	$newname= str_replace(" ", "-", $postname);
	$password=$_POST['password'];
    $perfil=$_POST['perfil'];
    $comentario=$_POST['comentario'];

	 $obtenerusers = $API->comm("/ppp/secret/print", array(
            ".proplist" => ".id,name,password,comment,profile",
            "?name" => $nombreactual,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {

				

$API->comm("/ppp/secret/set",
		  array(
			   ".id" => $obtenerusers[0][".id"],
			   "name"  => $newname,
			   "password"  => $password,
			   "profile"  => $perfil,
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