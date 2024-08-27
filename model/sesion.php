


	 
       
<?php
 


 
	require("../required/connect_db.php");

	$username=$_POST['user'];
	$pass=$_POST['password'];
	
	$sql=mysqli_query($mysqli,"SELECT * FROM sesiones WHERE email='$username' || telefono='$username'");
	
	
	if($f=mysqli_fetch_array($sql)){
		$passuser=$f['password'];	
		$id=$f['id'];	

		$data=$f['rol'];		
		if(password_verify($pass,$passuser)){
			$sqlborrar="DELETE FROM sesiones WHERE id='$id'";	
			            session_destroy();
			            $sql = "DELETE  FROM sesiones WHERE id='$id'";
$res = $mysqli->query($sql);
if($res){
    echo $data ;
}else{
    echo 4;
}

						 		
						
		}else{
			echo 5;
		
			
		}


	}


else{
		
		echo 3;

	}
?>