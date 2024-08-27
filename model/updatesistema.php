<?php
   

 //Fecha Actual       
$no_aleatorio  = mt_rand(1, 100); //Generamos dos Digitos aleatorios
$target_dir = "../logo/";
$targetregister= "logo/";
$source= $_FILES["logo"]["tmp_name"];


$extension  =pathinfo( $_FILES["logo"]["name"], PATHINFO_EXTENSION );
$newnameimg="logo".$no_aleatorio.".".$extension;
$destionation =$target_dir.$newnameimg;
$register=$targetregister.$newnameimg;;
// Permitir ciertos formatos de archivo

	
	$logo=$register;
	$id=1;
	$nombre=$_POST['nameempresa'];
	$iduser=$_POST['idusuario'];
	$idpass=$_POST['idpassword'];	
	$texto= $_POST['texto'];
	$zone= $_POST['zonahoraria'];
	$moneda= $_POST['moneda'];
	$modo= $_POST['modo'];
	
require("../require/connect_db.php");
 
 	
				
				if (empty($source))
				{
require("../require/connect_db.php");
mysqli_query($mysqli,"UPDATE sistema set sistema='$nombre',idusuario= '$iduser',idpassword='$idpass',texto='$texto', zona='$zone', moneda='$moneda', modo='$modo' WHERE id='$id'");
$data=1;

print json_encode($data);
			
			}
				
				else {
					
					if($extension != "jpg" && $extension != "png") {
$data=3;

print json_encode($data); 
}
					
				 require("../require/connect_db.php");
				$sqle=("SELECT * FROM sistema WHERE id=$id");
				     $query=mysqli_query($mysqli,$sqle);
				     while($arreglo=mysqli_fetch_array($query)){					 
					 $imgactual="../".$arreglo["logo"];					 
				     }
		
		if (file_exists($imgactual)) 
		{   
       unlink($imgactual);
	   } 
			$img =$register;	
move_uploaded_file($source, $destionation);
mysqli_query($mysqli,"UPDATE sistema set sistema='$nombre',logo='$logo',idusuario= '$iduser',idpassword='$idpass',texto='$texto'  WHERE id='$id'");
$data=1;

print json_encode($data);

				}
		

?>
