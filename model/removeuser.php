	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on
 
 

$nombre= $_POST['nombre'];
/ip hotspot user remove [/ip hotspot user find where name="$nombre"];

echo '<div class="alert  customestile mt-1 mb-2 border  bg-success" role="alert"><strong ><i class="fa   fa-users " aria-hidden="true"></i> Se ha registrado '.$nombre.' </strong></div>';


?>
 