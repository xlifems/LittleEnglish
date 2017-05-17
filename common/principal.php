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

        if($savedPasswordHash == $password){
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
      $query = $this->_bdh->prepare("SELECT * FROM ins_usuarios WHERE usuario_tipo = 'user'");
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
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

  function eliminar_usuarios($usuario_id){
    try {
      session_start();
      $sql = "DELETE FROM `ins_usuarios` WHERE `usuario_id` = :usuario_id ";
      $query = $this->_bdh->prepare($sql);
      $res = $query->execute(array(":usuario_id" => $usuario_id));
      return $res;
    } catch (PDOException $e) {
      echo "Error!" . $e->getMessage();
    }
  }

  function cargar_datos_usuario($usuario_id){
    try {
      $query = $this->_bdh->prepare("SELECT * FROM ins_usuarios WHERE `usuario_id` = :usuario_id");
      $query->execute(array(":usuario_id" => $usuario_id));
      return $query->fetch();
      $this->_bdh = null;
    } catch (PDOException $e) {
      echo "Error:" . $e->getMessage();
    }
  }

  function cargar_datos_usuario($data, $usuario_id){
    try {
      $sql = "UPDATE ins_usuarios SET `usuario_nickname`  = :usuario_nickname, `usuario_tidentificacion` = :usuario_tidentificacion, `usuario_identificacion` = :usuario_identificacion ,
                                      `usuario_nombres`   = :usuario_nombres, `usuario_apellidos` = :usuario_apellidos , `usuario_departamento` = :usuario_departamento , `usuario_ciudad` = :usuario_ciudad ,
                                      `usuario_direccion` = :usuario_direccion, `usuario_barrio` = :usuario_barrio, `usuario_telefono` = :usuario_telefono , `usuario_correo` = :usuario_correo,
                                      `usuario_password`  = :usuario_password , `usuario_tipo`= :usuario_tipo WHERE `usuario_id` = :usuario_id";
      $query = $this->_bdh->prepare($sql);
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
      echo "Error:" . $e->getMessage();
    }
  }

  ?>
