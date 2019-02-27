<?php 
session_start();
require 'config.php';


// Lanzamos la consulta de ficheros
$directorio = RUTA . $manager_config['imagFolder'];
$ficheros1  = scandir($directorio);
print_r($ficheros1);

	header('Location: ' . RUTA .'admin');

require '../views/admin_index.view.php';

?>