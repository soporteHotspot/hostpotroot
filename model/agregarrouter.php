	 
<?php


                $ip=$_POST['dirip'];	
				$nombrerouter=$_POST['userm'];
				$username=$_POST['nombre'];	
				$password=$_POST['password'];
				$puerto=$_POST['puerto'];
				$ids=$_POST['sucursal'];
				
 



 require("../require/connect_db.php");


$checkreg=mysqli_query($mysqli,"SELECT * FROM routerboard WHERE usuario='$username' AND ip='$ip'" );


	$check_reg=mysqli_num_rows($checkreg);	
 
			if($check_reg>0){
 $data=3;
echo json_encode($data);



}

else {
 require("../require/connect_db.php");
$insdata=mysqli_query($mysqli,"INSERT INTO `routerboard` (`ip`, `nombre`, `usuario`, `password`, `puerto`, `idsucursal`) VALUES ('$ip', '$nombrerouter', '$username', '$password', '$puerto', '$ids')");

   if($insdata==null){
$data=7;
echo json_encode($data);

        }
      else{  $data=5;
echo json_encode($data);}
}

	
?>
 