	 
<?php

require("../require/connect_db.php");

	 //reseteo de ids
$sql11 = "SELECT COUNT(*) total FROM cortes";
$result = mysqli_query($mysqli, $sql11);
$serv = mysqli_fetch_assoc($result);
$idss=$serv['total'];

if($idss>=0){ 
mysqli_query($mysqli,"ALTER TABLE cortes AUTO_INCREMENT =1");

}

//fin de resteo;
       
        $obtenerda=("SELECT * FROM sistema");
    $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        
$zone=$data['zona'];
date_default_timezone_set($zone);
$mikrotik= $_POST['mikrotik'];

$hora=date("his");
$fecha=date("Y-m-d");
 
$cantidad= $_POST['total'];
$responsable= $_POST['responsable'];
$vendedor= $_POST['vendedor'];
$porcentaje= $_POST['porcentaje'];
$comision= $_POST['comision'];
$restante= $_POST['diferencia'];
//$namefile="presa";
 


require("../require/connect_db.php");
include_once("../voucher/generatepdfcorte.php");




$insdata= mysqli_query($mysqli,"INSERT INTO `cortes`(`hora`, `fecha`, `cantidad`, `responsable`, `vendedor`, `porcentaje`, `comision`, `restante`, `estado`, `nota`) VALUES ('$hora','$fecha', '$cantidad', '$responsable', '$vendedor', '$porcentaje', '$comision', '$restante', 'pagado','$namefile')");

 



 if($insdata){


require("../require/connect_db.php");
      	$insdatax=mysqli_query($mysqli,"DELETE FROM fichas WHERE vendedor='$vendedor'");
        $data=5;
echo json_encode($data);


        }
      else{

$data=7;
echo json_encode($data);

}

?>
 
