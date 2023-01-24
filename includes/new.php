<?php
//incluir archivo de conexion
require 'Conexion.php';

$cedula = mysqli_real_escape_string( $cx, $_POST['cedula'] );
$nombre = mysqli_real_escape_string( $cx, $_POST['nombre'] );
$cargo = mysqli_real_escape_string( $cx, $_POST['cargo'] );
$tipo = mysqli_real_escape_string( $cx, $_POST['tipo'] );
$lugar = mysqli_real_escape_string( $cx, $_POST['lugar'] );
$detalles = mysqli_real_escape_string( $cx, $_POST['detalles'] );

$insertar="INSERT INTO registros(cedula, nombre, id_cargo, id_tipo, lugar, detalles, fecha_reg) 
VALUES ('$cedula','$nombre','$cargo','$tipo','$lugar','$detalles',CURTIME())";
mysqli_query($cx,$insertar);
//Comprobacion para envio de e-mail
include "EnviarEmail.php";
echo "<script>alert (' ¡Reporte generado exitosamente! ');
window.location='/SST/index.php'</script>";
?>