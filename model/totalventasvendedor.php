<?php

 
$vendedor =$_POST['nombre'];
$mikrotik =$_POST['mikrotik'];
 
 
require("../require/connect_db.php");   
$sqlp="SELECT SUM(precio) as TotalCant FROM fichas where vendedor='$vendedor'";
$resultadop=$mysqli-> query($sqlp);
$filap=$resultadop->fetch_assoc();
$Totalservicios=$filap['TotalCant'];

echo json_encode($Totalservicios);
?>


