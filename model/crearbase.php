<?php



$server=$_POST["server"];
$usernamebase=$_POST["usuario"];
$passwordbase=$_POST["password"];
$database=$_POST["basededatos"];

$mysqli = mysqli_connect($server, $usernamebase,$passwordbase);
if (!$mysqli) {
    die('No pudo conectarse: ' . mysql_error());
}





$createdb = 'CREATE DATABASE IF NOT EXISTS '.$database;
$sentencia=mysqli_query($mysqli,$createdb);


 

if ($sentencia) {
print '<div class="badge badge-success" role="alert">
  base de datos seleccionado '.$database.'
</div>';
//star tables
// Cremos la conexión con el servidor de datos
$conn = new  MySQLi($server,$usernamebase,$passwordbase, $database);
// Verificamos la conexión con el servidor MySQL
if ($conn->connect_error) {
    die("la conexión ha fallado: " . $conn->connect_error);
}

// sql Crea la tabla usando Lenguaje PHP


 $estilo= "CREATE TABLE IF NOT EXISTS  `estilo` (
  `id` text COLLATE utf8_bin NOT NULL,
  `colorpanel` varchar(50) COLLATE utf8_bin NOT NULL,
  `coloraside` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

// Se verifica si la tabla ha sido creado
if ($conn->query($estilo) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla estilo creado correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla estilo
</div>' . $conn->error;
}



$botones = "CREATE TABLE IF NOT EXISTS  `botones` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(100) NOT NULL,
  `server` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `precio` varchar(100) NOT NULL,
  `legend` varchar(100) NOT NULL,
  `mikrotik` varchar(50) NOT NULL,
  `idsucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

// Se verifica si la tabla ha sido creado
if ($conn->query($botones) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla botones creado correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla botones
</div>' . $conn->error;

}



$cards = "CREATE TABLE IF NOT EXISTS  `cards` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `server` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `limituptime` varchar(20) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `mikrotik` text NOT NULL,
  `descripcion` text NOT NULL,
  `idsucursal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

// Se verifica si la tabla ha sido creado
if ($conn->query($cards) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla cards creado correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla cards
</div>' . $conn->error;
}


$cortes = "CREATE TABLE IF NOT EXISTS  `cortes` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT";

// Se verifica si la tabla ha sido creado
if ($conn->query($cortes) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla cortes creado correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla cortes
</div>' . $conn->error;
}


$mailer= "CREATE TABLE IF NOT EXISTS  `mailer` (
  `id` int(10) NOT NULL,
  `nombreusuario` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `host` varchar(200) COLLATE utf8_bin NOT NULL,
  `cifrado` varchar(200) COLLATE utf8_bin NOT NULL,
  `puerto` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

// Se verifica si la tabla ha sido creado
if ($conn->query($mailer) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla mailer correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla mailer
</div>' . $conn->error;
}


$recoverydb= "CREATE TABLE IF NOT EXISTS  `recoverydb` (
  `id` int(50) NOT NULL,
  `code` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

// Se verifica si la tabla ha sido creado
if ($conn->query($recoverydb) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla recoverydb correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla recoverydb
</div>' . $conn->error;
}

$fichas = "CREATE TABLE IF NOT EXISTS  `fichas` (
  `id` int(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fecha` text NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `precio` varchar(100) NOT NULL,
  `vendedor` varchar(100) NOT NULL,
  `mikrotik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

// Se verifica si la tabla ha sido creado
if ($conn->query($fichas) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla fichas creado correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla fichas
</div>' . $conn->error;
}
$routerboard = "CREATE TABLE IF NOT EXISTS  `routerboard` (
  `id` int(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `ip` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `puerto` int(5) NOT NULL,
  `idsucursal` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci";

// Se verifica si la tabla ha sido creado
if ($conn->query($routerboard) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla routerboard creado correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla routerboard
</div>' . $conn->error;
}


$sistema = "CREATE TABLE IF NOT EXISTS  `sistema` (
  `id` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `sistema` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `idusuario` varchar(100) NOT NULL,
  `idpassword` varchar(100) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `zona` text NOT NULL,
  `moneda` text NOT NULL,
  `modo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

// Se verifica si la tabla ha sido creado
if ($conn->query($sistema) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla sistema creado correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla sistema
</div>' . $conn->error;
}





$sucursal = "CREATE TABLE IF NOT EXISTS  `sucursal` (
  `id` int(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `texto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

// Se verifica si la tabla ha sido creado
if ($conn->query($sucursal) === TRUE) {
    print '<div class="badge badge-success" role="alert">
  Tabla sucursal creado correctamente
</div>';
} else {
    print '<div class="badge badge-warning" role="alert">
  error al crear tabla sucursal
</div>' . $conn->error;
}





//end tables


     
} else {
    echo 'Error al crear la base de datos: ' . mysql_error() . "\n";
}

?>