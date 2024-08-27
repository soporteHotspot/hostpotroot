<?php

 
       
require_once("../require/connect_db.php");
       

	 
$sql11 = "SELECT COUNT(*) total FROM fichas";
$result = mysqli_query($mysqli, $sql11);
$serv = mysqli_fetch_assoc($result);
$idss=$serv['total'];

echo json_decode($idss);
 ?>
 