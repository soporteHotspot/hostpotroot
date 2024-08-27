
   <section   class="content">
 
        <div class="row">


    <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info "><i class="fa  fa-calendar-week  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Fecha del sistema </span>
                <span class="info-box-number">
<?php  
require("../require/connect_db.php");
 function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES"; }
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 

       
        $obtenerda=("SELECT * FROM sistema");
    $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        
             $zone=$data['zona'];
              $moneda=$data['moneda'];

date_default_timezone_set($zone);
$fecha=date("d-m-Y"); 

require_once '../require/routerboard.phar';
$vendedor =$_SESSION['username'];



  if (isset($fecha) ){ echo  
        $fecha; 
        } else {echo "$ 0.00";}  ?> </span>
              </div>
              <!-- /.info-box-content text-dark -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->










        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-cash-register  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Ventas de hoy </span>
                <span class="info-box-number">
<?php  
$fecha=date("d-m-Y"); 

require("../require/connect_db.php");   
$sqlp="SELECT SUM(precio) as TotalCant FROM fichas where fecha='$fecha'";
$resultadop=$mysqli-> query($sqlp);
$filap=$resultadop->fetch_assoc();
$Totalservicios=$filap['TotalCant'];



  if (isset($Totalservicios) ){ echo  
        $moneda.' '.$Totalservicios; 
        } else {echo "$ 0.00";}  ?> </span>
              </div>
              <!-- /.info-box-content text-dark -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->










            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-cash-register  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Recaudacion </span>
                <span class="info-box-number">
<?php  
$fecha=date("d/m/Y"); 
require("../require/connect_db.php");   
$sqlp="SELECT SUM(precio) as TotalCant FROM fichas";
$resultadop=$mysqli-> query($sqlp);
$filap=$resultadop->fetch_assoc();
$Totalservicios=$filap['TotalCant'];


  if (isset($Totalservicios) ){ echo  
        $moneda.' '.$Totalservicios; 
        } else {echo "$ 0.00";}  ?> </span>
              </div>
              <!-- /.info-box-content text-dark -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->



                 <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fa fa-address-card  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Cant. Consumidos </span>
                <span class="info-box-number"><?php
 
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on



 
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
  
 
 

   $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
           
            "?disabled" => "true",
           
            ));

    
    $TotalReg = count($obtenerusers);


 if ($TotalReg<1){
        echo " 0";

    }
else {

 

 echo $TotalReg;

}
}

else {
  
 echo $moneda." 0";
}

 ?> </span>
              </div>
              <!-- /.info-box-content text-dark -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


  <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-money-bill-alt  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Consumo global  </span>
                <span class="info-box-number">
<?php
 
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on



 
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
  
 
 

   $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
           
            "?disabled" => "true",
           
            ));

    
    $TotalReg = count($obtenerusers);


 if ($TotalReg<1){
        echo $moneda." 0";

    }
else {
$comentarioy=0;
for ($i = 0; $i < $TotalReg; $i++) {   
  $users = $obtenerusers[$i];
  
   
     
    if (isset($users['comment'])){          
      $comentariox =$users['comment'];
      $comentario2=explode(" ",$comentariox);
      $comentarioy+=(int)$comentario2[0];
 
      
    }
    else {
      $comentarioy =0;
    }
  
  
   
  
   
}

 echo $moneda." ". number_format($comentarioy,1);

}}

else {
  
 echo $moneda." 0";
}

 ?> de <?php
 
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on



 
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
  
 
 

   $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
           
            
           
            ));

    
    $TotalReg = count($obtenerusers);


//$i = 1;

//while ( $i <= $TotalReg) {
$totalneto=0;
for ($i = 0; $i < $TotalReg; $i++) {   
  $users = $obtenerusers[$i];
  
   
     
    if (isset($users['comment'])){      
      $comentariox =$users['comment'];
      $comentario2=explode(" ",$comentariox);
      $totalneto+=(int)$comentario2[0];
 
      
    }
    else {
      $totalneto=0;
    }
  
   
  
   
}

 echo $moneda." ". number_format($totalneto,1);

}

else {
  
 echo $moneda." 0";
}

 ?> </span>
              </div>
              <!-- /.info-box-content text-dark -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->





    <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning "><i class="fa fa-money-bill-alt  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text"> Consumidos </span>
                <span class="info-box-number">
<?php
 
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on



 
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
  
 


   $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
           ".proplist" => "uptime,limit-uptime,comment,disabled",
            "?disabled" => "true",
            
            ));

    
    $TotalReg = count($obtenerusers);


 


      if ($TotalReg<1){
          echo $moneda. " 0";

    }


    else {


//$i = 1;

//while ( $i <= $TotalReg) {
$suma1=0;
for ($i = 0; $i < $TotalReg; $i++) {   


  $users = $obtenerusers[$i];
 
 if (isset($users['comment'])){
$comentariox =$users['comment'];
$comentario2=explode(" ",$comentariox);
$comentario=(int)$comentario2[1];    
      
    }
    else {
      $comentario ="";
    }



if($vendedor==$comentario){
 
     
    if (isset($users['comment'])){
      $comentariomm =$users['comment'];
      $int=explode(" ",$comentariomm);
      $suma1+=$int[0]; 

      
    }
    else {
      $suma1 =0;
    }
  
     
}}

 echo $moneda." ". number_format($suma1,1);

}}

else {
  
  echo $moneda."0.0";
}

 ?> de <?php
 
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on



 
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
  
 


   $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
           
            
            
            ));

    
    $TotalReg = count($obtenerusers);


      $TotalReg = count($obtenerusers);


      if ($TotalReg<1){
         echo "0.0";

    }


    else {


//$i = 1;

//while ( $i <= $TotalReg) {
$suma=0;
for ($i = 0; $i < $TotalReg; $i++) {   


  $users = $obtenerusers[$i];
 if (isset($users['comment'])){
    $comentariox =$users['comment'];
$comentario2=explode(" ",$comentariox);
$comentario=$comentario2[1];     
      
    }
    else {
      $comentario ="";
    }



if($vendedor==$comentario){
 
     
    if (isset($users['comment'])){
      $comentariomm =$users['comment'];
      $int=explode(" ",$comentariomm);
      $suma+=(int)$int[0];      
      
    }
    else {
      $comentario =0;
    }
  
     
}}

 echo $moneda." ". number_format($suma,1);

}}

else {
  
  echo $moneda." 0.0";
}

 ?></span>
              </div>
              <!-- /.info-box-content text-dark -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->






    <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning "><i class="fa fa-money-bill-alt  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text"> Por consumirse </span>
                <span class="info-box-number">
<?php
 
require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on



 
 
 
//Use any PEAR2_Net_RouterOS class from here on
if ($API->connect($ip,$Usuario,$password)) {
  
 


   $obtenerusers = $API->comm("/ip/hotspot/user/getall", array(
           
             "?disabled" => "false",
            
            ));

    
    $TotalReg2 = count($obtenerusers);


       


      if ($TotalReg2<1){
          echo $moneda." 0";

    }


    else {


//$i = 1;

//while ( $i <= $TotalReg) {
$suma2=0;
for ($i = 0; $i < $TotalReg2; $i++) {   


  $users = $obtenerusers[$i];


 if (isset($users['comment'])){
$comentariox =$users['comment'];
$comentario2=explode(" ",$comentariox);
$comentario=$comentario2[1];    
      
    }
    else {
      $comentario ="";
    }

if($vendedor==$comentario){
  //start condition
 
     
   


 
 

 



    $comentarios =$users['comment'];
      $int=explode(" ",$comentarios);
      $suma2+=(int)$int[0]; 
 
      

      
  


  //start condition
     
}  


}

 echo $moneda." ". number_format($suma2,2); 

}}

else {
  
   echo $moneda." 0";
}

 ?> </span>
              </div>
              <!-- /.info-box-content text-dark -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->






 </div>
    </section>
    <!-- secion de contenido body -->





