<?php 

	function conectarDB()
	{
		$host = "host=localhost";
		$port = "port=5432";
		$dbname = "dbname=prueba";
		$user = "user=postgres";
		$password = "password=260298";

		$bd = pg_connect("$host $port $dbname $user $password");

		if (!$bd) {
			echo "Error: ".pg_last_error();
		}else{
			//echo "Conexion Exitosa con postgres";
			return $bd;
		}
	}
	//conectarDB();
?>
