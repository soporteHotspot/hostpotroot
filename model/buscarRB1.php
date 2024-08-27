<?php
require("../require/connect_db.php");


$sql = "SELECT * FROM routerboard WHERE nombre='" . $_POST['nombre'] . "'";
$res = $mysqli->query($sql);
$data = $res->fetch_array();
echo json_encode($data);
?>