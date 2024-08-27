<?php
require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	
	 $Getinterfaz = $API->comm("/interface/print");
		

$TotalReg2 = count($Getinterfaz);
$INTERFAZ = $Getinterfaz['0'];	

echo '<select required id="btnintrfaces" name="inter" class="form-control" >';
echo '<option   value="">Seleccione interfaz</option>';
for ($i = 0; $i < $TotalReg2; $i++) {
	$INTERFAZ = $Getinterfaz[$i];
	
	$nameinterfaz=$INTERFAZ['name'];
	
	echo '<option value="'.$nameinterfaz.'">'.$nameinterfaz.'</option>';
        
	 
		 
}
echo "</select>";
 
}


$API->disconnect();
  ?>