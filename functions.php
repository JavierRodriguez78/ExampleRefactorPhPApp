<?php

function conexion($bd_config){
	try {
	$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $conexion;

	} catch (PDOException $e) {
		return false;		
	}
}

# Funcion para limpiar y convertir datos como espacios en blanco, barras y caracteres especiales en entidades HTML.
# Return: los datos limpios y convertidos en entidades HTML.
function limpiarDatos($datos){
	// Eliminamos los espacios en blanco al inicio y final de la cadena
	$datos = trim($datos);

	// Quitamos las barras / escapandolas con comillas
	$datos = stripslashes($datos);

	// Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)
	$datos = htmlspecialchars($datos);
	return $datos;
}

function obtener_file_por_id($conexion, $id){
	$resultado = $conexion->query("SELECT * FROM files WHERE id = $id LIMIT 1");
	$resultado = $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function id($id){
	return (int)limpiarDatos($id);
}

function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p']: 1; 
}

function obtener_file($items_pagina, $conexion){
	
	$inicio = (pagina_actual() > 1) ? (pagina_actual() * $items_pagina - $items_pagina) : 0;

	$sentencia = $conexion->query("SELECT SQL_CALC_FOUND_ROWS * FROM files LIMIT {$inicio}, {$items_pagina}");
	return $sentencia->fetchAll();
}

function numero_paginas($items_pagina, $conexion){
	
	$total_files = $conexion->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM files');
	$total_files->execute();
	$total_files= $total_files->fetch()['total'];

	$numero_paginas = ceil($total_files / $items_pagina);
	return $numero_paginas;
}

function fecha($createdAt){
	$timestamp = strtotime($createdAt);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;
	return $fecha;
}

# Funcion para comprobar la session del admin
function comprobarSession(){
	// Comprobamos si la session esta iniciada
	if (!isset($_SESSION['admin'])) {
	header('Location: ' . RUTA);
	}
}

//Listado de ficheros existentes
function listarFich($directorio){
	$ficheros1  = scandir($directorio);
	print_r($ficheros1);
}
?>