<?php

require_once '../require/routerboard.phar';
 function readableBytes($bytes) {
    $i = floor(log($bytes) / log(1024));
    $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

    return sprintf('%.02F', $bytes / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
}


 if ($API->connect($ip,$Usuario,$password)) {
	
$user=$_POST['username'];

 $conectado = $API->comm("/ip/hotspot/active/print", array(
           "?user" => $user,
           ));
		
	$Total = count($conectado);
		
		

	        $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            "?name" => $user,
            ));
			if ($obtenerusers[0][".id"]==""){
				$data=2;
				echo json_encode($data);
			}
			else {
				if($Total>=1){$connect="Conectado";}else{$connect="Desconectado";}
				$name=$obtenerusers[0]["name"];

 
if(isset($conectado[0]["address"])){$ip=$conectado[0]["address"];}else{$ip="";}	
if(isset($conectado[0]["mac-address"])){$mac=$conectado[0]["mac-address"];}else{$mac="";}	







if(isset($obtenerusers[0]["password"])){$password =$obtenerusers[0]["password"];}else{$password ="";}
			 
 
if(isset($obtenerusers[0]["profile"])){$perfil =$obtenerusers[0]["profile"];}else{	$perfil="";	}	
if(isset($obtenerusers[0]['limit-uptime'])){$limitupt =$obtenerusers[0]['limit-uptime'];}else{	$limitupt="";	}	 


 
				 
if(isset($obtenerusers[0]["uptime"])){$time =$obtenerusers[0]["uptime"];}else{	$time ="00:00:00";	}

		


if(isset($obtenerusers[0]["comment"])){ $com =$obtenerusers[0]["comment"];}	else { $com="";}	
				 


				

				$comrestrict =substr($com,0,20)."...";	

							 
			    $data =array(
			    	         'user'=> $name,
				            'password' => $password,				           
				            'perfil' => $perfil,				           
				            'limituptime' => $limitupt,				                    				           
				            'comment' => $com,
				            
				            );	            

				echo json_encode($data);
		 
		 }
}


else { $data=3;
	
	echo json_encode($data);
}
 
 

 ?>