<?php

require_once 'require/routerboard.phar';
 

 if ($API->connect($ip,$Usuario,$password)) {
	
$user=$_POST['username'];

	 $obtenerusers = $API->comm("/user/print", array(
            ".proplist" => ".id,name,group,comment",
            "?name" => $user,
            ));
			if ($obtenerusers[0][".id"]==""){
				$data=2;
				echo json_encode($data);
			}
			else {

				$name=$obtenerusers[0]["name"];
				$grupo=$obtenerusers[0]["group"];
				$com =$obtenerusers[0]["comment"];
				 
			$data =array('user'=> $name,
				            'group' => $grupo,
				           'comment' => $com)
				            

				echo json_encode($data);
		 
		 }
}


else { $data=3;
	
	echo json_encode($data);
}
 
 

 ?>