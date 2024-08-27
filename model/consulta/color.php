<?php
require("./../../require/connect_db.php");
session_start();

 if(isset($_SESSION['nombre'])) 
 {  $id=$_SESSION['nombre'];
} 
else 
{   $id=$_SESSION['username'];} 
 
$sql = "SELECT * FROM estilo WHERE id='$id'";
$res = $mysqli->query($sql);
$data = $res->fetch_array();



echo json_encode($data);
?>