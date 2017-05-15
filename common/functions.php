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

		case 'vocales':
			include 'pages/vocales.php';
			break;

		case 'numeros':
			include 'pages/numeros.html';
			break;
		case 'numeros_e1':
			include 'pages/numeros_e1.php';
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
