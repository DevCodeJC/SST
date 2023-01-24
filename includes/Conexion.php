<?php
// datos para la conexion a mysql
$cx = mysqli_connect('localhost','root', 'root','reportesst'); // utlizar mysqli_connect
$selectDb = mysqli_select_db($cx,"reportesst"); // mysqli_select_db - primero la conexión, después el nombre de la BD 
mysqli_set_charset($cx, "utf8");
?>