<?php
                require_once '../require/routerboard.phar';
                
       require_once("../require/connect_db.php");
        $obtenerda=("SELECT * FROM sistema");
        $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);        
        $zone=$data['zona'];
        date_default_timezone_set($zone);
        $fecha=date("d-m-Y");
        $ip =$_SESSION['ip'];
        $idsucursal=$_POST['sucursal'];
        $servidor= $_POST['servidor']; 
        $profile=$_POST['perfil']; 
        $limituptime=$_POST['tiemponumber'].$_POST['tiempoword'];
        $comment=$_POST['comentario'];
        $des=$_POST['descripcion'];
        $des = str_replace(' ', '-', $des);


      
				
			
 
	
	
	 //reseteo de ids
$sql11 = "SELECT COUNT(*) total FROM cards";
$result = mysqli_query($mysqli, $sql11);
$serv = mysqli_fetch_assoc($result);
$idss=$serv['total'];

if($idss>=0){ 
mysqli_query($mysqli,"ALTER TABLE cards AUTO_INCREMENT =1");

}

//fin de resteo;
	
	$checkname=mysqli_query($mysqli,"SELECT * FROM cards WHERE limituptime='$limituptime' and descripcion='$des' and mikrotik='$ip'and idsucursal='$idsucursal'");
	$checkname=mysqli_num_rows($checkname);	
	if($checkname>0){
				
				
				$data=3;
echo json_encode($data);
			}
			
			else {
				
				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				
				$insdata= mysqli_query($mysqli,"INSERT INTO `cards` (`server`, `profile`, `limituptime`, `comment`, `mikrotik`, `descripcion`, `idsucursal`) VALUES ('$servidor', '$profile', '$limituptime', '$comment','$ip','$des','$idsucursal')");


        if($insdata==null){
$data=7;
echo json_encode($data);

        }
			else{  $data=5;
echo json_encode($data);}


}


?>
