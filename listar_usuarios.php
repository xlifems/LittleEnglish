<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <?php include 'mod/head.php'; ?>
</head>
<body>
  <?php include 'mod/navbar.php' ?>
  <div class="container">
    <div class="col-md-12">
      <div class="page-header">
        <h2>Listado de usuarios</h2>
        <table class="table table-condensed">
          <thead>
            <tr>
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
  </div>
  <?php include 'mod/footer.php' ?>
  <script>
  $(document).ready(function (){
    $.getJSON("ajax/ajax_actions.php", {accion: 'cargar_clientes'}, function(resp){
      var contenidoTabla =  tableUsuarios(resp);
      $('#tbody-usuarios').append(contenidoTabla);
    });
  });

  function tableUsuarios(data) {
    var col = '';
    $.each(data, function (i, item) {
      col += '<tr>';
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
  </script>
</body>
</html>
