<?php 

error_reporting(E_ALL ^ E_NOTICE);
function route($page){

	switch ($page) {
		case 'registrar_usuario':
			include 'pages/registrar_usuarios.php';
			break;
			
		case 'animals':
			include 'pages/animals.php';
			break;

		case 'registrar_drone':
			include 'pages/registrar_drone.php';
			break;

		case 'registrar_vuelos':
			include 'pages/registrar_vuelos.php';
			break;

		case 'salir':
			session_start();
			session_unset();
			session_destroy();
			header("Location: index.php");
			break;

		default:
			include 'pages/inicio.php';
			break;
	}
}

 ?>