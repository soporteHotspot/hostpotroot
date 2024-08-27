<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password,$puerto)) {


	$nombredefault=$_POST['namedefault'];

	$nombreactual =$_POST['nombreactual'];
	$postname =$_POST['newname'];
	$newname= str_replace(" ", "-", $postname);
    $tipo=$_POST['tipo'];
    $comentario=$_POST['comentario'];

	 $obtenerusers = $API->comm("/interface/print", array(
            ".proplist" => ".id",
            "?name" => $nombreactual,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {

				

$API->comm("/interface/set",
		  array(
			   ".id" => $obtenerusers[0][".id"],
			   "name"  => $newname,
			   "comment"  => $comentario,
			   )
		  );
        echo 1;
		}
}


else {
	
	echo 3;
}
 
 

 ?>