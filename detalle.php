<?php 

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);
$id = (int)limpiarDatos($_GET['id']);
$id = id($_GET['id']);

if (!$conexion) {
	header('Location: error.php');
}

if (empty($id)) {
	header('Location: index.php');
}

$file = obtener_file_por_id($conexion, $id);

if (!$file) {
	// Redirigimos al index si no hay file
	header('Location: index.php');
}

$file = $file[0];

require 'views/detalle.view.php';

?>