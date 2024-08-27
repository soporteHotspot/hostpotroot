

<?php

 
  
	
 

require_once('../require/mpdf/vendor/autoload.php');

 
 
 

$mpdfConfig = array(
				'mode' => 'utf-8', 
				'format' => 'letter',    // format - A4, for example, default ''
				 
			);
$mpdf = new \Mpdf\Mpdf($mpdfConfig);
$mpdf = new \Mpdf\Mpdf(['setAutoBottomMargin' => 'stretch']);	
 


 
 


require("../require/connect_db.php");
 
 //$vendedor="otreblaga@gmail.com";
 
 
   $obteneridsu=("SELECT * FROM routerboard WHERE usuario='$vendedor'");
              $datasucursal=mysqli_query($mysqli,$obteneridsu);    
              $datas=mysqli_fetch_array($datasucursal);             
              $idsucursal=$datas['idsucursal'];

             $obteneridsucursal=("SELECT * FROM sucursal WHERE id='$idsucursal'");
              $datasucursal=mysqli_query($mysqli,$obteneridsucursal);    
              $datass=mysqli_fetch_array($datasucursal);   
              $nombre=$datass['nombre']  ;          
              $textos=$datass['texto']  ; 
              $direcion=$datass['direccion']  ; 


$consult=("SELECT * FROM sistema where  id='1'");
$l=mysqli_query($mysqli,$consult);
$p=mysqli_fetch_array($l);

$logo='../'.$p['logo'];	
$sistema=$p['sistema'];	
$idpass=$p['idpassword'];	
$text=$p['texto'];
$zone=$p['zona'];
        $moneda=$p['moneda'];
         $modologin=$p['modo'];

        date_default_timezone_set($zone);
$hora=date("his");
$fecha=date("Y-m-d");
include_once("generarqrsvg.php");
$qr = new QRCode();
$qr->setErrorCorrectLevel(QR_ERROR_CORRECT_LEVEL_L);
$qr->setTypeNumber(4);

 

  $msgqr= 'Sucursal: '.$nombre.' vendedor: '.$vendedor;  
$qr->addData($msgqr);
$qr->make();
$Carpetaqr="QR-corte/";
$qr->printSVG($Carpetaqr,$nombre,2); 

   
  
$encabezado='<TABLE width="100%" border="0" style="font-size:12px; ">
 
<TR><TH style="width:20%;"  rowspan="4" > <img src="../'.$logo.'" width="10%" alt="Girl in a jacket" ></TH  >
     <TH  > </TH  >

     <TH style="width:20%;"  rowspan="4" > <img src="'.$Carpetaqr.$nombre.'.svg" width="10%" alt="Girl in a jacket" ></TH  >
<TR>
   

 </TR>

<TR>  
 <TH  >Sucursal: '.$nombre.'</TH  >
 
 </TR>

 <TR>  
  <TH  >Direccción: '.$direcion.'</TH  >

 
 </TR>
 
   
</TABLE>
 ';
$encabezado2='<hr><TABLE width="100%" border="0" style="font-size:12px; ">
 
<TR> 
  <th style="text-align:left; border: 0px solid black;  border-collapse: collapse; width:50%;">CORTE DE PAGOS </th>
     <th style="text-align:right;border: 0px solid black;  border-collapse: collapse; width:50%;"> Fecha: '.$fecha.'</th>

     
</TR></TABLE>';
 
 require("../require/connect_db.php");
     $total=0; 

      $sqlv="SELECT * FROM fichas WHERE vendedor='$vendedor' ORDER BY 'precio' ";
                
                $ressqlv=mysqli_query($mysqli,$sqlv);       
        $headtable='<hr><table CELLPADDING="8" style="border: 1px solid black;  border-collapse: collapse; width:100%; text-align: left; font-size:12px;  font-weight: bold; margin-top:10px;">
  <tr style=" background-color:#A1DBFE;">
  <th style="border: 1px solid black;  border-collapse: collapse; width:10%;" >No.</th>
    <th style="border: 1px solid black;  border-collapse: collapse; width:20%;">Usuario</th>
     <th style="border: 1px solid black;  border-collapse: collapse; width:20%;">Tiempo</th>
     <th style="border: 1px solid black;  border-collapse: collapse; width:20%;">Precio</th>
   
  </tr>
   ';  

        $x=1;
        $np=0;

      $total=0;
      $mpdf->WriteHTML($encabezado.$encabezado2.$headtable);
  while ($rowv=mysqli_fetch_array($ressqlv)){

  	 $np+=$x;    
  	     $user=$rowv["user"];
  	     $pu=$moneda.' '.$rowv["precio"];
  	     $tiempo=$rowv["tiempo"];
  	     $total+=$rowv["precio"];

      $btable='<tr>  
                   <td style="border: 1px solid black;  border-collapse: collapse;">'.$np.'</td>
                    <td  style="border: 1px solid black;  border-collapse: collapse;">'.$user.'</td>
                            <td  style="border: 1px solid black;  border-collapse: collapse;">'.$tiempo.'</td>
                      <td  style="border: 1px solid black;  border-collapse: collapse;">'.$pu.'</td>
   
                 
                </tr> 
                    
                  ';
$mpdf->WriteHTML($btable);
  }

 $total='<tr>  
                   <td style="border: 0px solid black;  border-collapse: collapse;"> </td>
                    <td  style="border: 0px solid black;  border-collapse: collapse;"> </td>
                            <td  style="border: 0px solid black; text-align:right;  border-collapse: collapse;"> Total:</td>
                      <td  style="border: 1px solid black;  border-collapse: collapse;">'.$moneda.' '. $total.'</td>
                        </tr>


                      <tr>  
                      <td style="border: 0px solid black;  border-collapse: collapse;"> </td>
                    <td  style="border: 0px solid black;  border-collapse: collapse;"> </td>
                            <td  style="border: 0px solid black; text-align:right;  border-collapse: collapse;"> Comisión:</td>
                      <td  style="border: 1px solid black;  border-collapse: collapse;">% '. $porcentaje.'</td>
                        </tr>
                        <tr>  
                     
                      <td style="border: 0px solid black;  border-collapse: collapse;"> </td>
                    <td  style="border: 0px solid black;  border-collapse: collapse;"> </td>
                            <td  style="border: 0px solid black; text-align:right;  border-collapse: collapse;"> Vendedor:</td>
                      <td  style="border: 1px solid black;  border-collapse: collapse;">'.$moneda.' '. $comision.'</td>
                       
                      </tr><tr>  
                      <td style="border: 0px solid black;  border-collapse: collapse;"> </td>
                    <td  style="border: 0px solid black;  border-collapse: collapse;"> </td>
                            <td  style="border: 0px solid black; text-align:right;  border-collapse: collapse;"> Administrador:</td>
                      <td  style="border: 1px solid black;  border-collapse: collapse;">'.$moneda.' '. $restante.'</td>
   </tr>
                 
                ';



      $end='</table>   ';

      $foot='<hr><TABLE width="100%" border="0" style="font-size:12px; ">
 
<TR> 
  <th style="text-align:center; border: 0px solid black;  border-collapse: collapse; width:50%;">Responsable</th>
     <th style="text-align:center;border: 0px solid black;  border-collapse: collapse; width:50%;"> Vendedor </th>

     
</TR>
<TR> 
  <th style="text-align:center; border: 0px solid black;  border-collapse: collapse; width:50%;">_________________________________<br>'.$responsable.'</th>
     <th style="text-align:center; border: 0px solid black;  border-collapse: collapse; width:50%;">_________________________________<br>'.$vendedor.'</th>

     
</TR></TABLE>';
 
      
$mpdf->WriteHTML($total.$end.$foot);
 
$fecha_actual = date("d-m-Y h-i-s");
 
 

$micarpeta = '../../corte/'.$vendedor.'/';
$namefilex='corte-'.$vendedor.$fecha_actual.'.pdf';

if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}


$namefile=$vendedor.'/'.$namefilex;
 

$mpdf->Output($micarpeta. $namefilex, 'F');

 

?>
 

