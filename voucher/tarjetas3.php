<html>

<head>

<link rel="stylesheet" type="text/css" href="../css/cards.css">
 

</head>

<body>
<!-- partial:index.partial.html -->
<div class="container">
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


	
	$obtenerusers= $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,limit-uptime,password,comment",
            "?".$tipo."" => $par,
            ));
			
			
				$obtenerDNS= $API->comm("/ip/hotspot/profile/print", array(
            ".proplist" => "dns-name",           
            ));
	$dnsname = $obtenerDNS[0];
	$dns = $dnsname['dns-name'];
	
$TotalReg = count($obtenerusers);




if ($TotalReg==0){
	//echo '<div class="voucher" > <div class="card front"><div class="blue">$ 5.00</div> <div class="yellow"></div>  <div class="pink"></div> <strong class="headvoucher">'+Texto+'</strong>  <div class="dots"></div>  <div class="personal-intro">  <strong>Username </strong> <strong>'.$nombre.'</strong>  <strong>'+Textot+ " "+Precio+'</strong> </div></div></div>';

echo '<div class="voucher"><div class="card back">  <div class="yellow"> 0 Entradas </div>  <div class="top dots"></div>  <div class="personal-info">    <p> '.$tipo.' '.$par.'</p>  </div>  <div class="blue"></div>  <div class="bottom dots"></div>  <div class="pink"> </div></div></div></div>';

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
		
		echo '  <div class="card">
    <div class="avatar">
      <img class="image" src="'.$logo.'" />
    </div>
     <div class="avatar">
       
    </div>
    <div class="content-container">
      <p class="title">'.$textos.'</p>
      <p class="content">'.$iduser. ': '.$nombre.'</p>
	    <p class="content">Precio: '.$comentario.'</p>
      <p class="content">
       Tiempo: '.$ltiempo.'
      </p>
    </div>
  </div>' ;
		
		
		
	}
	
	else {

		echo '  <div class="card">
    <div class="avatar">
      <img class="image" src="'.$logo.'" />
    </div>
     <div class="avatar">
       
    </div>
    <div class="content-container">
      <p class="title">'.$textos.'</p>
      <p class="content">'.$iduser. ': '.$nombre.'</p>
       <p class="content">'.$idpass. ': '.$pass.'</p>
	    <p class="content">Precio: '.$comentario.'</p>
      <p class="content">
       Tiempo: '.$ltiempo.'
      </p>
    </div>
  </div>' ;
 
		 
}

}













}}
else {
	require('../includes/header.php');
echo '<div class="container  ">
  <div class="row justify-content-center align-items-center  mt-5"> <div class="alert alert-warning" role="alert">
 <li class="fa fa-exclamation-triangle"></li>  Lo siento no es posible generar usuarios sin definir los parámetros necesarios, cierre la ventana y genere desde su formulario !
</div></div></div>';	
	
}}

?>
 </div>

<!-- partial -->
 </body>
 </html>
