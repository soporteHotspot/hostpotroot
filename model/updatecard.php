<?php
$id=$_POST['id'];
$servidor=$_POST['servidor'];
$profile=$_POST['perfil'];
$precio=$_POST['precio'];
$descripcion=$_POST['descripcion'];
$time=$_POST['tiempo'];
 

extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
require("../require/connect_db.php");
	
	$sentencia="update cards set server='$servidor', profile='$profile', limituptime='$tiempo', comment='$precio', descripcion='$descripcion', idsucursal='$sucursal' WHERE id='$id'";	
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {

	$data=3;		
		echo json_encode($data);
	}else {
		
		$data=1;		
		echo json_encode($data);

		
	}
?>

