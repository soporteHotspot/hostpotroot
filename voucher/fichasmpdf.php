

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



require_once('../require/mpdf/vendor/autoload.php');







require_once '../require/routerboardPDF.phar';
$tipo=$_POST['opcion']; 
$par2=$_POST['parametro']; 
$par = str_replace('`', '"', $par2);

 $obtenerda=("SELECT * FROM sistema");
              $datax=mysqli_query($mysqli,$obtenerda);    
              $data=mysqli_fetch_array($datax);             
              $moneda=$data['moneda'];
 session_start();
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
				'format' => 'letter',    // format - A4, for example, default ''
				    // font size - default 0
				'default_font' => '',    // default font family
				'margin_left' => 5,    	// 15 margin_left
				'margin_right' => 5,    	// 15 margin right

				// 'mgt' => $headerTopMargin,     // 16 margin top
				// 'mgb' => $footerTopMargin,    	// margin bottom
				'margin_top' => 5,     // 9 margin header
				      
				'orientation' => 'P'  	// L - landscape, P - portrait
			);
$mpdf = new \Mpdf\Mpdf($mpdfConfig);	

$stylesheet = file_get_contents('../css/tarjetas.css');

$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);

 $mpdf->WriteHTML('<columns column-count="3"  column-width="33%"  column-gap="1">');
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

if($pass==$nombre || $pass==""){

$mpdf->WriteHTML('

<table class="tabla">
  <tr>
  <th >'.$text.' </th>
    <th  ><img src="'.$logo.'"  height="77px" >  </th>
    
     
  </tr>
  <tr>
    <td  style="width:50%; height:27px; color:red;" >'.$iduser. ':</td>
    <td style="width:50%; height:27px; color:green; padding:1px; border:1px solid orange;">'.$nombre.'</td>
    
  </tr>
  <tr>
    <td style="width:50%; height:26px; color:green; padding:1px; border:1px solid orange;">'.$comentario.'</td>
    <td style="width:50%; height:26px; color:green; padding:1px; border:1px solid orange;">'.$ltiempo.'</td>
    
  </tr>
</table>




 ');}

else {

$mpdf->WriteHTML('

<table class="tabla">
  <tr>
  <th >'.$text.' </th>
    <th  ><img src="'.$logo.'"    height="59px" >  </th>
    
     
  </tr>
  <tr>
    <td  style="width:50%; height:15px; color:red;" >'.$iduser. ':</td>
    <td style="width:50%; height:15px; color:green; padding:1px; border:1px solid orange;">'.$nombre.'</td>
    
  </tr>

    <tr>
    <td  style="width:50%; height:15px; color:red;" >'.$idpass. ':</td>
    <td style="width:50%; height:15px; color:green; padding:1px; border:1px solid orange;">'.$pass.'</td>
    
  </tr>
  <tr>
    <td style="width:50%; height:15px; color:green; padding:1px; border:1px solid orange;">'.$comentario.'</td>
    <td style="width:50%; height:15px; color:green; padding:1px; border:1px solid orange;">'.$ltiempo.'</td>
    
  </tr>
</table>




 ');

}


	}
	
$mpdf->WriteHTML('</columns>');




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
 

