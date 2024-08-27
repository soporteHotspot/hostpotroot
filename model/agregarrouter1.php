<?php
        
        $ip=$_POST['dirip'];	
				$nombrerouter=$_POST['userm'];
				$username=$_POST['nombre'];	
				$password=$_POST['password'];
				$puerto=$_POST['puerto'];

        $rnd  = mt_rand(1, 9);//Generamos dos Digitos aleatorios primarios
				$id= $rnd.date("dmYhis");
				
			
                  		    	
				
	require("../require/connect_db.php");	
	
	
	 //reseteo de ids
$sql11 = "SELECT COUNT(*) total FROM routerboard";
$result = mysqli_query($mysqli, $sql11);
$serv = mysqli_fetch_assoc($result);
$idss=$serv['total'];

if($idss>=0){ 
mysqli_query($mysqli,"ALTER TABLE routerboard AUTO_INCREMENT =1");

}

//fin de resteo;
	
	$checkname=mysqli_query($mysqli,"SELECT * FROM routerboard WHERE ip='$ip' and nombre='$userm'");
	$checkname=mysqli_num_rows($checkname);	
	if($checkname>0){
				
				
				echo '<div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
  <strong>Alerta! </strong>  Ya se encuantra registrado un usuario del mismo nombre con este ip IP: '.$ip.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
		
 
			' ;
			}
			
			else {
				
				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO routerboard VALUES('$id', '$ip', '$nombrerouter', '$username', '','$puerto')");
				echo '<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
  <strong>Correcto</strong>  Se ha agregado '.$ip.'-'.$nombrerouter.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;}


?>