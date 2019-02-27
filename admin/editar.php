<?php 
session_start();
require 'config.php';
require '../functions.php';

// 1.- Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();

// Determinamos si se estan enviado datos por el metodo POST o GET

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Limpiamos los datos para evitar que el usuario inyecte codigo.
	$name = limpiarDatos($_POST['name']);
	$description = limpiarDatos($_POST['description']);
	// Con la funcion nl2br podemos transformar los saltos de linea en etiquetas <br>
	// $text = nl2br($_POST['text']);
	$text = $_POST['text'];
	$id = limpiarDatos($_POST['id']);
	$picture_guardada = $_POST['picture-guardada'];
	$picture = $_FILES['picture'];

	
	if (empty($picture['name'])) {
		$picture = $picture_guardada;
	} else {
		
		$archivo_subido = '../' . $manager_config['carpeta_imagenes'] . $_FILES['picture']['name'];

		move_uploaded_file($_FILES['picture']['tmp_name'], $archivo_subido);
		$picture = $_FILES['picture']['name'];
	}

	$statement = $conexion->prepare('UPDATE files SET name = :name, description = :description, text = :text, picture = :picture WHERE id = :id');
	$statement->execute(array(
		':name' => $name,
		':description' => $description,
		':text' => $text,
		':picture' => $picture,
		':id' => $id
	));

	header("Location: " . RUTA . '/admin');
} else {
	$id = id($_GET['id']);

	if (empty($id)) {
		header('Location: ' . RUTA . '/admin');
	}

	$file = obtener_file_por_id($conexion, $id);

	if (!$file) {
		header('Location: ' . RUTA . 'index.php');
	}
	$file = $file[0];
}


require '../views/editar.view.php';

?>