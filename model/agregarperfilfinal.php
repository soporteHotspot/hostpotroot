	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on


if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
	$nombre= $_POST['nombrep'];
$velocidad=$_POST['velocidadp'];
$nusuarios=	$_POST['nusuariosp'];
$cokie=	$_POST['cookiep'];

$tipo=	$_POST['tipop'];
$scriptdelete='{  [/ip hotspot user set $user comment=" $user  conectad@  hora: $[/system clock get time] fecha: $[/system clock get date]"] [/system scheduler add comment=" El usuario $user se eliminara automaticamente" name=$user on-event="\n\5B\2F\69\70\20\68\20\75\20\73\65\74\20\22$user\22\20\64\69\73\3D\22\79\65\73\22\5D \r\ \n\5B\2F\73\79\73\20\73\63\68\20\73\65\74\20\22$user\22\20\69\6E\74\65\72\3D\30\30\3A\30\31\3A\30\30\5D \r\ \n\2F\69\70\20\68\6F\74\73\70\6F\74\20\75\73\65\72\20\72\65\6D\6F\76\65\20\22$user\22 \r\ \n\2F\69\70\20\68\6F\74\73\70\6F\74\20\61\63\74\69\76\65\20\72\65\6D\6F\76\65\20\5B\66\69\6E\64\20\75\73\65\72\3D\22$user\22\5D \r\ \n\2F\69\70\20\68\6F\74\73\70\6F\74\20\63\6F\6F\6B\69\65\20\72\65\6D\6F\76\65\20\5B\66\69\6E\64\20\75\73\65\72\3D\22$user\22\5D \r\ \n\3A\64\65\6C\61\79\20\32\r\ \n\5B\2F\73\79\73\20\73\63\68\20\72\65\6D\20\22$user\22\5D \r\ \n\5B\2F\69\70\20\68\20\75\20\72\65\6D\20\22$user\22\5D" interval=[/ip hotspot user get "$user" limit-uptime]]}';

$scriptpause='{  [/ip hotspot user set $user comment=" $user  conectad@  hora: $[/system clock get time]  fecha: $[/system clock get date]"]}';

$task =':local perfil "'.$nombre.'"; foreach i in [/ip hotspot user find profile="$perfil"] do={ :if ([/ip hotspot user get $i limit-uptime] <= [/ip hotspot user get $i uptime]) do={/ip hotspot user remove $i } }';

 if ($tipo==1){
$API->comm("/ip/hotspot/user/profile/add", array(
       "name" =>  $nombre,		  
		 "shared-users" => $nusuarios,
	     "rate-limit" => $velocidad,
	     "on-login" => $scriptdelete,
	     "mac-cookie-timeout" => $cokie
   ));

echo 1;	 
	 
 }
	else if ($tipo==2){
		
		$API->comm("/ip/hotspot/user/profile/add", array(
       'name' =>  $nombre,		  
		 'shared-users' => $nusuarios,
	     'rate-limit' => $velocidad,
	     'on-login' => $scriptpause,
	     'mac-cookie-timeout' => $cokie
   ));
   
   $API->comm("/system/scheduler/add", array(
         'name' =>  $nombre,
         'interval' => "5m",
         'on-event' => $task,		 
		   'comment' => "monitoreo ".$nombre
			
    )
	);

echo 1;
		
	}
	
	
	}
 
 else {
	 
	 echo 3;
 }
 
 
  
?>
 