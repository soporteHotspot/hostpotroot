<?php
$server="localhost";
$usernamebase="root";
$passwordbase="usbw";
$database="db_hotspot_control";
$mysqli = new MySQLi($server,$usernamebase,$passwordbase, $database);
$mysqli->set_charset("utf8");
include_once "errores.php";
?>
