<?php


 	

$id= $_POST['idbtn'];
$nombre= $_POST['nombre'];
$serverhp= $_POST['Servidorhp'];
$profile= $_POST['perfil'];
$tiempo= $_POST['tiempo'];
$precio= $_POST['precio']; 
$sucursal= $_POST['sucursal'];
$longitud= $_POST['longitud']; //extraer todos los valores del metodo post del formulario de actualizar
require("../require/connect_db.php");
	
	$sentencia="UPDATE botones set nombre='$nombre', server='$serverhp', perfil='$profile',  tiempo='$tiempo', precio='$precio', legend='$longitud', idsucursal='$sucursal' WHERE id='$id'";	
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {

	$data=3;

		echo  json_encode($data);
	}else {
		
	$data=1;

		echo  json_encode($data);
		
	}
?>

