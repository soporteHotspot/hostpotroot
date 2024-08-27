<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$_SERVER['HTTP_HOST'];?><?=$_SERVER['REQUEST_URI'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <link 
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="logo/favicon.jpg"
    />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="fontawesome611/css/all.css">
 
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="css/adminlte.css">
   <link rel="stylesheet" href="css/body.css">
  <!-- Google Font: Source Sans Pro -->

  
  
   <!-- DataTables -->
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="css/responsive.bootstrap4.min.css">
</head>
    

<body>

	<?php

$server="localhost";
$usernamebase="root";
$passwordbase="";
$database="mikrotik3";
$Portmysql="3306";
$mysqli = new MySQLi($server, $usernamebase,$passwordbase);
if (!$mysqli) {
    die('No pudo conectarse: ' . mysql_error());
}

$createdb = 'CREATE DATABASE '.$database;
if (mysqli_query($mysqli,$createdb ) ) {

//star tables
// Cremos la conexión con el servidor de datos
$conn = new  MySQLi($server,$usernamebase,$passwordbase, $database,$Portmysql);
// Verificamos la conexión con el servidor MySQL
if ($conn->connect_error) {
    die("la conexión ha fallado: " . $conn->connect_error);
}
print '<div class="alert alert-success" role="alert">
  base de datos crado '.$database.'
</div>';
// sql Crea la tabla usando Lenguaje PHP
$botones = "CREATE TABLE `botones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `server` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `precio` varchar(100) NOT NULL,
  `legend` varchar(100) NOT NULL,
  `mikrotik` varchar(50) NOT NULL,
  `idsucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";

// Se verifica si la tabla ha sido creado
if ($conn->query($botones) === TRUE) {
    print '<div class="alert alert-success" role="alert">
  Tabla botones creado correctamente
</div>';
} else {
    print '<div class="alert alert-warning" role="alert">
  error al crear tabla botones
</div>' . $conn->error;

}



$cards = "CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `server` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `limituptime` varchar(20) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `mikrotik` text NOT NULL,
  `descripcion` text NOT NULL,
  `idsucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";

// Se verifica si la tabla ha sido creado
if ($conn->query($cards) === TRUE) {
    print '<div class="alert alert-success" role="alert">
  Tabla cards creado correctamente
</div>';
} else {
    print '<div class="alert alert-warning" role="alert">
  error al crear tabla cards
</div>' . $conn->error;
}


$cortes = "CREATE TABLE `cortes` (
  `id` int(11) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` varchar(200) NOT NULL,
  `responsable` varchar(100) NOT NULL,
  `vendedor` varchar(200) NOT NULL,
  `porcentaje` varchar(50) NOT NULL,
  `comision` varchar(100) NOT NULL,
  `restante` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `nota` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;";

// Se verifica si la tabla ha sido creado
if ($conn->query($cortes) === TRUE) {
    print '<div class="alert alert-success" role="alert">
  Tabla cortes creado correctamente
</div>';
} else {
    print '<div class="alert alert-warning" role="alert">
  error al crear tabla cortes
</div>' . $conn->error;
}



$fichas = "CREATE TABLE `fichas` (
  `id` int(11) NOT NULL,
  `fecha` text NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `precio` varchar(100) NOT NULL,
  `vendedor` varchar(100) NOT NULL,
  `mikrotik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";

// Se verifica si la tabla ha sido creado
if ($conn->query($fichas) === TRUE) {
    print '<div class="alert alert-success" role="alert">
  Tabla fichas creado correctamente
</div>';
} else {
    print '<div class="alert alert-warning" role="alert">
  error al crear tabla fichas
</div>' . $conn->error;
}

$routerboard = "CREATE TABLE `routerboard` (
  `id` int(20) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `puerto` int(5) NOT NULL,
  `idsucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;";

// Se verifica si la tabla ha sido creado
if ($conn->query($routerboard) === TRUE) {
    print '<div class="alert alert-success" role="alert">
  Tabla routerboard creado correctamente
</div>';
} else {
    print '<div class="alert alert-warning" role="alert">
  error al crear tabla routerboard
</div>' . $conn->error;
}

$sistema = "CREATE TABLE `sistema` (
  `id` int(11) NOT NULL,
  `sistema` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `idusuario` varchar(100) NOT NULL,
  `idpassword` varchar(100) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `zona` text NOT NULL,
  `moneda` text NOT NULL,
  `modo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;";

// Se verifica si la tabla ha sido creado
if ($conn->query($sistema) === TRUE) {
    print '<div class="alert alert-success" role="alert">
  Tabla sistema creado correctamente
</div>';
} else {
    print '<div class="alert alert-warning" role="alert">
  error al crear tabla sistema
</div>' . $conn->error;
}





$sucursal = "CREATE TABLE `sucursal` (
  `id` int(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `texto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;";

// Se verifica si la tabla ha sido creado
if ($conn->query($sucursal) === TRUE) {
    print '<div class="alert alert-success" role="alert">
  Tabla sucursal creado correctamente
</div>';
} else {
    print '<div class="alert alert-warning" role="alert">
  error al crear tabla sucursal
</div>' . $conn->error;
}










//end tables


     
} else {
    echo 'Error al crear la base de datos: ' . mysql_error() . "\n";
}
?>