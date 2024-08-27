<?php

require_once '../require/routerboard.phar';


function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES";	}
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 

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

 
if(isset($conectado[0]["address"])){$ip=$conectado[0]["address"];}else{$ip="No identificado";}	
if(isset($conectado[0]["mac-address"])){$mac=$conectado[0]["mac-address"];}else{$mac="No identificado";}	







if(isset($obtenerusers[0]["password"])){$password =$obtenerusers[0]["password"];}else{$password ="";}
			 
 
if(isset($obtenerusers[0]["profile"])){$perfil =$obtenerusers[0]["profile"];}else{	$perfil="";	}	
if(isset($obtenerusers[0]['limit-uptime'])){$limitupt =converttime($obtenerusers[0]['limit-uptime']);}else{	$limitupt="Ilimitado";	}	 


 
				 
if(isset($obtenerusers[0]["uptime"])){$time =converttime($obtenerusers[0]["uptime"]);}else{	$time ="00:00:00";	}

		

if(isset($obtenerusers[0]["limit-bytes-total"])){$limitbt =readableBytes($obtenerusers[0]["limit-bytes-total"]);}else{$limitbt ="Ilimitado";}
if(isset($obtenerusers[0]["limit-bytes-in"])){$limitbin =readableBytes($obtenerusers[0]["limit-bytes-in"]);}else{$limitbin ="Ilimitado";} 
if(isset($obtenerusers[0]["limit-bytes-out"])){ $limitbuot =readableBytes($obtenerusers[0]["limit-bytes-out"]);}	else {$limitbuot="Ilimitado";}

//if(isset($obtenerusers[0]["bytes-in"])){ $bin=readableBytes($obtenerusers[0]["bytes-in"]);}	else {$bin=0;}	
//if(isset($obtenerusers[0]["bytes-out"])){ $bout=readableBytes($obtenerusers[0]["bytes-out"]);}	else { $bout=0;}


if(isset($obtenerusers[0]["comment"])){ $com =$obtenerusers[0]["comment"];}	else { $com="";}	
				 


				

				$comrestrict =substr($com,0,20)."...";	

							 
			   $data =array('estado' => $connect,
			    	         'user'=> $name,
				            'password' => $password,
				            'ip' => $ip,
				            'mac' => $mac,
				            'perfil' => $perfil,
				            'tiempo' => $time,
				             
				            'limitupt' => $limitupt,
				            'limitbt' => $limitbt,
				            'limitbin' => $limitbin,
				            'limitbuot' => $limitbuot,
				            'bin' =>$limitbin,
				            'bout' =>$limitbuot,           				           
				            'comment' => $com,
				            'commentr' => $comrestrict,
				            );		            

				echo json_encode($data);
		 
		 }
}


else { $data=3;
	
	echo json_encode($data);
}
 
 

 ?>