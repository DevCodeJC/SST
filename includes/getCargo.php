
<?php
require 'Conexion.php';
mysql_query("SET NAMES 'UTF8'");
$id_area = $_POST['id_area'];
$querycargo = "SELECT id_cargo, nom_cargo FROM Cargos WHERE id_area = '$id_area' ORDER BY nom_cargo ASC";
$resultadoC = mysqli_query($cx,$querycargo);

$html = "<option value=0>Cargo</option>";

while($rowC = mysqli_fetch_assoc($resultadoC)){
	$html = "<option value='".$rowC['id_cargo']."'>".$rowC['nom_cargo']."</option>";
	echo $html;
	}
//echo $html;

?>