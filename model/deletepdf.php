<?php

$carpeta=$_POST['carpeta'];
$nombre_fichero = '../../voucher/'.$carpeta.'/'.$_POST['nombre'];

if (file_exists($nombre_fichero)) {
	unlink($nombre_fichero);
    echo 1;
} else {
    echo "El fichero   no existe";
}
?>