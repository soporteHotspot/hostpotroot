<?php
 
session_start();
if (@!$_SESSION['ip']) {
  header("Location:login");
}

 
 
$pdf=$_GET['pdf'];
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=".$pdf);
readfile("../voucher/".$pdf);

?>