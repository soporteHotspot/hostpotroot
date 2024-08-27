
<html>

<head>
<link rel="stylesheet" href="../fontawesome611/css/all.css">
  
<link rel="stylesheet" type="text/css" href="../css/cardred.css">
<script src="../js/qrious.js"></script>

</head>

<body>
<?php


if (isset($_POST['opcion'])){
 
require("../require/connect_db.php");
require_once '../require/routerboard.phar';

$consult=("SELECT * FROM sistema where  id='1'");
$l=mysqli_query($mysqli,$consult);
$p=mysqli_fetch_array($l);				   
$logo='../'.$p['logo'];	
$iduser=$p['idusuario'];	
$idpass=$p['idpassword'];	
$text=$p['texto'];

$tipo=$_POST['opcion']; 
$par2=$_POST['parametro']; 
$par = str_replace('`', '"', $par2);

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

if ($API->connect($ip,$Usuario,$password,$puerto)) {


	
	$obtenerusers= $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,password,limit-uptime,comment",
            "?".$tipo."" => $par,
            ));
			
			
				$obtenerDNS= $API->comm("/ip/hotspot/profile/print", array(
            ".proplist" => "dns-name",           
            ));
	$dnsname = $obtenerDNS[0];
	$dns = $dnsname['dns-name'];
	
$TotalReg = count($obtenerusers);

echo '<div class="row">';


if ($TotalReg==0){

echo '<div class="product--red">
    <div class="product_inner">
   
     <p>'.$tipo.'</p>  
     <p>'.$par.'</p>    
    </div>
</div';

}


else {
for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$nombre = $users['name'];

	if (isset($users['password'])){			
			$pass = $users['password'];
		}
		else {
			$pass ="";
		}
	if (isset($users['profile'])){			
			$perfil = $users['profile'];
			
		}
		else {
			$perfil ="0";
		}
	
	
	if (isset($users['uptime'])){			
			$tiempo = $users['uptime'];
		}
		else {
			$tiempo="";
		}
		if (isset($users['limit-uptime'])){			
			$ltiempo2 =$users['limit-uptime'];
			$ltiempo3 = str_replace("w", " Sem. ", $ltiempo2);
			$ltiempo = str_replace("d", " Días ", $ltiempo3);
			
		}
		else {
			$ltiempo ="Ilimitado";
		}
		if (isset($users['bytes-out'])){			
			$byts = $users['bytes-out'];
		}
		else {
			$byts  ="";
		}
		if (isset($users['comment'])){			
			 	$comentariox =$users['comment'];
			$comentario2=explode(" ",$comentariox);
			$comentario=$moneda."  ".$comentario2[0];	
			
		}
		else {
			$comentario ="";
		}
	
	if ($pass=="" || $pass==$nombre){
		
		echo ' 
<div class="product--red ">
    <div class="product_inner">
  <strong class="headvoucher">'.$textos.' </strong>
 
 
    <strong> <i class="far fa-user"></i> Usuario: '.$nombre.'</strong>  
	  
     <strong><i class="far fa-clock"></i>  Tiempo: '.$ltiempo.'</strong>  
     <strong>Precio: '.$comentario.'</strong>  
   
       </div></div> ';
		
	}
	
	else{
 
echo '<div class="product--red ">
    <div class="product_inner">
  <strong class="headvoucher">'.$text.' </strong>
 
  
    <strong><i class="fa fa-user"></i> Usuario:  '.$nombre.'</strong>  
   
     <strong>  <i class="fa fa-lock"></i>  Contraseña:  '.$pass.'</strong>  
     <strong><i class="far fa-clock"></i> Tiempo: '.$ltiempo.'</strong>  
     <strong>Precio: '.$comentario.'</strong>  
   
       </div></div> ';

}}

 








}}
else {
	require('../includes/header.php');
echo '<div class="container  ">
  <div class="row justify-content-center align-items-center  mt-5"> <div class="alert alert-warning" role="alert">
 <li class="fa fa-exclamation-triangle"></li>  Lo siento no es posible generar usuarios sin definir los parámetros necesarios, cierre la ventana y genere desde su formulario !
</div></div></div>';	
	
}}

?>
 

 </body>
 </html>
