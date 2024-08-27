<?php
require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	
	 $Getinterfaz = $API->comm("/interface/print");
		

$TotalReg2 = count($Getinterfaz);
$INTERFAZ = $Getinterfaz['0'];	

echo '<select required id="interface" name="interface" class="form-control" >';

for ($i = 0; $i < $TotalReg2; $i++) {
	$INTERFAZ = $Getinterfaz[$i];
	
	$nameinterfaz=$INTERFAZ['name'];
	
	echo '<option value="'.$nameinterfaz.'">'.$nameinterfaz.'</option>';
        
	 
		 
}
echo "</select>";
 
}
else


{$data=3;


print json_encode($data);}

$API->disconnect();
  ?>