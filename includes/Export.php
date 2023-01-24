<meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/> 
<?php

require 'Conexion.php';
$inicio=$_POST['inicio'];
$final=$_POST['final'];

if($inicio>$final){
	echo "<script>alert (' ¡La fecha final debe ser mayor a la inicial! ');
	window.location='/SST/Informe.php'</script>";
	
}else{
	$consulta = "SELECT `Registros`.`id_reg`, `Registros`.`cedula`, `Registros`.`nombre`, `Areas`.`nom_area`, 
	`Cargos`.`nom_cargo`, `Categorias`.`nom_cat`,  `Tipos`.`nom_tipo`, `Registros`.`lugar`, `Registros`.`nivel`, 
	`Registros`.`detalles`, `Registros`.`fecha_reg` 
	FROM `Registros` 
	LEFT JOIN `Cargos` ON `Registros`.`id_cargo` = `Cargos`.`id_cargo` 
	LEFT JOIN `Tipos` ON `Registros`.`id_tipo` = `Tipos`.`id_tipo`
	LEFT JOIN `Areas` ON `Cargos`.`id_area` = `Areas`.`id_area`
	LEFT JOIN `Categorias` ON `Tipos`.`id_cat` = `Categorias`.`id_cat`
	WHERE `Registros`.`fecha_reg` BETWEEN '".$inicio."' AND '".$final."' 
	ORDER BY `Registros`.`id_reg` ASC";

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
			<th>Nivel</th>
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
				<td><?php echo $row['nivel']; ?></td>
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




