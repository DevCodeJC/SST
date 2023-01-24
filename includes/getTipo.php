<?php
header ('Content-type: text/html; charset=utf-8');
require 'Conexion.php';
mysql_query("SET NAMES 'UTF8'");
$id_cat = $_POST['id_cat'];
$querycat = "SELECT id_tipo, nom_tipo FROM Tipos WHERE id_cat = '$id_cat'";
$resultadoT = mysqli_query($cx,$querycat);

$html2 = "<option value=0>Seleccione</option>";

while($rowT = mysqli_fetch_assoc($resultadoT)){
	$html2 = "<option value='".$rowT['id_tipo']."'>".$rowT['nom_tipo']."</option>";
	echo $html2;
	}
//echo $html2;

?>