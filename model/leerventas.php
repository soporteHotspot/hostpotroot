<?php  

require("../require/connect_db.php"); 






$sqlp="SELECT SUM(precio) as TotalCant FROM fichas";
$resultadop=$mysqli-> query($sqlp);
$filap=$resultadop->fetch_assoc();
$Totalservicios=$filap['TotalCant'];
$valornull="0";
if (isset($Totalservicios) ){ 
	echo  json_decode($Totalservicios); 
 } 

 else {
 	echo json_decode($valornull);
 }

 ?>