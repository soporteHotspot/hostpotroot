<?php

$nombre_fichero = '../../voucher/'.$_POST['nombre'];


if (is_dir($nombre_fichero)) {

     $files = glob($nombre_fichero.'/*'); //obtenemos todos los nombres de los ficheros
foreach($files as $file){
    if(is_file($file))
    unlink($file); //elimino fichers internos
}
    
    rmdir($nombre_fichero); //elimino el directorio
    echo 1;
} else {
    echo "El fichero   no existe";
}
?>