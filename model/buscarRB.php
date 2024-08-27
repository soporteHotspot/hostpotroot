<?php
require("../require/connect_db.php");


$sql = "SELECT * FROM routerboard WHERE id='" . $_POST['idr'] . "'";
$res = $mysqli->query($sql);
$data = $res->fetch_array();
echo json_encode($data);
?>