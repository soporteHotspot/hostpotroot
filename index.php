



<?php 
session_start();

if (!is_file("require/connect_db.php")) {
   include_once("crearbasededatos.php");
// fopen($fileconect, 'w');
   return false;
  
}

else{
require("require/connect_db.php");   
  
$checkreg=mysqli_query($mysqli,"SELECT * FROM sistema" );
	$check_reg=mysqli_num_rows($checkreg);	
 
			if($check_reg==0){
include_once("includes/agregarsistema.php");
			 }


			  else {

$checkregs=mysqli_query($mysqli,"SELECT * FROM sucursal" );
	$check_regs=mysqli_num_rows($checkregs);	
 
			if($check_regs==0){
include_once("includes/agregarsucursal.php");
			 }


			  	else {if (!$_SESSION['numero']) {
  header("Location:login");
}
else if ($_SESSION['numero']==2) {
  header("Location:puntodeventa");
}

else if ($_SESSION['numero']==1) {
  header("Location:dashboard");
}
 
}










			  }





}

 

?> 
