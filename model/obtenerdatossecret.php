<?php

require_once '../require/routerboard.phar';
 

 if ($API->connect($ip,$Usuario,$password)) {
	
$user=$_POST['secret'];

	        $obtenerusers = $API->comm("/ppp/secret/print", array(
            "?name" => $user,
            ));
			if ($obtenerusers[0][".id"]==""){
				$data=2;
				echo json_encode($data);
			}
			else {
				$name=$obtenerusers[0]["name"];
				$password=$obtenerusers[0]["password"];
				$perfil=$obtenerusers[0]["profile"];
				$com =$obtenerusers[0]["comment"];				 
			    $data =array('user'=> $name,
			    	'password'=> $password,
				            'perfil' => $perfil,
				           'comment' => $com,);	            

				echo json_encode($data);
		 
		 }
}


else { $data=3;
	
	echo json_encode($data);
}
 
 

 ?>