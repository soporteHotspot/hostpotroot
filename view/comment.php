<?php
require_once '../require/routerboard.phar';
  if ($API->connect($ip,$Usuario,$password)) {
	
	 $ObtenerPer = $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => "name,comment",
           
            ));
		

$TotalReg = count($ObtenerPer);
	

for ($i = 0; $i < $TotalReg; $i++) {
	$Perfiles = $ObtenerPer[$i];
	
	
	if (isset($Perfiles['comment'])){			
			$nameprofile= '"'.$Perfiles['comment'].' " ';
			
			
		}
		else {
			$nameprofile ="";
		}
	
	//$input = array($nameprofile.);
//$result = array_unique($input);
	echo $nameprofile;
        
	 
		 
}

}


$API->disconnect();
  ?>