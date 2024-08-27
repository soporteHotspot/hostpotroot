	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on


if ($API->connect($ip,$Usuario,$password,$puerto)) {
	

	$nombrex= $_POST['nombre'];
	$nombre= str_replace(" ", "-", $nombrex);	 
	$pass=$_POST['password'];
	$grupo=$_POST['grupodelusuario'];
	$com=$_POST['comentario'];

 
	

$API->comm("/user/add", array(
          'name' =>  $nombre,
           'group' => $grupo,		  
		   'password' => $pass,		  
		   
		  'comment' => $com
	     
	    
   ));
	


echo 1;
		
	}
	
	
	
 
 else {
	 
	 echo 3;
 }
 
 
  
?>
 