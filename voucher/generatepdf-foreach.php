

<?php

function converttime($date){
if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES";	}
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('-Seg.', '-Min ', ' 1-Hora ', '-Horas ', '1-Día ', '-Días ', '1-Semana. ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 
function convertdatav($datavig){
$datemikrotik = array('jan', 'feb', 'mar','apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec');
$espanish = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre.', 'Octubre', 'Noviembre.', 'Diciembre.');
return sprintf(str_replace($datemikrotik, $espanish, $datavig));
} 

 
if (isset($_POST['comment'])){
	


require("../require/connect_db.php");
require_once('../require/mpdf/vendor/autoload.php');

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






$tipo="comment"; 
$par2=$_POST['comment']; 
$velocidad=$_POST['velocidad']; 
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

				else {$startdate ="Ilimitado";
				$startime = "--------"; }

	
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
				'margin_left' => 5,    	// 15 margin_left
				'margin_right' => 5,    	// 15 margin right

				// 'mgt' => $headerTopMargin,     // 16 margin top
				// 'mgb' => $footerTopMargin,    	// margin bottom
				'margin_top' => 4,     // 9 margin header
				    // 9 margin footer
				'orientation' => 'P'  	// L - landscape, P - portrait
			);
$mpdf = new \Mpdf\Mpdf($mpdfConfig);
//$mpdf = new \Mpdf\Mpdf(['setAutoBottomMargin' => 'stretch']);	

 

 $mpdf->WriteHTML('<columns column-count="3"  column-width="33%"  column-gap="2">');



$nfichas=0;

foreach($obtenerusers as $i=>$v) {

	$nfichas++;
	
	$id = $obtenerusers[$i]['.id'];
	$nombre = $obtenerusers[$i]['name'];
	$idx = substr($obtenerusers[$i]['.id'],1,5);


	
	if (isset($obtenerusers[$i]['password'])){			
			$pass = $obtenerusers[$i]['password'];
		}
		else {
			$pass ="";
		}
	if (isset($obtenerusers[$i]['profile'])){			
			$perfil = $obtenerusers[$i]['profile'];
		}
		else {
			$perfil ="";
		}
	
	
	if (isset($obtenerusers[$i]['uptime'])){			
			$tiempo = $obtenerusers[$i]['uptime'];
			$tiempo= converttime($tiempo);
		}
		else {
			$tiempo="";
		}
			if (isset($obtenerusers[$i]['limit-uptime'])){			
			$ltiempo =$obtenerusers[$i]['limit-uptime'];
			$ltiempo= converttime($ltiempo);
			 
	}
		else {
			$ltiempo ="Ilimitado";
		}
		if (isset($obtenerusers[$i]['bytes-out'])){			
			$byts = $obtenerusers[$i]['bytes-out'];
		}
		else {
			$byts  ="";
		}
		if (isset($obtenerusers[$i]['comment'])){
            $comentariox =$obtenerusers[$i]['comment'];
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

if($modologin==10||$modologin==20){

      $msgqr= 'http://'.$dns.'/login?username='.$nombre.'&password='.$nombre;  
$qr->addData($msgqr);
$qr->make();
$Carpetaqr="QRlotes/";
$qr->printSVG($Carpetaqr,$nombre,2);
$qrcode=$Carpetaqr.$nombre.".svg";


   }


   else if($modologin==30){

     $msgqr= 'http://'.$dns.'/login?username='.$nombre.'&password='.$pass;  
$qr->addData($msgqr);
$qr->make();
$Carpetaqr="QRlotes/";
$qr->printSVG($Carpetaqr,$nombre,2);
$qrcode=$Carpetaqr.$nombre.".svg";

   }
      	  	if ($pass=="" || $pass==$nombre){
   
    
$mpdf->WriteHTML('<table style="width:100%;    margin-top:1px;   border: 1px dotted black;" 
          cellspacing="0" cellpadding="0" border="0"  align="center"  > 
            <tr>
     <th style="height:26px; font-size:11px;"  >'.$nfichas.'</th> 
    <th style="  font-size:12px;" rowspan="2"  ></th>
    <th style="  font-size:11px;" rowspan="2"  >'.$textos.'</th>
    
  </tr>
  <tr>
      <th   rowspan="3"   ><img style="width:80px; "   src="'.$qrcode.'" />  </th>
      
            
  </tr>

   

      <tr>  <th style="width:3px;  "    >  </th>
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
if (file_exists($qrcode)){unlink($qrcode); }

}

else {

$mpdf->WriteHTML('<table style="width:100%;    margin-top:1px;   border: 1px dotted black;"  >
  <tr>
     <th style="height:26px; font-size:11px;"  >'.$nfichas.'</th> 
    <th style="  font-size:12px;" rowspan="2"  ></th>
    <th style="  font-size:11px;" rowspan="2"  >'.$textos.'</th>
    
  </tr>
  <tr>
      <th   rowspan="3"   ><img style="width:80px; "   src="'.$qrcode.'" />  </th>
      
            
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

<table  style="width:350px"  class="tabla">
  <tr>
      
    <th style="height:28px;" colspan="2"><h1> 0 registros encontrados </h1></th>
    
  </tr>
  <tr>
       
    
     <td style="width:100%; color:green; padding:1px; border:1px solid orange;"> <h1>'.$_POST['opcion'].' </h1></td>
      
  </tr>

  <tr>
       
    
     <td style="width:100%; color:green; padding:1px; border:1px solid orange;"> <h1>'.$_POST['parametro'].'</h1></td>
      
  </tr>
 
</table>




 ');
 


	}
	
$mpdf->WriteHTML('</columns>');

$vendedor =$_SESSION['username'];
 

$micarpeta = '../../voucher/'.$vendedor.'/';
$namefile='Fichas '.$par2.'.pdf';

if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}



 

$mpdf->Output($micarpeta. $namefile, 'F');


 $finddir=$vendedor."/".$namefile;

$dir = $micarpeta;


$data=array('namefile'=>$namefile,'pdf'=>$finddir);
echo json_encode($data);
}

}
else {
$data = 5;
echo json_encode($data);	
	
}

?>
 

