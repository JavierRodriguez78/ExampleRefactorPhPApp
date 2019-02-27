<?php 
session_start();
require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = limpiarDatos($_POST['usuario']);
	$password = limpiarDatos($_POST['password']);

	if ($usuario == $manager_admin['usuario'] && $password == $manager_admin['password']) {
		$_SESSION['admin'] = $manager_admin['usuario'];
		echo "Datos de administrador correctos";
		header('Location: '.RUTA.'admin/index.php');
	}
}

require 'views/login.view.php';

?>