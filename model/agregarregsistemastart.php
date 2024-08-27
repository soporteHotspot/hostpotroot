<?php
require("../require/connect_db.php");
$sql11 = "SELECT COUNT(*) total FROM sistema";
$result = mysqli_query($mysqli, $sql11);
$serv = mysqli_fetch_assoc($result);
$idss=$serv['total'];

if($idss>=1){
 $data=7;

 print json_encode($data);
	}  

else {
$targetregister="logo/";
$target_dir = "../logo/";

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

 //Fecha Actual       
$no_aleatorio  = mt_rand(10, 1000); //Generamos dos Digitos aleatorios
$extension  ='.'. pathinfo( $_FILES["logo"]["name"], PATHINFO_EXTENSION );
$newname="logo".$no_aleatorio.$extension;
$source       = $_FILES["logo"]["tmp_name"];
$destionation = $target_dir.$newname;	
$register=$targetregister.$newname; 

$target_file = $target_dir . basename($_FILES["logo"]["name"]);//se añade el directorio y el nombre del archivo
$uploadOk = 1;//se añade un valor determinado en 1
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Comprueba si el archivo de imagen es una imagen real o una imagen falsa


// Permitir ciertos formatos de archivo
if($imageFileType != "jpg" && $imageFileType != "png") {

  $data=9;

 print json_encode($data);
	
  /// imágen no procesada soportada solo  png jpg 
   
    
}
//Comprueba si $ uploadOk se establece en 0 por un error
else {
    if (move_uploaded_file($source, $destionation)){
		
		       $logo=$register;		    	
		    	$nombre=$_POST['nameempresa'];
				$iduser=$_POST['idusuario'];
				$idpass=$_POST['idpassword'];
				$text=$_POST['texto'];
                $zone=$_POST['zonahoraria'];

                $moneda=$_POST['moneda'];
                $modo=$_POST['modo'];
		    			
					
				
require("../require/connect_db.php");


		
	$insertdata= mysqli_query($mysqli,"INSERT INTO `sistema` (`id`, `sistema`, `logo`, `idusuario`, `idpassword`, `texto`, `zona`, `moneda`, `modo`)  VALUES ('1','$nombre','$logo','$iduser', '$idpass','$text','$zone', '$moneda', '$modo')");	


  if($insertdata)	{

    $data=1;

 print json_encode($data);
  }

  else {
$data=3;

 print json_encode($data);

  }
     
    } 





}


}
?>
