<?php
 
$nombre_fichero = '../../backup/'.$_POST['nombre'];

if (file_exists($nombre_fichero)) {
	unlink($nombre_fichero);
    echo 1;
} else {
    echo 3;
}
?>