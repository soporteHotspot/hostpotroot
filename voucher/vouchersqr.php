

<?php

 
if (isset($_POST['opcion'])){
	

function convertdatav($datavig){
$datemikrotik = array('jan', 'feb', 'mar','apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec');
$espanish = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
return sprintf(str_replace($datemikrotik, $espanish, $datavig));
} 

require("../require/connect_db.php");
require_once '../require/routerboard.phar';

$consult=("SELECT * FROM sistema where id='1'");
$l=mysqli_query($mysqli,$consult);
$p=mysqli_fetch_array($l);				   
$logo='../'.$p['logo'];	
$iduser=$p['idusuario'];	
$idpass=$p['idpassword'];	
$text=$p['texto'];
$moneda=$p['moneda'];
$zone=$p['zona'];
$modologin=$p['modo'];
$fecha=date("d-m-Y");
date_default_timezone_set($zone);

$usuario=$_SESSION["username"];

   $obteneridsu=("SELECT * FROM routerboard WHERE usuario='$usuario'");
              $datasucursal=mysqli_query($mysqli,$obteneridsu);    
              $datas=mysqli_fetch_array($datasucursal);             
              $idsucursal=$datas['idsucursal'];

             $obteneridsucursal=("SELECT * FROM sucursal WHERE id='$idsucursal'");
              $datasucursal=mysqli_query($mysqli,$obteneridsucursal);    
              $datass=mysqli_fetch_array($datasucursal);             
              $textos=$datass['texto']  ; 
        


require_once('../require/mpdf/vendor/autoload.php');

 


$tipo=$_POST['opcion']; 
$par2=$_POST['parametro']; 
$par = str_replace('`', '"', $par2);



if ($API->connect($ip,$Usuario,$password)) {




	$obtenervig= $API->comm("/system/schedule/print", array(
            ".proplist" => ".id,name,start-date,start-time",
            "?name" => $par2,
            ));

$TotalRegv = count($obtenervig);

if($TotalRegv==1) 
	{	$obtenerv = $obtenervig[0];
				$startdatex = $obtenerv['start-date'];
				$startime = $obtenerv['start-time'];
				$startdate = convertdatav($startdatex);				
				
			}

			else {$startdate ="--------";
				$startime = "-------"; }



	
	$obtenerusers= $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,password,comment,limit-uptime,comment",
            "?".$tipo."" => $par,
            ));
			
			
			$obtenerDNS= $API->comm("/ip/hotspot/print", array(
            ".proplist" => "ip-of-dns-name",           
            ));
	$dnsname = $obtenerDNS[0];
	$dns = $dnsname['ip-of-dns-name'];
$TotalReg = count($obtenerusers);

$mpdfConfig = array(
				'mode' => 'utf-8', 
				'format' => 'letter',    // format - A4, for example, default ''
				    // font size - default 0
				'default_font' => '',    // default font family
				'margin_left' => 4,    	// 15 margin_left
				'margin_right' => 4,    	// 15 margin right

				// 'mgt' => $headerTopMargin,     // 16 margin top
				// 'mgb' => $footerTopMargin,    	// margin bottom
				'margin_top' => 4,     // 9 margin header
				    // 9 margin footer
				'orientation' => 'P'  	// L - landscape, P - portrait
			);
$mpdf = new \Mpdf\Mpdf($mpdfConfig);	
//$mpdf = new \Mpdf\Mpdf(['setAutoBottomMargin' => 'stretch']);	
//$stylesheet = file_get_contents('../css/qrcards.css');

//$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);


 
 $mpdf->WriteHTML('<columns column-count="7"  column-width="4"  column-gap="1">');
 
$nfichas=0;

for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];

	$nfichas++;
	
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
						$ltiempo4 = str_replace("d", " Días ", $ltiempo3);
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

// QR_ERROR_CORRECT_LEVEL_L : 7%
// QR_ERROR_CORRECT_LEVEL_M : 15%

$qr->setErrorCorrectLevel(QR_ERROR_CORRECT_LEVEL_M);
$qr->setTypeNumber(4);


if($pass==$nombre){

 $msgqr= 'http://'.$dns.'/login?username='.$nombre.'&password='.$pass;   
$qr->addData($msgqr);
$qr->make();
$Carpetaqr="QRlotes/";
$qr->printSVG($Carpetaqr,$nombre,2);
$qrcode=$Carpetaqr.$nombre.".svg";


   }
else {
$msgqr= 'http://'.$dns.'/login?username='.$nombre.'&password='.$pass;  
$qr->addData($msgqr);
$qr->make();
$Carpetaqr="QRlotes/";
$qr->printSVG($Carpetaqr,$nombre,2);
$qrcode=$Carpetaqr.$nombre.".svg";

   }
if ($pass=="" || $pass==$nombre){
   
    
$mpdf->WriteHTML('<table style="width:135%;    margin-top:1px;   border-right:1px dotted black; border-top:2px dotted black; " 
          cellspacing="1" cellpadding="1" border=""  align="center"  > 
            <tr>
     <th style="height:0px; font-size:0px;"  >'.$nfichas.'</th> 
    <th style="  font-size:12px;" rowspan="0"  ></th>
    <th style="  font-size:10px;" rowspan="0"  >'.$textos.'</th>
    
  </tr>
  <tr>
      <th   rowspan="3"   ><img style="width:60px; "   src="'.$qrcode.'" />  </th>
      
            
  </tr>

   

      <tr>  <th style="width:1px;  "    >  </th>
        <td style="text-align: left;  color:black;  border:0px ;  ">
       	<p style="color:black; margin-left:2px;  font-size:12px;"><strong>'.$iduser.':</strong> '.$nombre.' </p>
       	 
       	<p style="  font-size:12px; color:blue;"><strong>Precio:</strong> '.$comentario.'</p> 
        <p style="   font-size:10px; color:green;"><strong>Tiempo:</strong> '.$ltiempo.'</p>
        <p style="  font-size:10px; color:red;"><strong>Caducidad: </strong> '.$startdate.' </p>
        <p style="   font-size:10px; color:red;"> '.$startime.'</p>
             </td>     
  </tr>

   
     
</table>




 ');
if (file_exists($qrcode))
{unlink($qrcode); }
}

else {

$mpdf->WriteHTML('<table style="width:70%;    margin-top:1px;   border: 1px dotted black;"  >
  <tr>
     <th style="height:26px; font-size:11px;"  >'.$nfichas.'</th> 
    <th style="  font-size:12px;" rowspan="2"  ></th>
    <th style="  font-size:11px;" rowspan="2"  >'.$textos.'</th>
    
  </tr>
  <tr>
      <th   rowspan="3"   ><img style="width:600px; "   src="'.$qrcode.'" />  </th>
      
            
  </tr>

   

  </tr>

   

      <tr>  <th style="width:3px;  "    >  </th>
        <td style="text-align: left;  color:black;  border:0px ;  ">
       	<p style="  font-size:12px;"><strong>'.$iduser.':</strong> '.$nombre.' </p>
       	<p style=" font-size:12px;  "><strong>'.$idpass.':</strong> '.$pass.' </p>
       	 
       	<p style="  font-size:12px; color:blue; "><strong>Precio:</strong> '.$comentario.'</p> 
        <p style="  font-size:10px; color:green;"><strong>Tiempo:</strong> '.$ltiempo.'</p>
        <p style="  font-size:10px; color:red;"><strong>Caducidad: </strong> '.$startdate.' </p>
        <p style="  font-size:10px; color:red;"> '.$startime.'</p>
             </td>     
  </tr>
   
     
</table>




 ');
 
 if (file_exists($qrcode))
{unlink($qrcode); }
}



	}


	if($TotalReg==0){
  
$mpdf->WriteHTML('

<table  style="width:0px"  class="tabla">
  <tr>
      
    <th style="height:2px;" colspan="2"><h1> 0 registros encontrados </h1></th>
    
  </tr>
  <tr>
       
    
     <td style="width:70%; color:green; padding:1px; border:1px solid orange;"> <h1>'.$_POST['opcion'].' </h1></td>
      
  </tr>

  <tr>
       
    
     <td style="width:70%; color:green; padding:1px; border:1px solid orange;"> <h1>'.$_POST['parametro'].'</h1></td>
      
  </tr>
 
</table>




 ');
 

	}
	
$mpdf->WriteHTML('</columns>');
$especiales= array("$", "%", ":", "+", "ñ", "&", "#", '"', "!", "/", "`");

$par2= str_replace($especiales,'.',$par2);
$vendedor =$_SESSION['username'];
$vendedor  =preg_replace('([^A-Za-z0-9])', '', $vendedor);

$micarpeta = '../../voucher/'.$vendedor.'/';
$namefile='Fichas '.$par2.'.pdf';


 

$mpdf->Output( $namefile, 'I');
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
 

