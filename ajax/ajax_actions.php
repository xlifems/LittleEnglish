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

	case 'modificar_usuario':
		$usu = $principal -> modificar_usuario($_POST['data'], $_REQUEST['usuario_id']);
		echo $usu;
		break;

	case 'eliminar_usuario':
		$res = $principal ->eliminar_usuarios($_REQUEST['usuario_id']);
		echo $res;
		break;

	case 'cargar_datos_usuario';
		$cli = $principal -> cargar_datos_usuario($_REQUEST['usuario_id']);
		echo json_encode($cli);
		break;

	case 'guardar_progreso';
		$cli = $principal -> registrar_progreso ($_REQUEST['nivel_id'], $_REQUEST['usuario_id']);
		echo json_encode($cli);
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
