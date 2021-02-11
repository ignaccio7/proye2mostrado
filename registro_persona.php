<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	//para el buscador
	if (isset($_POST['buscar'])) {
		$tipo = $_POST['buscar'];
		$query = pg_query("SELECT * FROM zona
			WHERE nombre LIKE '$tipo%' ");
		$filas = mysql_num_rows($query);
		if ($filas != 0) {
			while ($dato = pg_fetch_array($query)) {
				echo $dato[1]."<br>";
			}
		}
	}else{
		echo "";
	}

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
			<h1>Registgro Persona</h1>
		</div>				
		<br>
		<div class="row">
			<form action="registra_persona.php" name="form1" class="form-horizontal" method="post">
						<div class="form-group">
							<label for="cedula" class="control-label col-md-2">
								Cedula :
							</label>
							<div class="col-md-10">
								<input type="text" name="cedula" class="form-control" placeholder="digite cedula">
							</div>
						</div>
						<div class="form-group">
							<label for="nombre" class="control-label col-md-2">
								Nombre :
							</label>
							<div class="col-md-10">
								<input type="text" name="nombre" class="form-control" placeholder="digite nombre">
							</div>
						</div>
						<div class="form-group">
							<label for="paterno" class="control-label col-md-2">
								Paterno :
							</label>
							<div class="col-md-10">
								<input type="text" name="paterno" class="form-control" placeholder="digite paterno">
							</div>
						</div>
						<div class="form-group">
							<label for="edad" class="control-label col-md-2">
								Edad :
							</label>
							<div class="col-md-10">
								<input type="text" name="edad" class="form-control" placeholder="digite edad">
							</div>
						</div>
						<div class="form-group">
							<label for="zona" class="control-label col-md-2">
								Zona :
							</label>
							<div class="col-md-10">							
								<input type="text" class="form-control" placeholder="digite zona" name="buscar" id="buscar">
							</div>							
						</div>
						<div class="form-group">
							<div class="col-md-2">
							</div>
							<div class="col-md-10">
								<button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
							</div>						
						</div>
			</form>
		</div>
	</div>
	<!--						MODAL PARA REGISTRO							-->
	<script>
		$('document').ready(function() {
			$('#buscar').autocomplete({

				source : 'ajax.php'

			});
		});			
	</script>
	
	<script src="js/bootstrap.min.js"></script>
</body>
</html>