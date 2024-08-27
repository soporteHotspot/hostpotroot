<?php
session_start();


 if(isset($_SESSION['nombre'])) 
 {  $idusuario=$_SESSION['nombre'];
} 
else 
{  $idusuario= $_SESSION['username'];} 

     $colorpanel=$_POST['id']; 
     $coloraside=$_POST['aside'];

    
    require("../../require/connect_db.php");
    $checkid=mysqli_query($mysqli,"SELECT * FROM estilo WHERE id='$idusuario'");
    $check=mysqli_num_rows($checkid);   
    if($check==1){


    $sentencia1="UPDATE `estilo` SET colorpanel='$colorpanel', coloraside='$coloraside' WHERE id='$idusuario'";
 
    $resent1=mysqli_query($mysqli,$sentencia1);
    if ($resent1==null) {
 
        echo  2 ;
    }else {echo  1 ;   
}

}
            
            else { 
                $sentencia1="INSERT INTO `estilo` (`id`,`colorpanel`,`coloraside`) VALUES ('$idusuario','$colorpanel','$coloraside')";
 
    $resentx=mysqli_query($mysqli,$sentencia1);
    if ($resentx==null) {
 
        echo  2 ;
    }else {echo  1 ;   
}
 
                

}


?>