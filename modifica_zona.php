<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	$id_zona = $_REQUEST['var'];
	$zona = $_POST['zona'];

	//cho "idzona".$id_zona;
	//echo "zona".$zona;

	$query = "UPDATE zona SET nombre = '$zona' WHERE id_zona = '$id_zona' ";
	$resultado = pg_query($conexion,$query);

	if($resultado){	?>
	<script>
		alert('modificacion correcta');
		location.href='index.php';
	</script>
	<?php }else{ ?>
	<script>
		alert('no se pudo hacer la modificacion');
		location.href='index.php';
	</script>
	<?php }
?>