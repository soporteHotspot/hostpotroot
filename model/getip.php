<?php 

session_start();
$data=$_SESSION['ip'];

print json_encode($data);




 ?>