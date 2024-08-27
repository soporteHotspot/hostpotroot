	 
<?php

require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password,$puerto)) {
 $username= $_POST['nombre'];
 $password= $_POST['password'];
 $service='pppoe';  
 $profile=$_POST['perfil'];
 $comentario=$_POST['comentario'];

$API->comm("/ppp/secret/add", array(       
        'name' => $username,
        'password' => $password,
		'service' => $service,
        'profile' =>  $profile,
         'comment'=>  $comentario
		
    )
	
	
);
echo 1;
}	


else {
	
	echo 3;
}

	
?>
 