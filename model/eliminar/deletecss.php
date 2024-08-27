<?php
 
$nombre_fichero = '../../custom/estilos/'.$_POST['estilo'].".css";

$nombre_ficherohtml = '../../custom/html/'.$_POST['estilo'].".html";
$nombre_ficherophp = '../../custom/'.$_POST['estilo'].".php";



if (file_exists($nombre_fichero)) {
	unlink($nombre_fichero);
     echo 1;
} 
else {
    echo 3;
}



if (file_exists($nombre_ficherohtml)) {
    unlink($nombre_ficherohtml);
    echo 1;
} 
else {
    echo 3;
}



if (file_exists($nombre_ficherophp)) {
    unlink($nombre_ficherophp);
     echo 1;
} 
 else {
    echo 3;
}




?>