<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	$ced = $_REQUEST['idp'];

	$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$paterno = $_POST['paterno'];
	$edad = $_POST['edad'];
	$zona = $_POST['buscar'];

	/*echo $ced."-----";
	echo $cedula."-----";
	echo $nombre."-----";
	echo $paterno."-----";
	echo $edad."-----";
	echo $zona;*/

	
	$query_z = "SELECT id_zona from zona where nombre='$zona'";
	$res_z = pg_query($conexion,$query_z);
	$dato_z = pg_fetch_array($res_z);

	if ($dato_z[0]!="") {
		$query="UPDATE persona 
		SET cedula='$cedula',id_zona='$dato_z[0]',nombre_p='$nombre',
		paterno='$paterno',edad='$edad' 
		WHERE cedula = '$ced'";

		$resultado = pg_query($conexion,$query);
		if($resultado){	?>
			<script>
				alert('modificacion correcta');
				location.href='persona.php';
			</script>
		<?php }else{ ?>
			<script>
				alert('no se pudo hacer la modificacion');
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