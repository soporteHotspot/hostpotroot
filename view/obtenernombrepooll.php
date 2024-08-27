<?php
require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	
	 $ObtenerPer = $API->comm("/ip/pool/print");
		

$TotalReg2 = count($ObtenerPer);


echo '<select id="poollocaledit" required  name="poollocal" class="form-control" aria-label="Default select example">';
echo '<option   value="">Seleccione pool</option>';

for ($i = 0; $i < $TotalReg2; $i++) {
	$Pool = $ObtenerPer[$i];
	
	$namepool =$Pool['name'];
	
	echo '<option value="'.$namepool.'">'.$namepool.'</option>';
        
	 
		 
}
echo "</select>";
 
}

else{echo 3;}
$API->disconnect();
  ?>