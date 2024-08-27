	 
<?php

require_once '../require/routerboard.phar';

if ($API->connect($ip,$Usuario,$password,$puerto)) {
    $ip =$_SESSION['ip'];
	$time= $_POST['limituptime'];
    $precio= $_POST['precio']; 
    $type=$_POST['caracteres']; 
     $long=$_POST['longitud'];
    $cantidad= $_POST['cantidad']; 

 

        require("../require/connect_db.php");
        $obtenerda=("SELECT * FROM sistema");
        $datax=mysqli_query($mysqli,$obtenerda);    
        $data=mysqli_fetch_array($datax);        
        $zone=$data['zona'];
        date_default_timezone_set($zone);
        $fecha=date("d-m-Y");



        $obtenercard=("SELECT * FROM cards WHERE mikrotik='$ip' AND limituptime='$time'");
        $datay=mysqli_query($mysqli,$obtenercard);    
        $datos=mysqli_fetch_array($datay);        
        $server=$datos['server'];
        $profile=$datos['profile'];           
        $comment=$precio." -".$fecha;

  
 
 
function generarCodigo($longitud) {
 $key = '';
 $caracteres =  $type;
 $max = strlen($caracteres)-1;
 for($i=0;$i < $longitud;$i++) $key .= $caracteres{mt_rand(0,$max)};
 return $key;
}

for($n=1; $n <= $cantidad; $n++) { 

 $username=generarCodigo($long);	
$password=generarCodigo($long);

$API->comm("/ip/hotspot/user/add", array(
        'server' => $server,
        'name' => $username,

        'profile' =>  $profile,
		'limit-uptime' =>  $time,
		'comment' =>  $comment
    )
	
	
);

}	

 echo '<div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
  <strong>Correcto</strong>  Usuarios generados correctamente puede buscarlo con el comentario '. $comment.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;	 	
}

//if ($cantidad>500){
	
//	$cantidad=10;
//}


/*$n=1;	
 while ($n ++ <= $cantidad) { 

 $username=generarCodigo($longitud);	
$password=generarCodigo($longitud);

$API->comm("/ip/hotspot/user/add", array(
        'server' => $servidor,
        'name' => $username,
        'password' => $username,
        'profile' =>  $profile,
		'limit-uptime' =>  $tiempo,
		'comment' =>  $comentario
    )
	
	
);

}	

echo 1;	 	
}

*/

else {
	
	 echo '<div class="alert alert-warning alert-dismissible fade show mb-2" role="alert">
  <strong>Error! </strong>  Error! no se agregaron los registros 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>' ;
}

	
?>
 