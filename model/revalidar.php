

	 
       
<?php
 


    session_start();
    $usuario = $_SESSION['user'];
	require("../required/connect_db.php");
	$username=$_POST['user'];
	$pass=$_POST['password'];
	$sql=mysqli_query($mysqli,"SELECT * FROM sesiones WHERE email='$username'");
	if($fix=mysqli_fetch_assoc($sql)){
		$passuser=$fix['password'];
		$rol=$fix['rol'];			
		if(password_verify($pass,$passuser)){
			 $data = array('login' => $rol,'usuario' => $usuario, );
			echo json_encode($data);
		}
		
		else{
			$data= 5;	
			echo json_encode($data);
		}
	}else{
		
		$data= 3;	
		echo json_encode($data);

	}

?>