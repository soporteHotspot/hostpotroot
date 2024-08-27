

	 
       
<?php
//include("connect_db.php");

//$miconexion = new connect_db;



	require("../required/connect_db.php");
	$username=$_POST['user'];
	$pass=$_POST['password'];
	$sql=mysqli_query($mysqli,"SELECT * FROM conglomerista WHERE email='$username' || phone='$username'");
	if($fix=mysqli_fetch_assoc($sql)){
		$passuser=$fix['masterkey'];	
		$iduser=$fix['id'];	
		if(password_verify($pass,$passuser)){

			$checkname=mysqli_query($mysqli,"SELECT * FROM sesiones WHERE id='$iduser'");
	        $checkn=mysqli_num_rows($checkname);
	        if($checkn>0){
	        $data=0;			
				echo json_encode($data);
			} else {     
			          session_start();
						$_SESSION['id']=$fix['id'];
						$_SESSION['user']=$fix['name'];			
						$_SESSION['password']=$fix['masterkey'];
						$_SESSION['email']=$fix['email'];
						$_SESSION['telefono']=$fix['phone'];
						$_SESSION['rol']=20;
						$_SESSION['validar']=500;
						 
$id = $_SESSION['id'];
$usuario = $_SESSION['user'];
$username = $_SESSION['email'];
$password = $_SESSION['password'];
$telefono=$_SESSION['telefono'];
$rol=$_SESSION['rol'];
require("../required/connect_db.php"); 
mysqli_query($mysqli,"INSERT INTO `sesiones` (`id`, `id_usuario`, `email`, `telefono`, `password`, `rol`, `idempresa`) VALUES('$id', '$usuario', '$username', '$telefono', '$password', '$rol', '$id')");
//mysqli_query($mysqli,"INSERT INTO `eventos`(`id`, `hora`, `fecha`, `evento`, `tipo`) VALUES('', '$hora', '$fecha', '$username inicio sesión en el sistema', 'success')");
$data = array('login' => $rol,'usuario' => $usuario, );

				
				echo json_encode($data);
					}
					}
		
		else{$data=5;				
				echo json_encode($data);
			//mysqli_query($mysqli,"INSERT INTO `eventos`(`id`, `hora`, `fecha`, `evento`, `tipo`) VALUES('', '$hora', '$fecha', '$username intentó ingresar al sistema con contraseña incorrecta ', 'warning')");
		}
	}else{
		
		$data=3;				
				echo json_encode($data);
//mysqli_query($mysqli,"INSERT INTO `eventos`(`id`, `hora`, `fecha`, `evento`, `tipo`) VALUES('', '$hora', '$fecha', '$username intentó ingresar al sistema sin tener registro ', 'error')");
	}

?>