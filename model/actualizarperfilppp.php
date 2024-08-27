<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on

 if ($API->connect($ip,$Usuario,$password)) {	

	$nombreactual =$_POST['name1'];
	$postname =$_POST['name2'];
	$newname= str_replace(" ", "-", $postname);
	
    $plocal=$_POST['poollocal']; 
    $premoto=$_POST['poolremoto']; 
    $velocidad=$_POST['velocidad'];    
    
     

	 $obtenerusers = $API->comm("/ppp/profile/print", array(            
            "?name" => $nombreactual,
            ));
			if ($obtenerusers[0][".id"]==""){
				echo 2;
			}
			else {

				

$API->comm("/ppp/profile/set",
		  array(
			   ".id" => $obtenerusers[0][".id"],
			    "name" =>  $newname,		  
		        "local-address" => $plocal,
		        "remote-address" => $premoto,
	            "rate-limit" => $velocidad,	            
			   )
		  );
        echo 1;
		}
}


else {
	
	echo 3;
}
 
 

 ?>