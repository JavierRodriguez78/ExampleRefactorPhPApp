<?php 

require 'admin/config.php';
require 'functions.php';

// Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: error.php');
}

// Comprobamos que haya contenido en GET
if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])){
	$busqueda = limpiarDatos($_GET['busqueda']);

	$statement =$conexion->prepare(
		"SELECT * FROM files WHERE name LIKE :busqueda or text Like :busqueda"
	);
	$statement->execute(array(':busqueda' => "%$busqueda%"));

	$resultados = $statement->fetchAll();
	
	if (empty($resultados)) {
		$name = 'No se encontraron materiales con el resultado: ' . $busqueda;
	} else {
		$name = 'Resultados de la busqueda: ' . $busqueda;
	}

} else {
	header('Location:' . RUTA . '/index.php');
}

require 'views/buscar.view.php';

?>