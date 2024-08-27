<?php
require("../require/connect_db.php");

$id=$_POST['datadelete'];
$sql = "DELETE  FROM fichas WHERE id='$id'";
$res = $mysqli->query($sql);
if($res){
    echo 1 ;
}else{
    echo 3 ;
}
?>
 