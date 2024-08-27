<?php
require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	
	 $ObtenerPer = $API->comm("/ip/hotspot/user/profile/print");
		

$TotalReg2 = count($ObtenerPer);
$Perfiles = $ObtenerPer['0'];	

echo '<select required id="perfilcard" required  name="perfil" class="form-control" aria-label="Default select example">';
echo '<option   value="">Seleccione perfil</option>';

for ($i = 0; $i < $TotalReg2; $i++) {
	$Perfiles = $ObtenerPer[$i];
	
	$nameprofile=$Perfiles['name'];
	
	echo '<option value="'.$nameprofile.'">'.$nameprofile.'</option>';
        
	 
		 
}
echo "</select>";
 
}


$API->disconnect();
  ?>