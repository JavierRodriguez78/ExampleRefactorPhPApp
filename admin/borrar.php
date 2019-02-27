<?php session_start();

require 'config.php';
require '../functions.php';

comprobarSession();

// Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

$id = limpiarDatos($_GET['id']);

// Comprobamos que exista un ID
if (!$id) {
	header('Location: index.php');
}

$statement = $conexion->prepare('DELETE FROM files WHERE id = :id');
$statement->execute(array('id' => $id));

header('Location: ' . RUTA . '/admin');

?>