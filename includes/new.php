<?php
//incluir archivo de conexion
require 'Conexion.php';
$insertar="INSERT INTO Registros(cedula, nombre, id_cargo, id_tipo, lugar, nivel, detalles, fecha_reg) 
VALUES ('$_POST[cedula]','$_POST[nombre]','$_POST[cargo]','$_POST[tipo]','$_POST[lugar]','$_POST[nivel]','$_POST[detalles]',CURTIME())";
mysqli_query($cx,$insertar);
//Comprobacion para envio de e-mail
if($_POST['nivel']=='Alto'){
	include "EnviarEmail.php";
	}
echo "<script>alert (' ¡Reporte generado exitosamente! ');
window.location='/SST/index.php'</script>";
?>