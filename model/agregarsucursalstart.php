<?php
	
		    	
		    $nombre=$_POST['nombresucursal'];
				
				$dir=$_POST['direccioncursal'];
				$texto=$_POST['texto'];


				
require("../require/connect_db.php");


		
	$ejecutar= mysqli_query($mysqli,"INSERT INTO `sucursal` (`nombre`, `direccion`, `texto`)  VALUES ('$nombre','$dir','$texto')");	

  if 	($ejecutar)
  {
$data =1;
  print  json_encode($data) ;
    } else {
        $data=3;

        print json_encode($dta);
    }




?>
