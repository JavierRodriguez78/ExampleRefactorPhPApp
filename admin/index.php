<?php 
session_start();
require 'config.php';
require '../functions.php';

$conexion = conexion($bd_config);

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();


if (!$conexion) {
	header("Location: ../error.php");
}

$files = obtener_file($manager_config['items_pagina'], $conexion);

require '../views/admin_index.view.php';
?>