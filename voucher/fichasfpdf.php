

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
	
	
require('../require/fpdf/fpdf.php');
require_once '../require/routerboardPDF.phar';
$tipo=$_POST['opcion']; 
$par2=$_POST['parametro']; 
$par = str_replace('`', '"', $par2);


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


class PDF extends FPDF


{
var $col = 0;

function SetCol($col)
{$this->SetLineWidth(0.1);
    // Move position to a column
    $this->col = $col;
    $x = 4+$col*68;
    $this->SetLeftMargin($x);
    $this->SetX($x);
	
}

function AcceptPageBreak()
{
    if($this->col<2)
    {
        // Configurar resto columnas top, left
        $this->SetCol($this->col+1);
        $this->SetY(4);
			$this->SetAutoPageBreak(true, 10);	
        return false;
    }
    else
    {
        // Regrese a la primera columna y emita un salto de página
        $this->SetCol(0);
        return true;
    }
}
}
 // Configurar tamaños

$pdf = new PDF('P','mm','Letter');
$pdf->SetAutoPageBreak(true, 10);

 // Configurar primera columna top, left
  $pdf->SetTopMargin(4);
     $pdf->SetLeftMargin(4);
	 

$pdf->SetFont('Arial','B',10);


$pdf->AddPage();

if ($TotalReg<=8){
	
for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$nombre = $users['name'];
	$startX = $pdf->GetX();
$startY = $pdf->GetY();


	if (isset($users['password'])){      
      $pass =$users['password'];
    }
    else {
      $pass ="";
    }
	
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
	
	

	
		
		
	
$pdf->Cell(30,16, $pdf->Image($logo,$startX+6,$startY,18,16),1,0,"C",0);
	$pdf->SetFont('Arial','',14);
 $pdf->MultiCell(37,8, utf8_decode ($text),1,'C');
 $pdf->SetFont('Arial','',12);

 if($pass==$nombre || $pass==""){
$pdf->Cell(30,8,utf8_decode ($iduser),1,0,"C",0);

$pdf->Cell(37,8,utf8_decode ($nombre),1,1,"C",0);

}

else {
$pdf->Cell(30,8,utf8_decode ($iduser),1,0,"C",0);

$pdf->Cell(37,8,utf8_decode ($nombre),1,1,"C",0);
$pdf->Cell(30,8,utf8_decode ($idpass),1,0,"C",0);

$pdf->Cell(37,8,utf8_decode ($pass),1,1,"C",0);

}
$pdf->Cell(30,8,utf8_decode ("Tiempo:"),1,0,"C",0);
$pdf->MultiCell(37,8, utf8_decode ($ltiempo)  ,1,'C');
$pdf->Ln(1);
	
		
		

 	 
		 
}	
	
}
else {

for ($i = 0; $i < $TotalReg; $i++) {
	$users = $obtenerusers[$i];
	$id = $users['.id'];
	$nombre = $users['name'];
	$startX = $pdf->GetX();
$startY = $pdf->GetY();
	
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
	
	

	
		
		
	
$pdf->Cell(30,16, $pdf->Image($logo,$startX+1,$startY-30,18,12),1,0,"C",0);
	$pdf->SetFont('Arial','',14);
 $pdf->MultiCell(37,8, utf8_decode ($text),1,'C');
 $pdf->SetFont('Arial','',12);
 if($pass==$nombre || $pass==""){
$pdf->Cell(30,8,utf8_decode ($iduser),1,0,"C",0);

$pdf->Cell(37,8,utf8_decode ($nombre),1,1,"C",0);

}

else {
$pdf->Cell(30,8,utf8_decode ($iduser),1,0,"C",0);

$pdf->Cell(37,8,utf8_decode ($nombre),1,1,"C",0);
$pdf->Cell(30,8,utf8_decode ($idpass),1,0,"C",0);

$pdf->Cell(37,8,utf8_decode ($pass),1,1,"C",0);

}
$pdf->Cell(30,8,utf8_decode ($comentario),1,0,"C",0);
$pdf->MultiCell(37,8, utf8_decode ($ltiempo)  ,1,'C');
$pdf->Ln(1);
	
		
		

 	 
		 
}








}
$pdf->Output();
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
 

