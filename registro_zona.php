<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	$zona = $_POST['zona'];

	$query = "INSERT INTO zona(nombre) VALUES('$zona')";
	$resultado = pg_query($conexion,$query);

	
	if($resultado){	?>
	<script>
		alert('registro correcta');
		location.href='index.php';
	</script>
	<?php }else{ ?>
	<script>
		alert('no se pudo hacer la registro');
		location.href='index.php';
	</script>
	<?php }
?>