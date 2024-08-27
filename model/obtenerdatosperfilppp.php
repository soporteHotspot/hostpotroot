<?php

require_once '../require/routerboard.phar';
 

 if ($API->connect($ip,$Usuario,$password)) {
	
$name=$_POST['nombre'];

	        $Perfiles = $API->comm("/ppp/profile/print", array(
            "?name" => $name,
            ));
			if ($Perfiles[0][".id"]==""){
				$data=2;
				echo json_encode($data);
			}
			else {
				$nombre=$Perfiles[0]['name'];	 			
			   $iplocal=$Perfiles[0]['local-address'];		 		
			   $ipremoto=$Perfiles[0]['remote-address'];		 		
			   $velocidad=$Perfiles[0]['rate-limit'];
		 
	
				
							 
			    $data =array('name'=> $name,				            
				           'pooll' => $iplocal,
				           'poolr'=>$ipremoto,
				           'velocidad' => $velocidad
				           
				       );	            

				echo json_encode($data);
		 
		 }
}


else { $data=3;
	
	echo json_encode($data);
}
 
 

 ?>