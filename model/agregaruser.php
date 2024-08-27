	 
<?php

require_once '../require/routerboard.phar';
require("../require/connect_db.php");
if ($API->connect($ip,$Usuario,$password)) {
    $caducidad=$_POST['caducidad'];
    $vigencia=$_POST['fcaducidad'];
    $date=date_create($vigencia);
$monthNum = date_format($date,"m");
$dateObj   = DateTime::createFromFormat('!m', $monthNum);
$monthName = $dateObj->format('F'); 
$monthName= substr ( $monthName, 0, 3);
$fcaducidad= $monthName.date_format($date,"/d/Y");

$hcaducidad=$_POST['hcaducidad'];



 $obtenerDNS= $API->comm("/ip/hotspot/print", array(
            ".proplist" => "ip-of-dns-name",           
            ));
    $dnsname = $obtenerDNS[0];
    $ip = $dnsname['ip-of-dns-name'];
    $vendedor =$_SESSION['username'];

    $idcard=$_POST['id'];
    $des=$_POST['tiempo'];
    $precio=$_POST['precio'];
          
    $long=$_POST['longitud'];
    $cantidad= $_POST['cantidad'];
//if($cantidad>=500){$cantidad=501;}

    $obtenerda=("SELECT * FROM sistema");
    $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
       

        if(isset($data['zona']))
        {
        $zone=$data['zona'];
        $moneda=$data['moneda'];
        $modologin=$data['modo'];
            date_default_timezone_set($zone);
        }

        

        $fecha=date("d-m-Y h.i.s-A");
        $fechaactual=date("d-m-Y");
         require("../require/connect_db.php");
        $obtenercard=("SELECT * FROM cards WHERE id='$idcard'");
        $datay=mysqli_query($mysqli,$obtenercard);    
        $datos=mysqli_fetch_array($datay);        
        $servidor=$datos['server'];
        $profile=$datos['profile'];
        $tiempo=$datos['limituptime'];        
        $comentario=$precio." ".$vendedor."  ".$fecha;


	
 $obtenerper= $API->comm("/ip/hotspot/user/profile/print", array(
            ".proplist" => ".id,rate-limit",
            "?name" => $profile,
            ));
        

    $total=count($obtenerper);
    if ($total==0){$data= 3; echo json_encode($data);}
    else {

	   $Perfiles = $obtenerper['0'];  
     if (isset($Perfiles['rate-limit'])){           
            $velocidad=$Perfiles['rate-limit'];
        }
        else {
            $velocidad ="Ilimitado";
        }
 
 
 
 
$permitted_chars = $_POST['caracteres'];
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $GetUP = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $GetUP .= $random_character;
    }
 
    return $GetUP;
}


if($modologin==10)

{
    for($n=1; $n <= $cantidad; $n++) { 
        $usern=generate_string($permitted_chars, $long); 
    

  

$API->comm("/ip/hotspot/user/add", array(
        'server' => $servidor,
        'name' => $usern,
        'password' => $usern,
        'profile' =>  $profile,
        'limit-uptime' =>  $tiempo,
        'comment' =>  $comentario,
    )
    
    
);

 require("../require/connect_db.php");
 mysqli_query($mysqli,"INSERT INTO `fichas` (`fecha`, `perfil`, `tiempo`, `user`, `pass`, `precio`, `vendedor`, `mikrotik`) VALUES ('$fechaactual', '$profile', '$tiempo', '$usern', '$usern', '$precio', '$vendedor','$ip')"); 
} 


if($caducidad=="limitado")

  {  $API->comm("/system/scheduler/add", array(        
           'name' => $comentario,
            'start-date'=> $fcaducidad, // verificaremos fecha de corte lo tengo como vigencia
            'start-time'=>$hcaducidad,
            'interval'=>"00:01:00",  //script para deshabilitacion automatica por scheduler   
           'on-event' =>  '[:local p "'.$profile.'"; foreach u in [/ip h u f profile="$p"] do={ :if ([/ip h u get $u comment] = "'.$comentario.'") do={/ip h u rem $u } } ] [/sys sche remove [find name="'.$comentario.'"] ]',
           'comment'=> "CADUCIDAD ".$comentario." Generado ".$fecha
          ));  } 

$data=  array('comentario' =>  $comentario,'velocidad' =>  $velocidad);
echo json_encode($data);          
}
//fin



if($modologin==20)

{
    for($n=1; $n <= $cantidad; $n++) { 

 $usern=generate_string($permitted_chars, $long); 
  

$API->comm("/ip/hotspot/user/add", array(
        'server' => $servidor,
        'name' => $usern,        
        'profile' =>  $profile,
        'limit-uptime' =>  $tiempo,
        'comment' =>  $comentario,
    )
    
    
);

 require("../require/connect_db.php");
 mysqli_query($mysqli,"INSERT INTO `fichas` (`fecha`, `perfil`, `tiempo`, `user`, `precio`, `vendedor`, `mikrotik`) VALUES ('$fechaactual', '$profile', '$tiempo', '$usern', '$precio', '$vendedor','$ip')"); 
}    

if($caducidad=="limitado")

  {  $API->comm("/system/scheduler/add", array(        
           'name' => $comentario,
            'start-date'=> $fcaducidad, // verificaremos fecha de corte lo tengo como vigencia
            'start-time'=>$hcaducidad,
            'interval'=>"00:01:00",  //script para deshabilitacion automatica por scheduler   
           'on-event' =>  '[:local p "'.$profile.'"; foreach u in [/ip h u f profile="$p"] do={ :if ([/ip h u get $u comment] = "'.$comentario.'") do={/ip h u rem $u } } ] [/sys sche remove [find name="'.$comentario.'"] ]',
           'comment'=> "CADUCIDAD ".$comentario." Generado ".$fecha
          ));  } 
$data=  array('comentario' =>  $comentario,'velocidad' =>  $velocidad);
echo json_encode($data);           
}
//fin



else if($modologin==30)

{
    for($n=1; $n <= $cantidad; $n++) {


 $usern=generate_string($permitted_chars, $long); 
 $passw=generate_string($permitted_chars, $long);

$API->comm("/ip/hotspot/user/add", array(
        'server' => $servidor,
        'name' => $usern,
        'password' => $passw,
        'profile' =>  $profile,
        'limit-uptime' =>  $tiempo,
        'comment' =>  $comentario,
    )
    
    
);

 require("../require/connect_db.php");
 mysqli_query($mysqli,"INSERT INTO `fichas` (`fecha`, `perfil`, `tiempo`, `user`, `pass`, `precio`, `vendedor`, `mikrotik`) VALUES ('$fechaactual', '$profile', '$tiempo', '$usern', '$passw', '$precio', '$vendedor','$ip')"); 
  
}    

if($caducidad=="limitado")

  {  $API->comm("/system/scheduler/add", array(        
           'name' => $comentario,
            'start-date'=> $fcaducidad, // verificaremos fecha de corte lo tengo como vigencia
            'start-time'=>$hcaducidad,
            'interval'=>"00:01:00",  //script para deshabilitacion automatica por scheduler   
           'on-event' =>  '[:local p "'.$profile.'"; foreach u in [/ip h u f profile="$p"] do={ :if ([/ip h u get $u comment] = "'.$comentario.'") do={/ip h u rem $u } } ] [/sys sche remove [find name="'.$comentario.'"] ]',
           'comment'=> "CADUCIDAD ".$comentario." Generado ".$fecha
          ));  } 
$data=  array('comentario' =>  $comentario,'velocidad' =>  $velocidad);
echo json_encode($data);           
}
//fin


}


}

 

else {
	$data=4; echo  json_encode($data);
	  
}

	
?>
 
