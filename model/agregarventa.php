	 
<?php
//session_start();



  require("../require/connect_db.php");
  require_once '../require/routerboard.phar';
 
	 //reseteo de ids
$sql11 = "SELECT COUNT(*) total FROM fichas";
$result = mysqli_query($mysqli, $sql11);
$serv = mysqli_fetch_assoc($result);
$idss=$serv['total'];

if($idss>=0){ 
mysqli_query($mysqli,"ALTER TABLE fichas AUTO_INCREMENT =1");

}

//fin de resteo;
       
        $obtenerda=("SELECT * FROM sistema");
        $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);
        $zone=$data['zona'];
        $moneda=$data['moneda'];
         $modologin=$data['modo'];

        date_default_timezone_set($zone);
 

   

        
 


if ($API->connect($ip,$Usuario,$password)) {	
 $obtenerDNS= $API->comm("/ip/hotspot/print", array(
            ".proplist" => "ip-of-dns-name",           
            ));
    $dnsname = $obtenerDNS[0];
    $ip = $dnsname['ip-of-dns-name'];
    $id= $_POST['id'];

 require("../require/connect_db.php");


    $obtenerda=("SELECT * FROM botones WHERE id='$id'");
    $datax=mysqli_query($mysqli,$obtenerda);    
    $data=mysqli_fetch_array($datax);
	  $id=$data['id'];
	  $nombre=$data['nombre'];
	  $servidor=$data['server'];
	  $profile=$data['perfil'];
	  $tiempo=$data['tiempo'];


      if (isset($tiempo)){     
      $ltiempo2 =$tiempo;
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

       else if ($ltiempo2=="0"){

$ltiempo="Ilimitado";
      }

else 
      {     $ltiempo3 = str_replace("w", " SEMANAS ", $ltiempo2);
            $ltiempo4 = str_replace("d", " Días", $ltiempo3);
            $ltiempo5 = str_replace("h", " Horas. ", $ltiempo4);
            $ltiempo = str_replace("m", " Minutos ", $ltiempo5);}

    }
    else {
      $ltiempo ="Ilimitado";
    }
    $price=$data['precio'];
    $price=number_format($price,2);
    $longitud=$data['legend'];
     
    $fecha=date("d-m-Y");
    $vendedor =$_SESSION['username'];
 
    
     $obtenerper= $API->comm("/ip/hotspot/user/profile/print", array(
            ".proplist" => ".id",
            "?name" => $profile,
            ));

     $total=count($obtenerper);
	if ($total==0){$data= 3; echo json_encode($data);}
	else {
 
    

$permitted_chars = '0987456321';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $GetUP = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $GetUP .= $random_character;
    }
 
    return $GetUP;
}
 
 


     $username=generate_string($permitted_chars, $longitud);	
     $password=generate_string($permitted_chars, $longitud);

       
    



/// si es PIn usuario = contras

if($modologin==10)

{ 
   $API->comm("/ip/hotspot/user/add", array(
        'server' => $servidor,
        'name' => $username,
        
        'profile' =>  $profile,
		'limit-uptime' =>  $tiempo,
		'comment' => $code."up ".$vendedor." ".$fecha
    )


	
);
   require("../require/connect_db.php");
 

mysqli_query($mysqli,"INSERT INTO `fichas` (`fecha`, `perfil`, `tiempo`, `user`, `pass`, `precio`, `vendedor`, `mikrotik`) VALUES ('$fecha', '$profile', '$tiempo', '$username', '$username', '$price', '$vendedor','$ip')");


$data=array('server' => $servidor,
        'name' => $username,

        'password' => $username,
        'profile' =>  $profile,
        'tiempo' =>  $ltiempo,
        'ip' => $ip,
        'precio' => $moneda." ".number_format($price,2) );


echo json_encode($data);

}
////fin


else if($modologin==20)

{ 

   $API->comm("/ip/hotspot/user/add", array(
        'server' => $servidor,
        'name' => $username,        
        'profile' =>  $profile,
        'limit-uptime' =>  $tiempo,
        'comment' => $code."up ".$vendedor." ".$fecha
    )


    
);
   require("../require/connect_db.php");
 

mysqli_query($mysqli,"INSERT INTO `fichas` (`fecha`, `perfil`, `tiempo`, `user`, `pass`, `precio`, `vendedor`, `mikrotik`) VALUES ('$fecha', '$profile', '$tiempo', '$username', '', '$price', '$vendedor','$ip')");


$data=array('server' => $servidor,
        'name' => $username,
        
        'profile' =>  $profile,
        'tiempo' =>  $ltiempo,
        'ip' => $ip,
        'precio' => $moneda." ".number_format($price,2));


echo json_encode($data);

}
////fin
 	 	

        else if($modologin==30)

{
   $API->comm("/ip/hotspot/user/add", array(
        'server' => $servidor,
        'name' => $username,
        
        'profile' =>  $profile,
        'limit-uptime' =>  $tiempo,
        'comment' => $code."up ".$vendedor." ".$fecha
    )


    
);
   require("../require/connect_db.php");
 

mysqli_query($mysqli,"INSERT INTO `fichas` (`fecha`, `perfil`, `tiempo`, `user`, `pass`, `precio`, `vendedor`, `mikrotik`) VALUES ('$fecha', '$profile', '$tiempo', '$username', '$password,', '$price', '$vendedor','$ip')");


$data=array('server' => $servidor,
        'name' => $username,
        
        'profile' =>  $profile,
        'tiempo' =>  $ltiempo,
        'ip' => $ip,
        'precio' => $moneda." ".number_format($price,2) );


echo json_encode($data);

}
////fin
}



}

 
else {
	$data =4;
    echo json_encode($data);
	 
}

	
?>
 
