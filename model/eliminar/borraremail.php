<?php
require("../../require/connect_db.php");




$id=$_POST['datadelete'];
 $check=mysqli_query($mysqli,"SELECT * FROM mailer WHERE id='$id'");
  $check_data=mysqli_num_rows($check);  
  
      if($check_data==0){        

echo 2; 
      }

else{
$sql = "DELETE  FROM mailer WHERE id='$id'";
$res = $mysqli->query($sql);
if($res){
    echo 1 ;
}else{
    echo 3;
}
}

?>