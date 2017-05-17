<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Usuarios</title>
  <?php include 'mod/head.php'; ?>
</head>
<body>
  <?php include 'mod/navbar.php' ?>
  <div class="container">
    <div class="row" id="row-lista">
      <div class="page-header">
        <h2>Listado de usuarios</h2>
        <table class="table table-condensed">
          <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>APELLIDOS</th>
              <th>NOMBRE</th>
              <th>USUARIO</th>
              <th>NIVELES COMPLETADOS</th>
            </tr>
          </thead>
          <tbody id="tbody-usuarios">
          </tbody>
        </table>
      </div>
    </div>
    <div class="row" id="row-modificar" style="display:none">
      <div class="col-md-12">
        <div class="page-header">
          <h2>Modificar datos usuarios</h2>
          <input type="" id="usuario_id" class="form-control"  style="display:none">
        </div>
        <form id="form_usuario_update">
          <div class="row">
            <div class="col-md-5">
              <div class="form-group">
                <label>Usuario</label>
                <input type="" name="usuario_nickname" id="usuario_nickname" class="form-control" required="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tipo de identificacion</label>
                <select name="usuario_tidentificacion" id="usuario_tidentificacion" class="form-control" required="" >
                  <option value="1">C.C</option>
                  <option value="2">T.I</option>
                  <option value="3">PAS</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label># de Identificacion</label>
                <input type="number" name="usuario_identificacion" id="usuario_identificacion" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Nombres</label>
                <input type="" name="usuario_nombres" id="usuario_nombres" class="form-control" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Apellidos</label>
                <input type="" name="usuario_apellidos" id="usuario_apellidos" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Departamento</label>
                <select name="usuario_departamento" id="usuario_departamento" class="form-control" required="">
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Ciudad</label>
                <select name="usuario_ciudad" id="usuario_ciudad" class="form-control" required="">
                  <option selected="">Seleccioné  un departamento</option>
                </select>
              </div>
            </div>
            <div class="col-md-4"></div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="usuario_direccion" id="usuario_direccion" class="form-control" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Barrio</label>
                <input type="text" name="usuario_barrio" id="usuario_barrio" class="form-control" required="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Telefono</label>
                <input type="number" name="usuario_telefono" id="usuario_telefono" class="form-control" required="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Correo electronico</label>
                <input type="email" name="usuario_correo" id="usuario_correo" class="form-control" required="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Contraseña</label>
                <input type="text" name="usuario_password" id="usuario_password" class="form-control" required="">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tipo de usuario</label>
                <select name="usuario_tipo" id="usuario_tipo" class="form-control" required="">
                  <option value="admin">Administrador</option>
                  <option value="user">Usuario</option>
                </select>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-default">Guardar</button>
          <button class="btn btn-default">Cancelar</button>
        </form>
      </div>
    </div>
  </div>
  <?php include 'mod/footer.php' ?>
  <script>
  $(document).ready(function (){
    cargarUsuarios();
  });

  function cargarUsuarios() {
    $.getJSON("ajax/ajax_actions.php", {accion: 'cargar_clientes'}, function(resp){
      var contenidoTabla =  tableUsuarios(resp);
      $('#tbody-usuarios').append(contenidoTabla);
    });
  }

  function eliminarUsuarios(usuario_id) {
    var data = {
      'accion' : 'eliminar_usuario',
      'usuario_id' : usuario_id
    }
    $.ajax({
      url : 'ajax/ajax_actions.php',
      type : 'POST',
      data : data,
      success : function(respuesta) {
        swal("Eliminado!", "Registro eliminados satisfactoriamente", "success");
        $('#tbody-usuarios').html("");
        cargarUsuarios();
      }
    });
  }

  function tableUsuarios(data) {
    var col = '';
    $.each(data, function (i, item) {
      col += '<tr>';
      col += '<td width="120">';
      col += '<button onclick="cargarDatosUsuarios('+item.usuario_id+')" type="button" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit"></span> Editar</button>';
      col += '&nbsp; <button onclick="eliminarUsuarios('+item.usuario_id+')" type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>';
      col += '</td>';
      col += '<td>'+item.usuario_id+'</td>';
      col += '<td>'+item.usuario_apellidos+'</td>';
      col += '<td>'+item.usuario_nombres+'</td>';
      col += '<td>'+item.usuario_nickname+'</td>';
      col += '<td>'+progreso(item.usuario_id)+'</td>';
      col += '</tr>';
    });
    return col;
  }

  function progreso(valor) {
    var progreso = '<div class="btn-group" role="group" aria-label="...">';
    for (i = 0; i < parseInt(valor); i++) {
      progreso += '<button type="button" class="btn btn-info" style="margin-left: 1px;">'+i+'</button> ';
    }
    progreso += '</div>';
    return progreso;
  }

  function mostrarEditar() {
    $('#row-lista').css('display','none');
    $('#row-modificar').fadeIn();
  }

  function cargarDatosUsuarios(usuario_id) {
    var data = {
      'accion' : 'cargar_datos_usuario',
      'usuario_id' : usuario_id
    }
    $.ajax({
      url : 'ajax/ajax_actions.php',
      type : 'POST',
      data : data,
      success : function(respuesta) {
        var data = JSON.parse(respuesta);
        mostrarEditar();
        $('#usuario_nickname').val(data.usuario_nickname);
        $('#usuario_tidentificacion').val(data.usuario_tidentificacion);
        $('#usuario_identificacion').val(data.usuario_identificacion);
        $('#usuario_nombres').val(data.usuario_nombres);
        $('#usuario_apellidos').val(data.usuario_apellidos);
        $('#usuario_departamento').val(data.usuario_departamento);
        $('#usuario_ciudad').val(data.usuario_ciudad);
        $('#usuario_direccion').val(data.usuario_direccion);
        $('#usuario_barrio').val(data.usuario_barrio);
        $('#usuario_telefono').val(data.usuario_telefono);
        $('#usuario_correo').val(data.usuario_correo);
        $('#usuario_password').val(data.usuario_password);
        $('#usuario_tipo').val(data.usuario_tipo);
        $('#usuario_id').val(data.usuario_id);
      }
    });
  }

  </script>
  </body>
  </html>
