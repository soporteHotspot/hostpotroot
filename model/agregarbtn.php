	 
<?php
session_start();
$ids= $_POST['sucursal'];
$nombre= $_POST['nombre'];

$servidor= $_POST['servidor'];
$perfil= $_POST['perfil'];
$tiempo= $_POST['tiemponumber'].$_POST['tiempoword'];
$precio= $_POST['precio']; 
$longitud= $_POST['longitud']; 

 $ip =$_SESSION['ip'];




 require("../require/connect_db.php");


$checkreg=mysqli_query($mysqli,"SELECT * FROM botones WHERE nombre='$nombre' AND mikrotik='$ip' AND idsucursal='$ids'" );


	$check_reg=mysqli_num_rows($checkreg);	
 
			if($check_reg>0){
 $data=3;
echo json_encode($data);



}

else {

$insdata=mysqli_query($mysqli,"INSERT INTO `botones` (`nombre`, `server`, `perfil`, `tiempo`, `precio`, `legend`, `mikrotik`, `idsucursal`) VALUES ('$nombre', '$servidor', '$perfil', '$tiempo', '$precio',  '$longitud', '$ip',$ids)");

   if($insdata==null){
$data=7;
echo json_encode($data);

        }
      else{  $data=5;
echo json_encode($data);}
}

	
?>
 