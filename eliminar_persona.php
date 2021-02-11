<?php 

	require 'conexion.php';
	$conexion = conectarDB();

	$cedula = $_REQUEST['idp'];

	$query = "DELETE FROM persona WHERE cedula = '$cedula' ";
	$resultado = pg_query($conexion,$query);

	if($resultado){	?>
	<script>
		alert('eliminacion correcta');
		location.href='persona.php';
	</script>
	<?php }else{ ?>
	<script>
		alert('no se pudo hacer la eliminacion');
		location.href='persona.php';
	</script>
	<?php }

?>