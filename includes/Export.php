<meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/> 
<?php

require 'Conexion.php';
$inicio=$_POST['inicio'];
$final=$_POST['final'];

if($inicio>$final){
	echo "<script>alert (' ¡La fecha final debe ser mayor a la inicial! ');
	window.location='/SST/Informe.php'</script>";
	
}else{
	$consulta = "SELECT `registros`.`id_reg`, `registros`.`cedula`, `registros`.`nombre`, `areas`.`nom_area`, 
	`cargos`.`nom_cargo`, `categorias`.`nom_cat`,  `tipos`.`nom_tipo`, `registros`.`lugar`, `registros`.`detalles`, `registros`.`fecha_reg` 
	FROM `registros` 
	LEFT JOIN `cargos` ON `registros`.`id_cargo` = `cargos`.`id_cargo` 
	LEFT JOIN `tipos` ON `registros`.`id_tipo` = `tipos`.`id_tipo`
	LEFT JOIN `areas` ON `cargos`.`id_area` = `areas`.`id_area`
	LEFT JOIN `categorias` ON `tipos`.`id_cat` = `categorias`.`id_cat`
	WHERE `registros`.`fecha_reg` BETWEEN '".$inicio."' AND '".$final."' 
	ORDER BY `registros`.`id_reg` ASC";

	$resultado = mysqli_query($cx,$consulta);
	$verif = mysqli_num_rows($resultado); //verificacion si no hay datos
	if($verif == 0){
		echo "<script>alert (' ¡No existen reportes en estas fechas! ');
		window.location='/SST/Informe.php'</script>";

	}else{
		header('Content-Type: aplication/xls');
		header('Content-Disposition: attachment; filename=Informe.xls;');
		?>
		<meta charset="utf-8">
		<table border="1">
		<tr>
			<th>ID</th>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Area</th>
			<th>Cargo</th>
			<th>Categoria</th>
			<th>Tipo</th>
			<th>Lugar</th>
			<th>Detalle</th>
			<th>Fecha</th>
		</tr>
		<?php 
		while ($row = mysqli_fetch_assoc($resultado)){
			?>
			<tr>
				<td><?php echo $row['id_reg']; ?></td>
				<td><?php echo $row['cedula']; ?></td>
				<td><?php echo $row['nombre']; ?></td>
				<td><?php echo $row['nom_area']; ?></td>
				<td><?php echo $row['nom_cargo']; ?></td>
				<td><?php echo $row['nom_cat']; ?></td>
				<td><?php echo $row['nom_tipo']; ?></td>
				<td><?php echo $row['lugar']; ?></td>
				<td><?php echo $row['detalles']; ?></td>
				<td><?php echo $row['fecha_reg']; ?></td>
			</tr>
			<?php	
		}
		?>
		</table>
		<?php
		}
	}
?>




