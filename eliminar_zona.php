<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	$zona = $_REQUEST['idz'];

	$query = "DELETE FROM zona WHERE id_zona = '$zona' ";
	$resultado = pg_query($conexion,$query);

	if($resultado){	?>
	<script>
		alert('eliminacion correcta');
		location.href='index.php';
	</script>
	<?php }else{ ?>
	<script>
		alert('no se pudo hacer la eliminacion');
		location.href='index.php';
	</script>
	<?php }
?>