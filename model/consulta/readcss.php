 <?php 


$archivo=$_POST['filecss'].".css";

  $ruta_archivo = '../../custom/estilos/'.$archivo;
if (file_exists($ruta_archivo)) {
             $archivo = fopen($ruta_archivo, 'r');
 
  while(!feof($archivo)) {
      echo fgets($archivo) ;
  }

  fclose($archivo);
        }else {
            echo "The file  $ruta_archivo   not exists";
        }


 ?>

 