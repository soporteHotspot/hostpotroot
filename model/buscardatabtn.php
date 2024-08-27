<?php
require("../require/connect_db.php");
$id=$_POST['id'];
$sql = "SELECT * FROM botones WHERE id='$id'";
$res = $mysqli->query($sql);
$data = $res->fetch_array();
echo json_encode($data);
?>