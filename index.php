<?php

require 'admin/config.php';
require 'functions.php';

// Asi es nuestro codigo antes de hacer una funcion para conectarnos a la base de datos.

// try {
// 	$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
// 	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// // Prepared Statement
// 	// 1.- Preparamos nuestra sentencia SQL
// 	$statement = $conexion->prepare('SELECT * FROM files');

// 	// 2.- Ejecutamos
// 	$statement->execute();
// 	$resultados = $statement->fetchAll();
	

// } catch (PDOException $e) {
// 	echo 'ERROR:' . $e->getMessage();
// 	// Si hay algun error podemos redirigir al usuario a una pagina de error

// 	header('Location: error.php');
// 	die('Problemas con la conexion');
// }

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: error.php');
}

# Este codigo es el que usaremos antes de programar la paginacion

// $sentencia = $conexion->prepare("SELECT * FROM files LIMIT $post_por_pagina");
// $sentencia->execute();
// $files = $sentencia->fetchAll();

$files = obtener_file($manager_config['items_pagina'], $conexion);

// Si no hay respuesta
if(!$files){
	header('Location: error.php');
}

require 'views/index.view.php';
?>