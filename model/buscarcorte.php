<?php
require("../require/connect_db.php");
 
$sql = "SELECT * FROM cortes WHERE id='". $_POST['id'] . "'";
$res = $mysqli->query($sql);
$data = $res->fetch_array();
echo json_encode($data);
?>