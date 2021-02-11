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
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Registro para la Zona</h1>
			<a class="btn btn-primary btn-xs" data-toggle="modal" href="#ventana"><span class="glyphicon glyphicon-plus"> Registro</span></a>
		</div>
		<br>
		<div class="row">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th>ID_CARGO</th>
						<th>CARGO</th>
						<th colspan="2">OPCIONES</th>						
					</tr>
					<?php 
						$query = "SELECT * from zona";
						$resultado = pg_query($conexion,$query);
						$filas = pg_num_rows($resultado);

						if ($filas != 0) { 
							while ($dato = pg_fetch_array($resultado)) { 
								$datos = $dato[0].'||'.$dato[1];
						?>
						<tr>
							<td><?php echo $dato['id_zona'] ?></td>
							<td><?php echo $dato['nombre'] ?></td>
							<td><a href="eliminar_zona.php?idz=<?php echo $dato['id_zona'] ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
							<td><a data-toggle="modal" data-target="#ventana2" class="btn btn-success btn-sm" onclick="modificar('<?php echo $datos?>')"><span class="glyphicon glyphicon-pencil"></span></a></td>
						</tr>
						<?php }
						 }else{ ?>
							<td colspan="4">No Hay filas existentes ...</td>
						<?php } ?>					
				</table>
			</div>
		</div>
		</div>
	<!--						MODAL PARA REGISTRO							-->
	<div class="modal fade" id="ventana">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Cabezara de la ventana -->
				<div class="modal-header">
					<button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Registro Nueva Zona</h4>
				</div>
				<!-- Cuerpo de la ventana -->
				<div class="modal-body">
					<form action="registro_zona.php" name="form1" class="form-horizontal" method="post">
						<div class="form-group">
							<label for="zona" class="control-label col-md-2">
								Zona :
							</label>
							<div class="col-md-10">
								<input type="text" name="zona" class="form-control" placeholder="digite nuevo zona">
							</div>
						</div>					
				</div>
				<!-- Pie de pagina de la ventana -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Enviar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</form>
				</div>
			</div>
		</div>		
	</div>

	<!--						MODAL PARA EDICION							-->
	<div class="modal fade" id="ventana2">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Cabezara de la ventana -->
				<div class="modal-header">
					<button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Editar Zona</h4>
				</div>
				<!-- Cuerpo de la ventana -->
				<div class="modal-body">
					<form action="registro_zona.php" name="form1" class="form-horizontal" method="post">
						<div class="form-group">
							<label for="zona" class="control-label col-md-2">
								Zona :
							</label>
							<div class="col-md-10">
								<input type="text" name="zona2" class="form-control">
							</div>
						</div>					
				</div>
				<!-- Pie de pagina de la ventana -->
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Enviar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</form>
				</div>
			</div>
		</div>		
	</div>

	<script>

		function modificar(datos) {
			console.log(datos);
			var d=datos.split('||');

			$('#zona2').val(d[1]);

		}

	</script>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>