	 
<?php

require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password)) {
 $nombre= $_POST['nombre'];
 $nombrex = str_replace(" ", "-", $nombre);
 
$API->comm("/user/group/add", array(       
        'name' => $nombre,
        'policy' => "local,ftp,read,write,policy,password,sensitive,api",       
		
    )
	
	
);
echo 1;
}	


else {
	
	echo 3;
}

	
?>
 