<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$paterno = $_POST['paterno'];
	$edad = $_POST['edad'];
	$zona = $_POST['buscar'];

	/*echo $cedula."-----";
	echo $nombre."-----";
	echo $paterno."-----";
	echo $edad."-----";
	echo $zona;*/

	$query_z = "SELECT id_zona from zona where nombre='$zona'";
	$res_z = pg_query($conexion,$query_z);
	$dato_z = pg_fetch_array($res_z);

	if ($dato_z[0]!="") {
		$query = "INSERT INTO persona(cedula,id_zona,nombre_p,paterno,edad) 
		VALUES('$cedula','$dato_z[0]','$nombre','$paterno','$edad')";
		$resultado = pg_query($conexion,$query);
		if($resultado){	?>
			<script>
				alert('registro correcta');
				location.href='persona.php';
			</script>
		<?php }else{ ?>
			<script>
				alert('no se pudo hacer la registro');
				location.href='persona.php';
			</script>
		<?php }
	}else{ ?>
		<script>
			alert('no existe la zona ingresada');
			location.href='persona.php';
		</script>
		<?php
	}
?>