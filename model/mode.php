

	 
       
<?php

session_start();




 
 require("../required/connect_db.php");

                $sql=("SELECT * FROM sistema");
 
                $query=mysqli_query($mysqli,$sql);           
                $arreglo=mysqli_fetch_array($query);
                @$zonaempresa=$arreglo["zona"];             
                if (isset($zonaempresa)) {
                    date_default_timezone_set($zonaempresa); 
}
     $fecha= date("Ymd");
     $hora= date("H:i:s");



	require("../required/connect_db.php");
 
	$empresa=$_POST['empresa'];
	$rol=1;
	$iduser=$_SESSION['id'];
 

			$checkname=mysqli_query($mysqli,"SELECT * FROM sesiones WHERE id='$iduser'");
	        $checkn=mysqli_num_rows($checkname);
	        if($checkn==0){
	        $data=0;			
				echo json_encode($data);
			}  

			else{
				require("../required/connect_db.php");
$sentencia="UPDATE sesiones set rol='$rol', idempresa='$empresa' WHERE id='$iduser'";	
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {		
	$data=3;			
				echo json_encode($data);
	}else {
		 $_SESSION['idempresa'] = $empresa;
         $_SESSION['rol'] = $rol;
		
		$data=1;			
				echo json_encode($data);

		


			}}
?>