<?php

$include = '../require/routeros_api.class.php';

if (file_exists($include)) {
  
 
$ip=$_POST['address'];
$Usuario=$_POST['username'];
$password=$_POST['password'];
$sucursal=$_POST['sucursal'];
$puerto=$_POST['puerto']; 



require_once($include);
$API = new RouterosAPI();

$API->debug = false;
$API->port = $puerto;

if ($API->connect($ip,$Usuario,$password)) {


//verificar si el usuarioexiste xd 

  $obtenerusers = $API->comm("/user/print", array(
            ".proplist" => ".id,comment",
            "?name" => $Usuario,
            ));
 
if (isset($obtenerusers[0]["comment"]))
  {$type=$obtenerusers[0]["comment"];}

else {$type="";}
 




  $cantidad=count($obtenerusers);


  //si el user existe

  if($cantidad==1){
    if($type=="administrador" || $type=="system default user" || $type==""){

 session_start(); 
 $_SESSION['ip']=$ip;
$_SESSION['username']=$Usuario;
$_SESSION['password']=$password;
$_SESSION['idsucursal']=$sucursal;
$_SESSION['puerto']=$puerto;
$_SESSION['tipo']="administrador";
$_SESSION['numero']=1;
if(isset($_POST['nombreuser'])){
$_SESSION['nombre']=$_POST['nombreuser'];
$usuario=$_SESSION['nombre'];
}
else{

$usuario=$_SESSION['username'];
}




$data=array('login'=> 1,
            'username' => $usuario
);



echo json_encode($data);
 
  $API->disconnect();




    }


else if($type=="vendedor"){
  session_start(); 
 $_SESSION['ip']=$ip;
$_SESSION['username']=$Usuario;
 
$_SESSION['password']=$password;
$_SESSION['idsucursal']=$sucursal;
$_SESSION['puerto']=$puerto;
$_SESSION['tipo']="vendedor";
$_SESSION['numero']=2;
if(isset($nombre)){
$_SESSION['nombre']=$nombre;
$usuario=$_SESSION['nombre'];
}
else{

$usuario=$_SESSION['username'];
}
$data=array('login'=> 0,
            'username' => $usuario
);




echo json_encode($data);
  $API->disconnect();

}

else  {
  
$data= "Cambie comentario del usuario actual por administrador o vendedor en su mikrotik para ingresar, comentario actual: ".$type;

echo json_encode($data);
  $API->disconnect();

}


  }

 

}

else {  //si el no conecta  
   $data =2;
echo json_encode($data);

}


}


 else { //si el phar no existe  
   $data =3;
echo json_encode($data);
}




 ?>
 