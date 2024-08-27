 <?php

require_once '../require/routerboard.phar';

 $ip =$_SESSION['ip'];
 $Usuario=$_SESSION['username'];
 $idsucursal=$_SESSION['idsucursal'];


function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES"; }
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 

 
				require("../require/connect_db.php");
				
				$sql11 = "SELECT COUNT(*) total FROM botones where mikrotik='$ip'";
$result = mysqli_query($mysqli, $sql11);
$datos = mysqli_fetch_assoc($result);
$Totalreg=$datos['total'];


 function rndRGBColorCode()
    {
        return 'rgb(' . rand(50, 200) . ',' . rand(45, 100) . ',' . rand(100, 200) . ')'; #using the inbuilt random function
    }


 
					
					 ?>
					 
					 <!-- Default box -->
      <div id="contsistema" class="card p-2 ">
       
       
 

 
<?php

require("../require/connect_db.php");

  
       
              $obtenerdah=("SELECT * FROM sistema");
              $datax=mysqli_query($mysqli,$obtenerdah);    
              $datam=mysqli_fetch_array($datax);             
              $moneda=$datam['moneda'];


        $obtenerda=("SELECT * FROM botones  where mikrotik='$ip' AND idsucursal='$idsucursal'");
$datax=mysqli_query($mysqli,$obtenerda); 
        $Totalreg=mysqli_num_rows($datax);  
if ($Totalreg>0){
 
		
echo '<div class="row">';
				while($data=mysqli_fetch_array($datax)){
				
					 					 $background_colors = array('bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning' , 'bg-info' , 'bg-dark' );

$rand_background = $background_colors[array_rand($background_colors)];
					 $id=$data['id'];
					 $nombre=$data['nombre'];
					  $sistema=$data['perfil'];
					 if (isset($data['tiempo'])){     
     $ltiempo=converttime($data['tiempo']);
     
    }
    else {
      $ltiempo ="Ilimitado";
    }
             $price=$data['precio'];

					   $price=number_format($data['precio'],2,".",",");

					   
echo '  <div limittime="'.$ltiempo.'" id="'.$id.'" style="cursor:pointer" title="Generar usuario de '.$ltiempo.'"   class="agregarventa form-group rounded col-lg-2 col-6  bg-success p-2 border text-center mb-0">




<div class="inner">
<div class="d-flex flex-row-reverse  ">

<span   class=" badge bg-warning   ">'.$moneda.' '.$price.'</span>
 
              
      </div> 
<div id="evento'.$id.'" class="d-flex justify-content-center  ">

<i class="iconos rounded-circle p-2 fas fa-2x fa-hand-pointer border border-light"></i>
              
      </div> 
<span id="namerb" class="info-box-number "> '.$nombre.'</span>
</div>
 
 
 
 
</div>
';
}
echo '</div>';

}

else {
	
	echo '<div class="alert alert-warning mt-4" role="alert">
  No hay datos para mostrar


</div>';
}
?>
	<!-- Button trigger modal -->

 


	  
        <!-- /.card-body -->
       
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->