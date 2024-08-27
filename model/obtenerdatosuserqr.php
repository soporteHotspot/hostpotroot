<?php
 
require("../require/connect_db.php");
$obtenerda=("SELECT * FROM sistema");
        $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        $zone=$data['zona'];
        $moneda=$data['moneda'];
require_once '../require/routerboard.phar';
function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES";	}
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 


 if ($API->connect($ip,$Usuario,$password)) {
 	$obtenerDNS= $API->comm("/ip/hotspot/print", array(
            ".proplist" => "ip-of-dns-name",           
            ));
	$dnsname = $obtenerDNS[0];
	$ipqr = $dnsname['ip-of-dns-name'];
	
$user=$_POST['username'];

    



	        $obtenerusers = $API->comm("/ip/hotspot/user/print", array(
            "?name" => $user,
            ));
			if ($obtenerusers[0][".id"]==""){
				$data=2;
				echo json_encode($data);
			}
			else { 
				
				$name=$obtenerusers[0]["name"];
				if(isset($obtenerusers[0]["password"]))
				{$pass=$obtenerusers[0]["password"];}
			else {$pass="";}
				
				
				
				 
if (isset($obtenerusers[0]['limit-uptime'])){			
			$limitupt=converttime($obtenerusers[0]['limit-uptime']);

		}
		else {
			$limitupt ="Ilimitado";
		}
			
							 
				
					if(isset($obtenerusers[0]["comment"]))	{

					if(($obtenerusers[0]["comment"]=="") || ($obtenerusers[0]["comment"]== "counters and limits for trial users") ){$com=$moneda."  ".number_format(0.00, 2);}else{$comentariox=$obtenerusers[0]["comment"];
				$comentario2=explode(" ",$comentariox);
				$com=$moneda."  ".number_format($comentario2[0], 2);}	  }	

				else { $com=$moneda."  ".number_format(0, 2); }	
							
				
				
				 
								  
					
				 
						 
			    $data =array(
			    	         'user'=> $name,
				            'password' => $pass,	            
				           
				            
				            'limituptime' => $limitupt,
				          
				                    				           
				            'comment' => $com,
				            'ip' => $ipqr,
				           
				            );	            

				echo json_encode($data);
		 
		 }
}


else { $data=3;
	
	echo json_encode($data);
}
 
 

 ?>