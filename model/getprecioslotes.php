<?php
require_once '../require/routerboard.phar';
require("../require/connect_db.php");

$ip =$_SESSION['ip'];
$idcard=$_POST['id'];
$sql = "SELECT * FROM cards WHERE id='$idcard' AND mikrotik='$ip'";
 
$data=mysqli_query($mysqli,$sql);
$verdata=mysqli_fetch_array($data);

$idcard=$verdata['id'];
$preciocard=$verdata['comment'];
     $data = array( 'idcard'=>$idcard,
                    'preciocard'=>$preciocard,
                   );
 
echo json_encode($data);
?>