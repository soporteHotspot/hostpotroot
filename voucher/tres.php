<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>card</title>
</head>
<body>

 <link rel="stylesheet" href="../../voucher/estilos/tres.css">
<?php

 
 function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES"; }
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Minutos ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 

if (isset($_POST['opcion'])){
  
require("../require/connect_db.php");

$consult=("SELECT * FROM sistema where  id='1'");
$l=mysqli_query($mysqli,$consult);
$p=mysqli_fetch_array($l);           
$logo='../'.$p['logo']; 
$iduser=$p['idusuario'];  
$idpass=$p['idpassword']; 
$text=$p['texto'];


require("../require/connect_db.php");
require_once '../require/routerboard.phar';

       
              $obtenerda=("SELECT * FROM sistema");
              $datax=mysqli_query($mysqli,$obtenerda);    
              $data=mysqli_fetch_array($datax); 
              $moneda=$data['moneda'];


$usuario=$_SESSION["username"];

   $obteneridsu=("SELECT * FROM routerboard WHERE usuario='$usuario'");
              $datasucursal=mysqli_query($mysqli,$obteneridsu);    
              $datas=mysqli_fetch_array($datasucursal);             
              $idsucursal=$datas['idsucursal'];

             $obteneridsucursal=("SELECT * FROM sucursal WHERE id='$idsucursal'");
              $datasucursal=mysqli_query($mysqli,$obteneridsucursal);    
              $datass=mysqli_fetch_array($datasucursal);             
              $textos=$datass['texto']  ; 
  
require_once '../require/routerboardPDF.phar';
$tipo=$_POST['opcion']; 
$par2=$_POST['parametro']; 
$par = str_replace('`', '"', $par2);

if ($API->connect($ip,$Usuario,$password,$puerto)) {


$obtenervig= $API->comm("/system/schedule/print", array(
            ".proplist" => ".id,name,start-date,start-time",
            "?name" => $par2,
            ));

$TotalRegv = count($obtenervig);

if($TotalRegv==1) 
  { $obtenerv = $obtenervig[0];
        $startdate = $obtenerv['start-date'];
        $startime = $obtenerv['start-time'];
      }

      else {$startdate ="Ilimitado";
        $startime = ""; }
  
  $users= $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,limit-uptime,password,comment",
            "?".$tipo."" => $par,
            ));
      
      
        $obtenerDNS= $API->comm("/ip/hotspot/print", array(
            ".proplist" => "ip-of-dns-name",           
            ));
  $dnsname = $obtenerDNS[0];
  $dns = $dnsname['ip-of-dns-name'];
  
$TotalReg = count($users);




if ($TotalReg==0){
  

echo '';

}


else {




echo '<div class="contenedor">';
 
foreach($users as $i=>$v)  {
  
  $id = $users[$i]['.id'];
  $nombre = $users[$i]['name'];

  if (isset($users[$i]['password'])){     
      $pass = $users[$i]['password'];
    }
    else {
      $pass ="";
    }
  if (isset($users[$i]['profile'])){      
      $perfil = $users[$i]['profile'];
      
    }
    else {
      $perfil ="0";
    }
  
  
  if (isset($users[$i]['uptime'])){     
      $tiempo = $users[$i]['uptime'];
    }
    else {
      $tiempo="";
    }
    if (isset($users[$i]['limit-uptime'])){     
      $ltiempo =converttime($users[$i]['limit-uptime']);
     
      
    }
    else {
      $ltiempo ="Ilimitado";
    }
    if (isset($users[$i]['bytes-out'])){      
      $byts = $users[$i]['bytes-out'];
    }
    else {
      $byts  ="";
    }
    if (isset($users[$i]['comment'])){      
      $comentariox =$users[$i]['comment'];
      $comentario2=explode(" ",$comentariox);
      $comentario=$moneda."  ".$comentario2[0]; 
      
    }
    else {
      $comentario ="";
    }






 $arreglo=array
  (
     "LOGO"=>$logo,
    "ENCABEZADO"=>$textos,    
    "IDUSERNAME"=>$iduser,
    "IDPASSWORD"=>$idpass,
    "USERNAME"=>$nombre,
    "PASSWORD"=>$pass,
    "TIEMPO"=>$ltiempo,
    "PRECIO"=>$comentario
  );
$html='
';
foreach($arreglo as $Varx=>$Des) 
  {
        $html=str_replace("[".$Varx."]",$Des,$html);
  }

  print $html;
echo "</div>";

}




}}
else {
  require('../includes/header.php');
echo '<div class="hover:bg-purple-300 bg-neutral-50 font-bold text-indigo-500 rounded p-2"  >
    Lo siento no es posible generar usuarios sin definir los parámetros necesarios, cierre la ventana y genere desde su formulario !
  </div>
  ';  
  
}}

?>



 
</body>
</html>
