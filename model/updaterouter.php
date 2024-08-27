<?php


extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
require("../require/connect_db.php");
	
	$sentencia="update routerboard set ip='$ip', nombre='$nombre', usuario='$usuario', password='$password', puerto='$puerto', idsucursal='$sucursal' WHERE id='$id'";	
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

