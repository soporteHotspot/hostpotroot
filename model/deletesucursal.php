<?php
require("../require/connect_db.php");

$id=$_POST['id'];


 $checkname=mysqli_query($mysqli,"SELECT * FROM cards WHERE idsucursal='$id'");
	$checkname=mysqli_num_rows($checkname);	
	
			if($checkname>=1){


				$data=3;
       print json_encode($data);



			}



else


{
require("../require/connect_db.php");
 $checkid=mysqli_query($mysqli,"SELECT * FROM botones WHERE idsucursal='$id'");
	$check=mysqli_num_rows($checkid);	
	
			if($check>=1){


				$data=7;
       print json_encode($data);



			}

else
{


require("../require/connect_db.php");

	 $checkidr=mysqli_query($mysqli,"SELECT * FROM routerboard WHERE idsucursal='$id'");
	$checkr=mysqli_num_rows($checkidr);	
	
			if($checkr>=1){


				$data=9;
       print json_encode($data);



			}

else

{


	$sql = "DELETE  FROM sucursal WHERE id='$id'";



$res = $mysqli->query($sql);
if($res){

	$data=1;
    print json_encode($data);
}else{
   $data=3;
    print json_encode($data);
}}


}






}


?>
 