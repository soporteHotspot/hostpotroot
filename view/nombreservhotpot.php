<?php
require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	
	 $ObtenerPer = $API->comm("/ip/hotspot/print");
		

$TotalReg = count($ObtenerPer);


echo '<select  id="servers" required  name="servidor" class="form-control" aria-label="Default select example">';
echo '<option value="">Seleccione server</option>';
echo '<option value="all">all</option>';

for ($i = 0; $i < $TotalReg; $i++) {
	$Servidor = $ObtenerPer[$i];	
	$namesever=$Servidor['name'];	
	echo '<option value="'.$namesever.'">'.$namesever.'</option>';
 		 
}
echo "</select>";
 
}
else {



	print '<input type="text" id="servers"  required name="servidor" class="form-control" value="all" placeholder="Nombre servidor"  >';




}

 ?>