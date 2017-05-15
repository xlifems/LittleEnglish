<?php
class Principal {
  private $_bdh;
	function __construct (){
		try {
        $this->_bdh = new PDO('mysql:host=localhost;dbname=ingles','root', '');
        $this->_bdh->exec("SET NAMES utf8");
        $this->_bdh->exec("SET CHARACTER SET utf8");
        $this->_bdh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_bdh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}
	}

	function login_user($user, $password){
   	try {
            $query = $this->_bdh->prepare("SELECT * FROM ins_usuarios WHERE usuario_nickname = :user");
            $query->execute(array(':user' => $user));
                if ($query->rowCount() == 1) {
                    $row = $query->fetch();
                    $savedPasswordHash = $row['usuario_password'];

                    if($savedPasswordHash == md5($password)){
                    	  session_start();
                        $_SESSION["nickname"]  = $row["usuario_nickname"];
                        $_SESSION["nombres"]   = $row["usuario_nombres"]." ".$row["usuario_apellidos"];
                        $_SESSION["tipo"]      = $row["usuario_tipo"];
                        return 1;
                    }
                }
                $this->_bdh = null;
            } catch (PDOException $e) {
                echo "Error!." . $e->getMessage();
            }
   }

   function load_municipios($id_dep){
    try {
        $query = $this->_bdh->prepare("SELECT * FROM ins_municipios WHERE id_departamento = :id_dep");
        $query->execute(array('id_dep'=>$id_dep));
        return $query->fetchAll(PDO::FETCH_ASSOC);
        $this->_bdh = null;
      } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
      }

   }

   function load_clientes(){
    try {
        $query = $this->_bdh->prepare("SELECT usuario_id, usuario_nickname, usuario_nombres, usuario_apellidos  FROM ins_usuarios WHERE usuario_tipo = 'clien'");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        $this->_bdh = null;
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
   }

    function get_detalles($cc, $numprestamo){
      try {
        $query = $this->_bdh->prepare("SELECT * FROM cliente, prestamo WHERE cliente.cedula = '{$cc}' and prestamo.cedula = '{$cc}' and numprestamo = $numprestamo");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
        $this->_bdh = null;
      } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
      }
   }

   function registrar_usuario($data){
    try {
      session_start();
      $query = $this->_bdh->prepare("INSERT INTO `ins_usuarios` (`usuario_nickname`, `usuario_tidentificacion`, `usuario_identificacion`, `usuario_nombres`, `usuario_apellidos`, `usuario_departamento`, `usuario_ciudad`, `usuario_direccion`, `usuario_barrio`, `usuario_telefono`, `usuario_correo`, `usuario_password`, `usuario_tipo`) VALUES (:usuario_nickname, :usuario_tidentificacion, :usuario_identificacion, :usuario_nombres, :usuario_apellidos, :usuario_departamento, :usuario_ciudad, :usuario_direccion, :usuario_barrio, :usuario_telefono, :usuario_correo, :usuario_password, :usuario_tipo)");
      $res = $query->execute(array(
        'usuario_nickname'   => $data[0]['value'],
        'usuario_tidentificacion'  => $data[1]['value'],
        'usuario_identificacion'   => $data[2]['value'],
        'usuario_nombres'  => $data[3]['value'],
        'usuario_apellidos'  => $data[4]['value'],
        'usuario_departamento'   => $data[5]['value'],
        'usuario_ciudad'   => $data[6]['value'],
        'usuario_direccion'  => $data[7]['value'],
        'usuario_barrio'   => $data[8]['value'],
        'usuario_telefono'   => $data[9]['value'],
        'usuario_correo'   => $data[10]['value'],
        'usuario_password'   => $data[11]['value'],
        'usuario_tipo'   => $data[12]['value']
        ));
      return $res;
    } catch (PDOException $e) {
        echo "Error!" . $e->getMessage();
    }
   }

   function registrar_terreno($data){
    try {
      session_start();
      $query = $this->_bdh->prepare("INSERT INTO ins_terreno (terreno_ubicacion, terreno_ASNM, terreno_areatotal, terreno_areasembrada, terreno_acesso, terreno_recursoshidricos, terreno_fertilizacion, terreno_usosuelos, ins_usuario_id) VALUES ( :terreno_ubicacion, :terreno_ASNM, :terreno_areatotal, :terreno_areasembrada, :terreno_acesso, :terreno_recursoshidricos, :terreno_fertilizacion, :terreno_usosuelos, :ins_usuario_id)");
      $res = $query->execute(array(
          ':terreno_ubicacion' => $data[0]['value'],
          ':terreno_ASNM' => $data[1]['value'],
          ':terreno_areatotal' => $data[2]['value'],
          ':terreno_areasembrada' => $data[3]['value'],
          ':terreno_acesso' => $data[4]['value'],
          ':terreno_recursoshidricos' => $data[5]['value'],
          ':terreno_fertilizacion' => $data[6]['value'],
          ':terreno_usosuelos' => $data[7]['value'],
          ':ins_usuario_id' => $data[8]['value']
        ));
      return $res;
    } catch (PDOException $e) {
        echo "Error!" . $e->getMessage();
    }
   }

    function registrar_vuelo($data){
    try {
      session_start();
      $query = $this->_bdh->prepare("INSERT INTO `ins_vuelo` (`vuelo_tdrone`, `vuelo_altura`, `vuelo_tiempo`, `vuelo_velocidad`, `vuelo_ruta`, `vuelo_sensores`, `vuelo_caracteristica`, `vuelo_fecha`, `ins_cultivos_id`) VALUES (:vuelo_tdrone, :vuelo_altura, :vuelo_tiempo, :vuelo_velocidad, :vuelo_ruta, :vuelo_sensores, :vuelo_caracteristica, :vuelo_fecha, :ins_cultivos_id)");
      $res = $query->execute(array(
        ':vuelo_tdrone'   => $data[0]['value'],
        ':vuelo_altura'   => $data[1]['value'],
        ':vuelo_tiempo'   => $data[2]['value'],
        ':vuelo_velocidad'    => $data[3]['value'],
        ':vuelo_ruta'   => $data[4]['value'],
        ':vuelo_sensores'   => $data[5]['value'],
        ':vuelo_caracteristica'   => $data[6]['value'],
        ':vuelo_fecha'    => $data[7]['value'],
        ':ins_cultivos_id'    => $data[8]['value']
        ));
      return $res;
    } catch (PDOException $e) {
        echo "Error!" . $e->getMessage();
    }
   }

   function registrar_cultivo($data){
    try {
      session_start();
      $query = $this->_bdh->prepare("INSERT INTO `ins_cultivos` (`cultivo_tipo`, `cultivo_edad`, `cultivo_areaefectiva`, `cultivo_fechacosecha`, `cultivo_fechasiembra`, `cultivo_usosuelos`, `ins_terreno_idTerreno`) VALUES (:cultivo_tipo, :cultivo_edad, :cultivo_areaefectiva, :cultivo_fechacosecha, :cultivo_fechasiembra, :cultivo_usosuelos, :ins_terreno_idTerreno)");
      $res = $query->execute(array(
        ':cultivo_tipo' => $data[0]['value'],
        ':cultivo_edad' => $data[1]['value'],
        ':cultivo_areaefectiva' => $data[2]['value'],
        ':cultivo_fechacosecha' => $data[3]['value'],
        ':cultivo_fechasiembra' => $data[4]['value'],
        ':cultivo_usosuelos' => $data[5]['value'],
        ':ins_terreno_idTerreno' => $data[6]['value']
        ));
      return $res;
    } catch (PDOException $e) {
        echo "Error!" . $e->getMessage();
    }
   }

   function registrar_condiciones($data){
    try {
      session_start();
      $query = $this->_bdh->prepare("INSERT INTO `ins_condiciones` (`condicion_temperatura`, `condicion_humedad`, `condicion_presipitacion`, `condicion_luminosidad`, `condicion_velocidad`, `ins_vuelo_vuelo_id`) VALUES ('1', '1', '1', '1', '1', '2')");
      $res = $query->execute(array(
        ));
      return $res;
    } catch (PDOException $e) {
        echo "Error!" . $e->getMessage();
    }
   }

}

 ?>
