<?php
//incluir archivo de conexion
require 'includes/Conexion.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Informe</title>
	<link rel="stylesheet" type="text/css" href="design/Estilo.css">
	<link rel="icon" type="image/JPG" href="design/favicon.jpg">
</head>
<body>

<form action="includes/Export.php" method="POST" name="frm">
<h1>Descarga de informe</h1>
	
	<h3>Desde</h3>
	<input type="date" name="inicio"><br/>
	<h3>Hasta</h3>
	<input type="date" name="final"><br/>
	<input type="submit" class="descarga" value="Descargar" />
</form>
</body>
</html>