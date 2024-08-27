

<?php

 
if (isset($_POST['usuario'])){
	$par2=$_POST['usuario'];
	require("../require/connect_db.php");
require_once '../require/routerboard.phar';
$usuario=$_SESSION["username"];

 





$consult=("SELECT * FROM sistema where id='1'");
$l=mysqli_query($mysqli,$consult);
$p=mysqli_fetch_array($l);				   
$logo='../'.$p['logo'];	
$iduser=$p['idusuario'];	
$idpass=$p['idpassword'];	
$text=$p['texto'];
$moneda=$p['moneda'];
$zone=$p['zona'];
$fecha=date("d-m-Y");
date_default_timezone_set($zone);

   $obteneridsu=("SELECT * FROM routerboard WHERE usuario='$usuario'");
              $datasucursal=mysqli_query($mysqli,$obteneridsu);    
              $datas=mysqli_fetch_array($datasucursal);             
              $idsucursal=$datas['idsucursal'];

             $obteneridsucursal=("SELECT * FROM sucursal WHERE id='$idsucursal'");
              $datasucursal=mysqli_query($mysqli,$obteneridsucursal);    
              $datass=mysqli_fetch_array($datasucursal);             
              $textos=$datass['texto']  ;        


require_once('../require/mpdf/vendor/autoload.php');



$usermikrotik=$_POST['usuario']; 



if ($API->connect($ip,$Usuario,$password)) {
	
	$obtenerusers= $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,password,comment,limit-uptime,comment",
            "?name" => $usermikrotik,
            ));
			
			
			$obtenerDNS= $API->comm("/ip/hotspot/print", array(
            ".proplist" => "ip-of-dns-name",           
            ));
	$dnsname = $obtenerDNS[0];
	$dns = $dnsname['ip-of-dns-name'];
$TotalReg = count($obtenerusers);

$mpdfConfig = array(
				'mode' => 'utf-8', 
				'format' => [50, 100],
			    // format - A4, for example, default ''
				    // font size - default 0
				'default_font' => '',    // default font family
				'margin_left' => 0,    	// 15 margin_left
				'margin_right' => 0,    	// 15 margin right

				// 'mgt' => $headerTopMargin,     // 16 margin top
				// 'mgb' => $footerTopMargin,    	// margin bottom
				'margin_top' => 0,     // 9 margin header
				'margin_bottom' => 0,     // 9 margin footer
				'orientation' => 'P' 	// L - landscape, P - portrait
			 
			);
$mpdf = new \Mpdf\Mpdf($mpdfConfig);	

$stylesheet = file_get_contents('../css/tarjetaspage.css');

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);


 


for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	
	$id = $users['.id'];
	$nombre = $users['name'];
	$idx = substr($users['.id'],1,5);


	
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
			$perfil ="";
		}
	
	
	if (isset($users['uptime'])){			
			$tiempo = $users['uptime'];
		}
		else {
			$tiempo="";
		}
		if (isset($users['limit-uptime'])){			
			$ltiempo2 =$users['limit-uptime'];
			if ($ltiempo2=="1w"){

$ltiempo="1 Semana";
			}
	else if ($ltiempo2=="1d"){

$ltiempo="1 Día";
			}
				else if ($ltiempo2=="1h"){

$ltiempo="1 Hora";
			}
				else if ($ltiempo2=="2w1d"){

$ltiempo="15 Días";
			}

	else if ($ltiempo2=="4w2d"){

$ltiempo="1 Mes";
			}

else 
			{$ltiempo3 = str_replace("w", " SEMANAS ", $ltiempo2);
						$ltiempo4 = str_replace("d", " Días", $ltiempo3);
						$ltiempo5 = str_replace("h", " Horas. ", $ltiempo4);
						$ltiempo = str_replace("m", " Minutos ", $ltiempo5);}

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
						$comentario=$moneda."  ".number_format($comentario2[0], 2);	
			
		
			
		}
		else {
			$comentario ="";
		}

include_once("generarqrsvg.php");
$qr = new QRCode();
$qr->setErrorCorrectLevel(QR_ERROR_CORRECT_LEVEL_L);
$qr->setTypeNumber(4);

  if($pass==$nombre){

 $msgqr= 'http://'.$dns.'/login?username='.$nombre.'&password='.$nombre;   
$qr->addData($msgqr);
$qr->make();
$Carpetaqr="QR-PV/";
$qr->printSVG($Carpetaqr,$nombre,2);
$qrcode=$Carpetaqr.$nombre.".svg";


   }
else{
$msgqr= 'http://'.$dns.'/login?username='.$nombre.'&password='.$pass;  
$qr->addData($msgqr);
$qr->make();
$Carpetaqr="QR-PV/";
$qr->printSVG($Carpetaqr,$nombre,2);
$qrcode=$Carpetaqr.$nombre.".svg";

   }   
   

   	if ($pass=="" || $pass==$nombre){
  $mpdf->AddPage();

 $mpdf->WriteHTML('<table style="margin:2px" class="tabla"> <tr>
      
    <th style="height:39px; font-size:12px; font-style: italic;"  >'.$textos.' </th>
    
  </tr>
   <tr style="border:none;">
      
    
     <td style="  color:green; border:none; font-size:14px;   ">'.$iduser.'</td>
  </tr>
   <tr style="border:none;">
      
    
     <td style="width:60%;  border:none; color:black; font-size:14px; font-style: arial;   ">'.$nombre.'</td>
  </tr>

  <tr>
    
    
    <td style="  color:blue; border:none;">'.$comentario.'</td>
  </tr>
  

  <tr>
 
    
    <td style=" color:blue; border:none;">'.$ltiempo.'</td>
    
  </tr>
  <tr style=" margin:1px">>
      <th     ><img class="code-QR" src="'.$qrcode.'" />  </th>
    
      
  </tr>
 <tr>
    
    
    <td style="border:none;">Gracias por su compra</td>
  </tr>
  
</table>




 ');

}

else {

$mpdf->AddPage();

$mpdf->WriteHTML('
<table style="margin:2px" class="tabla"> <tr>
      
    <th style="height:39px; font-size:18px"  >'.$text.' </th>
    
  </tr>
   <tr style="border:none;">
      
    
     <td style="  color:green; border:none;    ">'.$iduser.'</td>
  </tr>
   <tr style="border:none;">
      
    
     <td style="width:60%;  border:none; color:black;     ">'.$nombre.'</td>
  </tr>
 <tr style="border:none;">
      
    
     <td style="  color:green; border:none;    ">'.$idpass.'</td>
  </tr>
   <tr style="border:none;">
      
    
     <td style="width:60%;  border:none; color:black;     ">'.$pass.'</td>
  </tr>
  <tr>
    
    
    <td style="  color:blue; border:none;">'.$comentario.'</td>
  </tr>
  

  <tr>
 
    
    <td style=" color:blue; border:none;">'.$ltiempo.'</td>
    
  </tr>
  <tr style=" margin:1px">>
      <th     ><img class="code-QR" src="'.$Carpetaqr.$nombre.'.svg" />  </th>
    
      
  </tr>
 
  
</table>
 


 


 ');

}


	}


	if($TotalReg==0){
  
$mpdf->WriteHTML('

<table style="width: 100%">
  <tr>
    <td style="width:100%">No se encontraron registros</td>
   
 
  </tr>
 <tr>
    <td style="width:50%"> --</td>
   
 
  </tr>
 <tr>
    <td style="width:50%">--</td>
   
 
  </tr>
 <tr>
    <td style="width:50%">---</td>
   
 
  </tr>

</table>




 ');
 


	}
	
 





$vendedor =$_SESSION['username'];

$micarpeta = '../../voucher/'.$vendedor.'/';
$namefile='Usuario-'.$par2.'.pdf';


if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}

$mpdf->Output( $namefile, 'I');

    if (file_exists($qrcode))
{unlink($qrcode); }
 

//$mpdf->Output($micarpeta. $namefile, 'F');



}

}
else {
	require('../includes/header.php');
echo '<div class="container  ">
  <div class="row justify-content-center align-items-center  mt-5"> <div class="alert alert-warning" role="alert">
 <li class="fa fa-exclamation-triangle"></li>  Lo siento no es posible generar usuarios sin definir los parámetros necesarios, cierre la ventana y genere desde su formulario !
</div></div></div>';	
	
}

?>
 

