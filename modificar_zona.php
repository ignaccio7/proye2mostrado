<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	$id_zona = $_REQUEST['idz'];

	$query = "SELECT * from zona WHERE id_zona='$id_zona'";
	$resultado = pg_query($conexion,$query);
	$dato = pg_fetch_array($resultado);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Modificar Zona</h1>
		</div>
		<br>
		<div class="row">
				<form action="modifica_zona.php?var=<?php echo $id_zona ?>" name="form1" class="form-horizontal" method="post">
					<div class="form-group">
						<label for="zona" class="control-label col-md-2">
							Zona :
						</label>
						<div class="col-md-10">
							<input type="text" name="zona" value="<?php echo $dato['nombre'] ?>" class="form-control">
						</div>
					</div>					
					<div class="form-group">
						<button type="submit" class="btn btn-success">Modificar</button>
					</div>
				</form>
		</div>
	</div>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>