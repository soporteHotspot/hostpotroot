	
<?php


//$sever="localhost";
//$user="root";
//$password="";
//$database="mikrotik";
//$port="3306";

$sever=$_POST["server"];
$user=$_POST["usuario"];
$password=$_POST["password"];
$database=$_POST["basededatos"];


$fileconect='../require/connect_db.php';
$archivo=fopen($fileconect, 'w');


if($archivo)
{fwrite($archivo, "<?php". PHP_EOL);

 fwrite($archivo, '$server="'.$sever.'";'. PHP_EOL);
 fwrite($archivo, '$usernamebase="'.$user.'";'. PHP_EOL);
 fwrite($archivo, '$passwordbase="'.$password.'";'. PHP_EOL);
 fwrite($archivo, '$database="'.$database.'";'. PHP_EOL);
 fwrite($archivo, '$mysqli = new MySQLi($server,$usernamebase,$passwordbase, $database);'. PHP_EOL);
 fwrite($archivo, '$mysqli->set_charset("utf8");'. PHP_EOL);
 fwrite($archivo, 'include_once "errores.php";'. PHP_EOL);
 
 


fwrite($archivo, "?>" . PHP_EOL);

fclose($archivo);


  $data=1;

print json_encode($data);
 


}

else {

$data=3;

print json_encode($data);
}
?>