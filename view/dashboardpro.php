<?php

require_once '../require/routerboard.phar';

 function converttime($date){

if($date=="2w1d"){$date="15-DIAS";}if($date=="4w2d"){$date="1-MES"; }
$mikrotik = array('s', 'm', '1h','h', '1d', 'd', '1w', 'w');
$esp = array('', ':', ' 1:', ':', '1-Día ', '-Días ', '1-Semana ', '-Semanas ');
return sprintf(str_replace($mikrotik, $esp, $date));
} 
 
function readableBytes($bytes) {
    $i = floor(log($bytes) / log(1024));
    $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

    return sprintf('%.02F', $bytes / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
}


if ($API->connect($ip,$Usuario,$password)) {
 



	
	 $ether = $API->comm("/interface/print", array(
           
            "?type" =>"ether",          
              
            ));

     $paquetes= $API->comm("/system/package/print");


    $package=count($paquetes);
   $ethernet=count($ether);
	
$ARRAY = $API->comm("/system/resource/print");
$first = $ARRAY['0'];
$memperc = ($first['free-memory']/$first['total-memory']);
$hddperc = ($first['free-hdd-space']/$first['total-hdd-space']);
$mem = ($memperc*100);
$hdd = ($hddperc*100);
$name=$first['board-name'];
$version=$first['version'];
$arquitectura=$first['architecture-name'] ;
 
$usom=($first['total-memory'])-($first['free-memory']);

$unoporm=$first['total-memory']/100;


function obtenerPorcentaje($cantidad, $total) {
    $porcentaje = ((float)$cantidad * 100) / $total; // Regla de tres
    $porcentaje = round($porcentaje, 0);  // Quitar los decimales
    return $porcentaje;
}
$porcentajeusom=obtenerPorcentaje($usom,$first['total-memory']);

$freem=readableBytes($first['free-memory']);
$totalm=readableBytes($first['total-memory']);


$hddfree=readableBytes($first['free-hdd-space']);
$totalhdd=readableBytes($first['total-hdd-space']);
$usohdd=($first['total-hdd-space'])-($first['free-hdd-space']);
$porcentajeusohdd=obtenerPorcentaje($usohdd,$first['total-hdd-space']);

$cpu=$first['cpu-load'];
$enlinea=converttime($first['uptime']);
$manufactura=$first['build-time'];

$ARRAY1 = $API->comm("/system/identity/print");	
	$first1 = $ARRAY1['0'];
	$router=$first1['name'];
	
$ARRAY2 = $API->comm("/ip/dhcp-server/lease/print");	
	$cantidadusers= count($ARRAY2);
	
$ARRAY3 = $API->comm("/ip/hotspot/active/print");	
	$usersactivos= count($ARRAY3);

$ARRAY4 = $API->comm("/ppp/active/print");	
	$usersPPPoE= count($ARRAY4);

	$data=array('modelorb'=>$name,
'cpurb'=>$cpu,
'inline'=>$enlinea,
'paquetes'=>$package,
'npuertos'=>$ethernet,
'namerb'=>$name,
'versionrb'=>$version,
'arquirb'=>$arquitectura,
'totalRAM'=>$totalm,
'memoriatotal'=>$porcentajeusom,
'totalHDD'=>$totalhdd,
'hddtotal'=>$porcentajeusohdd,
'manurb'=>$manufactura,
'mikrotik'=>$router,
'usershp'=>$cantidadusers,
'conectadoshp'=>$usersactivos,
'conectadoppp'=>$usersPPPoE,);

	echo json_encode($data);

}

else {
  $x="0";
  
  	$data=array('modelorb'=>$x,
'cpurb'=>$x,
'inline'=>$x,
'paquetes'=>$x,
'npuertos'=>$x,
'namerb'=>$x,
'versionrb'=>$x,
'arquirb'=>$x,
'memorialibre'=>$x,
'memoriatotal'=>$x,
'hddlibre'=>$x,
'hddtotal'=>$x,
'manurb'=>$x,
'mikrotik'=>$x,
'usershp'=>$x,
'conectadoshp'=>$x,
'conectadoppp'=>$x,);

	echo json_encode($data);
}
 
 




 ?>