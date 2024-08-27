

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
$moneda=$p['moneda'];
$zone=$p['zona'];
$fecha=date("d-m-Y");
date_default_timezone_set($zone);



require_once('../require/mpdf/vendor/autoload.php');







require_once '../require/routerboardPDF.phar';
$tipo=$_POST['opcion']; 
$par2=$_POST['parametro']; 
$par = str_replace('`', '"', $par2);

 $obtenerda=("SELECT * FROM sistema");
              $datax=mysqli_query($mysqli,$obtenerda);    
              $data=mysqli_fetch_array($datax);             
              $moneda=$data['moneda'];
 

if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
	$obtenerusers= $API->comm("/ip/hotspot/user/print", array(
            ".proplist" => ".id,name,password,comment,limit-uptime,comment",
            "?".$tipo."" => $par,
            ));
			
			
				$obtenerDNS= $API->comm("/ip/hotspot/profile/print", array(
            ".proplist" => "dns-name",           
            ));
	$dnsname = $obtenerDNS[0];
	$dns = $dnsname['dns-name'];
	
$TotalReg = count($obtenerusers);

$mpdfConfig = array(
				'mode' => 'utf-8', 
				'format' => [45, 100],
			    // format - A4, for example, default ''
				    // font size - default 0
				'default_font' => '',    // default font family
				'margin_left' => 0,    	// 15 margin_left
				'margin_right' => 0,    	// 15 margin right

				// 'mgt' => $headerTopMargin,     // 16 margin top
				// 'mgb' => $footerTopMargin,    	// margin bottom
				'margin_top' => 0,     // 9 margin header
				'margin_bottom' => 0,     // 9 margin footer
				'orientation' => 'L'  	// L - landscape, P - portrait
			);
$mpdf = new \Mpdf\Mpdf($mpdfConfig);


$stylesheet = file_get_contents('../css/tarjetas.css');

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
						$ltiempo4 = str_replace("d", " DIAS ", $ltiempo3);
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

if($pass==$nombre || $pass==""){
$mpdf->AddPage();
$mpdf->WriteHTML('

<table style="margin:2px; border:none;" class="tabla">
  <tr>
  <th style="font-size:20px;" >'.$text.' </th>
    <th  ><img src="'.$logo.'"  height="70px" >  </th>
    
     
  </tr>
  <tr>
    <td  style="width:40%; font-size:18px;  color:blue;" >'.$iduser. ':</td>
    <td style="width:60%;  font-size:18px;  color:black; padding:1px; border:1px solid orange;">'.$nombre.'</td>
    
  </tr>
  <tr>
    <td style="width:40%; font-size:20px;   color:blue; padding:1px; border:1px solid orange;">Precio:</td>
    <td style="width:60%; font-size:18px; color:green; padding:1px; border:1px solid orange;">'.$comentario.'</td>
    
  </tr>

   <tr>
    <td  style="width:40%; font-size:18px;  color:blue;" >Tiempo:</td>
    <td style="width:60%;  font-size:18px;  color:green; padding:1px; border:1px solid orange;">'.$ltiempo.'</td>
    
  </tr>
</table>




 ');}

else {
$mpdf->AddPage();
$mpdf->WriteHTML('

<table style="margin:2px; border: none" class="tabla">
  <tr>
  <th >'.$text.' </th>
    <th  ><img src="'.$logo.'"    height="70px" >  </th>
    
     
  </tr>
  <tr>
    <td  style="width:40%;   font-size:16px; color:red;" >'.$iduser. ':</td>
    <td style="width:60%;  font-size:16px;  color:green; padding:1px; border:1px solid orange;">'.$nombre.'</td>
    
  </tr>

    <tr>
    <td  style="width:40%;  font-size:16px;  color:red;" >'.$idpass. ':</td>
    <td style="width:60%;   font-size:16px; height:15px; color:green; padding:1px; border:1px solid orange;">'.$pass.'</td>
    
  </tr>
  <tr>
    <td style="   font-size:25px; color:green; padding:1px; border:1px solid orange;">'.$comentario.'</td>
    <td style="   font-size:16px; color:green; padding:1px; border:1px solid orange;">'.$ltiempo.'</td>
    
  </tr>
</table>




 ');

}


	}
	
 

$vendedor =$_SESSION['username'];
$especiales= array("$", "%", ":", "+", "ñ", "&", "#", '"', "!", "/", "`");

$par2= str_replace($especiales,'.',$par2);
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
 

