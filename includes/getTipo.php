<?php
require 'Conexion.php';
$id_cat = $_POST['id_cat'];
$querycat = "SELECT id_tipo, nom_tipo FROM tipos WHERE id_cat = '$id_cat' ORDER BY nom_tipo ASC";
$resultadoT = mysqli_query($cx,$querycat);

$html2 = "<option value=0>Seleccione</option>";

while($rowT = mysqli_fetch_assoc($resultadoT)){
	$html2 = "<option value='".$rowT['id_tipo']."'>".$rowT['nom_tipo']."</option>";
	echo $html2;
	}
//echo $html2;

?>