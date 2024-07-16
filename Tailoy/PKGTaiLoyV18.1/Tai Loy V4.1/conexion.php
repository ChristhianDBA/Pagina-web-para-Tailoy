<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "tailoydbyes";

$conexion = new mysqli($server, $user, $pass, $db);

if($conexion->connect_errno) {
    die("CONEXION NO ESTABLECIDA" . $conexion->connect_errno);
} else {
    
}
?>
