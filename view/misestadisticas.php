
 

   <section   class="content"> 
        <div class="row">
    <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-purple "><i class="fa  fa-calendar-week  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Fecha del sistema </span>
                <span class="info-box-number">


<?php  
require("../require/connect_db.php");


       
        $obtenerda=("SELECT * FROM sistema");
    $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        
             $zone=$data['zona'];
             $moneda=$data['moneda'];

date_default_timezone_set($zone);
$fecha=date("d/m/Y"); 

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
              <span class="info-box-icon bg-purple "><i class="fa fa-cash-register  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Ventas de hoy </span>
                <span class="info-box-number">
<?php  
$fecha=date("d/m/Y"); 

require("../require/connect_db.php");   
$sqlp="SELECT SUM(precio) as TotalCant FROM fichas WHERE fecha='$fecha' and vendedor='$vendedor'";
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
              <span class="info-box-icon bg-purple "><i class="fa fa-cash-register  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text">Recaudacion </span>
                <span class="info-box-number">
<?php  
$fecha=date("d/m/Y"); 
require("../require/connect_db.php");   
$sqlp="SELECT SUM(precio) as TotalCant FROM fichas where vendedor='$vendedor'";
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
              <span class="info-box-icon bg-warning "><i class="fa fa-money-bill-alt  "></i></span>

              <div class="info-box-content text-dark">
                <span class="info-box-text"> Consumidos</span>
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

for ($i = 0; $i < $TotalReg; $i++) {   


  $users = $obtenerusers[$i];

$comentariox =$users['comment'];
$comentario2=explode(" ",$comentariox);
$comentario=$comentario2[1];


if($vendedor==$comentario){
 
     
    if (isset($users['comment'])){
      $comentariomm =$users['comment'];
      $int=explode(" ",$comentariomm);
      $suma1+=$int[0];      
      
    }
    else {
      $suma1 ="0";
    }
  
     
}}

 echo $moneda." ". $suma1;

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


      if ($TotalReg<1){
         echo $moneda. " 0";

    }


    else {


//$i = 1;

//while ( $i <= $TotalReg) {
$suma=0;
for ($i = 0; $i < $TotalReg; $i++) {   


  $users = $obtenerusers[$i];
  if(isset($users['comment']))

{$comentariox =$users['comment'];}

else{
$comentariox ="";

}


$comentario2=explode(" ",$comentariox);

if(isset($comentario2[1]))

{$comentario=$comentario2[1];}


if($vendedor==$comentario){
 
     
    if (isset($users['comment'])){
      $comentariomm =$users['comment'];
      $int=explode(" ",$comentariomm);
      $suma+=$int[0];      
      
    }
    else {
      $comentario ="";
    }
  
     
}}

 echo $moneda." ". $suma;

}}

else {
  
  echo $moneda." 0";
}

 ?></span>
              </div>
              <!-- /.info-box-content text-dark -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


 </div>
    </section>
    <!-- secion de contenido body -->






