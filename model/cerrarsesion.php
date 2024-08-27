<?php 
session_start();

if(isset($_SESSION['nombre'])){
 
$usuario=$_SESSION['nombre'];
}
else{

$usuario=$_SESSION['username'];
}

$data=$usuario;
session_destroy();
 
echo $data;?>