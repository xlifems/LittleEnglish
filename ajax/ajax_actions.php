<?php 
require '../common/principal.php';
$principal = new Principal;

switch ($_REQUEST['accion']) {

	case 'cargar_municipios';
		$mun = $principal -> load_municipios($_REQUEST['id']);
		echo json_encode($mun);
		break;

	case 'cargar_clientes';
		$cli = $principal -> load_clientes();
		echo json_encode($cli);
		break;
		
	case 'registrar_usuario':
		$usu = $principal -> registrar_usuario($_POST['data']);
		echo $usu;
		break;

	case 'registrar_terreno':
		$terr = $principal -> registrar_terreno($_POST['data']);
		echo $terr;
		break;

	case 'registrar_vuelo':
		$vuel = $principal -> registrar_vuelo($_POST['data']);
		echo $vuel;
		break;
	
	case 'login_user':
		$user = trim($_REQUEST['usuario']);
		$pass = $_REQUEST['password'];
		$login = $principal -> login_user($user, $pass);
		echo json_encode($login);
		break;

	
	default:
		# code...
		break;
}

 ?>