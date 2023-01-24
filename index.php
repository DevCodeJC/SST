<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Reporta a SST</title>
	<script languaje="javascript" src="js/jquery-3.5.1.min.js"></script>
	<script languaje="javascript">
		$(document).ready(function(){
			$("#area").change(function(){
				$("#area option:selected").each(function(){
					id_area = $(this).val();
					$.post("includes/getCargo.php",{id_area: id_area
					}, function(data){
						$("#cargo").html(data);
					});
				});
			});
		});
		
		$(document).ready(function(){
			$("#categoria").change(function(){
				$("#categoria option:selected").each(function(){
					id_cat = $(this).val();
					$.post("includes/getTipo.php",{id_cat: id_cat
					}, function(data){
						$("#tipo").html(data);
					});
				});
			});
		});
		
	</script>
	<link rel="stylesheet" type="text/css" href="design/style.css">
	<link rel="icon" type="image/JPG" href="design/icon.ico">
</head>
<?php
//incluir archivo de conexion
require 'includes/Conexion.php';
$query = "SELECT id_area, nom_area FROM areas ORDER BY nom_area ASC";
$query2 = "SELECT id_cat, nom_cat FROM categorias ORDER BY nom_cat ASC";
$resultado = mysqli_query($cx,$query);
$resultado2 = mysqli_query($cx,$query2);
?>
<body>
<header>
	<h1>Laboratorios Siegfried</h1>
</header>
<main class="contenedor">	
	<form action="includes/new.php" method="POST" name="frm1" accept-charset="utf-8">
	<h2>Actos & Condiciones inseguras</h2>
		<input type="number" min="1" max= "9999999999" placeholder="Cédula" name="cedula" required><br/>
		<input type="text" placeholder="Nombre y apellido" name="nombre" maxlength="60" required><br/>
		<select id=area name=area required>
		
			<option value="">Área</option>
			<?php while ($row = mysqli_fetch_assoc($resultado)){  ?>
				<option value="<?php echo $row['id_area']; ?>"><?php echo $row['nom_area']; ?></option>
			<?php } ?>
			
		</select><br/>
		<select id=cargo name=cargo required>
			<option value="">Cargo</option required>
		</select><br/>
		<select id=categoria name=categoria required>
			<option value="">Categoría</option>
			
			<?php while ($row2 = mysqli_fetch_assoc($resultado2)){  ?>
				<option value="<?php echo $row2['id_cat']; ?>"><?php echo $row2['nom_cat']; ?></option>
			<?php } ?>
			
		</select><br/>
		<select id=tipo name=tipo required>
			<option value="">Seleccione</option>
		</select><br/>
		<input type="text" placeholder="Lugar del suceso" name="lugar" maxlength="60" required><br/>
		<textarea placeholder="Detalles" maxlength="400" name="detalles"></textarea><br/>

		<input type="submit" value="Enviar" />
	</form>

	<footer>
		<h3>Todos los derechos reservados</h3>
	</footer>
</main>
</body>
</html>