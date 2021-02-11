<?php 

	require 'conexion.php';
	$conexion = conectarDB();

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
	<title>AutoComplete</title>
	<link rel="stylesheet" href="css/css_buscador/jquery-ui.min.css">
	<script src="js/js_buscador/jquery-3.2.1.min.js"></script>
	<script src="js/js_buscador/jquery-ui.min.js"></script>
</head>
<body>
	<center>
		<h1>AUTOCOMPLETE</h1>
		<form action="" method="post">
			<label for="">Buscar : </label>
			<input type="text" name="buscar" id="buscar">
			<input type="submit" value="Buscar">
			<script>
				$('document').ready(function() {
					$('#buscar').autocomplete({

						source : 'ajax.php'

					});
				});			
			</script>
		</form>
	</center>
</body>
</html>