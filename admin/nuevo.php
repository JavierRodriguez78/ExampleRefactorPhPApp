<?php 
session_start();
require 'config.php';
require '../functions.php';

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();

// Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

// Comprobamos si los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = limpiarDatos($_POST['name']);
	$description = limpiarDatos($_POST['description']);
	$text = $_POST['text'];
	$picture = $_FILES['picture']['tmp_name'];

	
	// Direccion final del archivo incluyendo el nombre
	$nombreFichero=basename($_FILES['picture']['name']);

	$archivo_subido = '../imag/'.$nombreFichero;
	// Subimos el archivo
	move_uploaded_file($picture, $archivo_subido);

	$statement = $conexion->prepare(
		'INSERT INTO files (id, name, description, text, picture) 
		VALUES (null, :name, :description, :text, :picture)'
	);

	$statement->execute(array(
		':name' => $name,
		':description' => $description,
		':text' => $text,
		':picture' => $_FILES['picture']['name']
	));

	header('Location: ' . RUTA . '/admin');
}


require '../views/nuevo.view.php';

?>