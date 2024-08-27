<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {	

	$nombreactual =$_POST['nombre1'];
	$postname =$_POST['nombre2'];
	$newname= str_replace(" ", "-", $postname);
    $grupo=$_POST['grupo'];
    $comentario=$_POST['comentario'];

	 $obtenerusers = $API->comm("/user/print", array(
            ".proplist" => ".id,name,comment,group",
            "?name" => $nombreactual,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {

				

$API->comm("/user/set",
		  array(
			   ".id" => $obtenerusers[0][".id"],
			   "name"  => $newname,
			   "group"  => $grupo,
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