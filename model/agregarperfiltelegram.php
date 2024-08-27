	 
<?php

require_once '../require/routerboard.phar';
//Use any PEAR2_Net_RouterOS class from here on


if ($API->connect($ip,$Usuario,$password,$puerto)) {
	
$nombre= $_POST['nombrep'];
$nombre= $_POST['nombrep'];
$nombre = str_replace(' ', '-', $nombre);
$velocidad=$_POST['velocidadp'];
$nusuarios=	$_POST['nusuariosp'];
$cokie=	$_POST['cookiep'];

$tipo=	$_POST['tipop'];
$token=	$_POST['token'];
$idchat=	$_POST['idchat'];

$scripdisabled='{[:local t [/ip hotspot user get [find name="$user"] limit-uptime]; :local connectedt "FICHA :$user, conectado en:  $[/system identity get name] TIEMPO:$t,  $"mac-address",  IP: $address, hora: $[/system clock get time], fecha: $[/system clock get date]"; /tool fetch url="https://api.telegram.org/bot'.$token.'/sendMessage\?chat_id='.$idchat.'Channel&text=$connectedt" keep-result=no] [:local getcom [/ip hotspot user get "$user" comment]; /ip hotspot user set $user comment="$getcom $user  conectad@  hora: $[/system clock get time] fecha: $[/system clock get date]"] [/system scheduler add comment=" El usuario $user se deshabilitara automaticamente" name=$user on-event="[/tool fetch url=\"https://api.telegram.org/bot'.$token.'/sendMessage\?chat_id='.$idchat.'Channel&text=$user deshabilitado hora: \$[/system clock get time], fecha: \$[/system clock get date]\" keep-result=no] \5B\2F\69\70\20\68\20\75\20\73\65\74\20\22$user\22\20\64\69\73\3D\22\79\65\73\22\5D \r\ \n\5B\2F\73\79\73\20\73\63\68\20\73\65\74\20\22$user\22\20\69\6E\74\65\72\3D\30\30\3A\30\31\3A\30\30\5D \r\ \n\5B\2F\69\70\20\68\6F\74\73\70\6F\74\20\61\63\74\69\76\65\20\72\65\6D\6F\76\65\20\5B\66\69\6E\64\20\75\73\65\72\3D\22$user\22\5D\5D \r\ \n\5B\2F\69\70\20\68\6F\74\73\70\6F\74\20\63\6F\6F\6B\69\65\20\72\65\6D\6F\76\65\20\5B\66\69\6E\64\20\75\73\65\72\3D\22$user\22\5D\5D \r\ \n\3A\64\65\6C\61\79\20\32\r\ \n\5B\2F\73\79\73\20\73\63\68\20\72\65\6D\20\22$user\22\5D \r\ " interval=[/ip hotspot user get "$user" limit-uptime]]}';
//$scripdisabled=  base64_decode($scripdisabled);

$scriptdelete='{[:local t [/ip hotspot user get [find name="$user"] limit-uptime]; :local connectedt "FICHA :$user, conectado en:  $[/system identity get name] TIEMPO:$t,  $"mac-address",  IP: $address, hora: $[/system clock get time], fecha: $[/system clock get date]"; /tool fetch url="https://api.telegram.org/bot'.$token.'/sendMessage\?chat_id='.$idchat.'Channel&text=$connectedt" keep-result=no] [/ip hotspot user set $user comment=" $user  conectad@  hora: $[/system clock get time] fecha: $[/system clock get date]"] [/system scheduler add comment=" El usuario $user se eliminara automaticamente" name=$user on-event="[/tool fetch url=\"https://api.telegram.org/bot'.$token.'/sendMessage\?chat_id='.$idchat.'Channel&text=$user eliminado hora: \$[/system clock get time], fecha: \$[/system clock get date]\" keep-result=no] \5B\2F\69\70\20\68\20\75\20\73\65\74\20\22$user\22\20\64\69\73\3D\22\79\65\73\22\5D \r\ \n\5B\2F\73\79\73\20\73\63\68\20\73\65\74\20\22$user\22\20\69\6E\74\65\72\3D\30\30\3A\30\31\3A\30\30\5D \r\ \n\5B\2F\69\70\20\68\6F\74\73\70\6F\74\20\61\63\74\69\76\65\20\72\65\6D\6F\76\65\20\5B\66\69\6E\64\20\75\73\65\72\3D\22$user\22\5D\5D \r\ \n\5B\2F\69\70\20\68\6F\74\73\70\6F\74\20\63\6F\6F\6B\69\65\20\72\65\6D\6F\76\65\20\5B\66\69\6E\64\20\75\73\65\72\3D\22$user\22\5D\5D \r\ \n\3A\64\65\6C\61\79\20\32\r\ \n\5B\2F\73\79\73\20\73\63\68\20\72\65\6D\20\22$user\22\5D \r\ \n\5B\2F\69\70\20\68\20\75\20\72\65\6D\20\22$user\22\5D" interval=[/ip hotspot user get "$user" limit-uptime]]}';
//$scriptdelete=  base64_decode($scriptdelete);

 

$comentario='{  :local in [/ip hotspot user get "$user" comment];  [/ip hotspot user set $user comment=" $in  conectad@  hora: $[/system clock get time]  fecha: $[/system clock get date]"]}';
//$comentario= base64_decode($comentario);

$taskdelete =':local p "'.$nombre.'"; foreach u in [/ip h u f profile="$p"] do={ :if ([/ip h u get $u limit-u] <= [/ip h u get $u upt]) do={/ip h u rem $u } }';

$taskdisabled =':local p "'.$nombre.'"; foreach u in [/ip h u f profile="$p"] do={ :if ([/ip h u get $u limit-u] <= [/ip h u get $u upt]) do={[/ip h u set $u dis="yes"] } }';

 if ($tipo==0){
$API->comm("/ip/hotspot/user/profile/add", array(
       "name" =>  $nombre,		  
		 "shared-users" => $nusuarios,
	     "rate-limit" => $velocidad,
	     "on-login" => $scripdisabled,
	     "mac-cookie-timeout" => $cokie
   ));

echo 1;	 
	 
 }


 	else if ($tipo==1){
		
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
	     'on-login' => $comentario,
	     'mac-cookie-timeout' => $cokie
   ));
   
   $API->comm("/system/scheduler/add", array(
         'name' =>  $nombre,
         'interval' => "5m",
         'on-event' => $taskdelete,		 
		   'comment' => "monitoreo ".$nombre
			
    )
	);

echo 1;
		
	}


		else if ($tipo==3){
		
		$API->comm("/ip/hotspot/user/profile/add", array(
       'name' =>  $nombre,		  
		 'shared-users' => $nusuarios,
	     'rate-limit' => $velocidad,
	     'on-login' => $comentario,
	     'mac-cookie-timeout' => $cokie
   ));
   
   $API->comm("/system/scheduler/add", array(
         'name' =>  $nombre,
         'interval' => "5m",
         'on-event' => $taskdisabled,		 
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
 
