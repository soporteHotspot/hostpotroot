 <?php 


$archivo=$_POST['filehtml'].".html";

  $ruta_archivo = '../../custom/html/'.$archivo;
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