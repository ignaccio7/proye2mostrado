<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/css_buscador/jquery-ui.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!--PARA EL BUSCADOR-->
	
	<script src="js/js_buscador/jquery-3.2.1.min.js"></script>
	<script src="js/js_buscador/jquery-ui.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Persona</h1>
			<a class="btn btn-primary btn-xs" href="registro_persona.php"><span class="glyphicon glyphicon-plus"> Registro</span></a>
		</div>				
		<br>
		<div class="row">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th>CEDULA</th>
						<th>ZONA</th>
						<th>NOMBRE</th>
						<th>PATERNO</th>
						<th>EDAD</th>
						<th colspan="2">OPCIONES</th>						
					</tr>
					<?php 
						$query = "SELECT p.cedula,z.nombre,p.nombre_p,p.paterno,p.edad from persona p INNER JOIN zona z ON p.id_zona = z.id_zona";
						$resultado = pg_query($conexion,$query);
						$filas = pg_num_rows($resultado);

						if ($filas != 0) { 
							while ($dato = pg_fetch_array($resultado)) { 
						?>
						<tr>
							<td><?php echo $dato['cedula'] ?></td>
							<td><?php echo $dato['nombre'] ?></td>
							<td><?php echo $dato['nombre_p'] ?></td>
							<td><?php echo $dato['paterno'] ?></td>
							<td><?php echo $dato['edad'] ?></td>
							<td><a href="eliminar_persona.php?idp=<?php echo $dato['cedula'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
							<td><a href="modificar_persona.php?idp=<?php echo $dato['cedula'] ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>
						</tr>
						<?php }
						 }else{ ?>
							<td colspan="4">No Hay filas existentes ...</td>
						<?php } ?>					
				</table>
			</div>
		</div>
		</div>
	
	<script src="js/bootstrap.min.js"></script>
</body>
</html>