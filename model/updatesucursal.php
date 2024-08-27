<?php
   
 
	$id=$_POST['id'];
	$nombre=$_POST['nombresucursal'];
	$DIRSUC=$_POST['direccioncursal'];	
	 $txt=$_POST['texto'];
	
require("../require/connect_db.php");
  
 
$regdata= mysqli_query($mysqli,"UPDATE sucursal SET nombre='$nombre', direccion='$DIRSUC', texto='$txt'  WHERE id='$id'");

if($regdata){

	$data=1;

	print json_encode($data);

}
else {


	$data=3;
		print json_encode($data);

}

				 
		

?>
