<?php
//incluir archivo de conexion
require 'includes/Conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Informe</title>
	<link rel="stylesheet" type="text/css" href="design/style.css">
	<link rel="icon" type="image/JPG" href="design/icon.ico">
</head>
<body>
	<header>
		<h1>Reporta a SST</h1>
	</header>
	<main class="contenedor">
		<form action="includes/Export.php" method="POST" name="frm">
			<h2>Actos & Condiciones inseguras</h2>	
			<p>Fecha inicial</p>
			<input type="date" name="inicio"><br/>
			<p>Fecha final</p>
			<input type="date" name="final"><br/>
			<h2>Descarga de informe</h2>
			<input type="submit" value="Descargar" />
		</form>
	<main>
	<footer>
		<h3>Todos los derechos reservados</h3>
	</footer>
</body>
</html>