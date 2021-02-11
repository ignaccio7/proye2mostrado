<?php 
	
	require 'conexion.php';
	$conexion = conectarDB();

	class Ajax
	{
		public $buscador;

		public function Buscar($a)
		{
			$this->buscador = $a;
			$query = pg_query("SELECT * FROM zona
			WHERE nombre LIKE '$this->buscador%' ");

			while ($dato = pg_fetch_array($query)) {
				$resultado[]=$dato[1];
			}
			return $resultado;
		}		

	}
	$busqueda = new Ajax();
	echo json_encode($busqueda->Buscar($_GET['term']));

?>