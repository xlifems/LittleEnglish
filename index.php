<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Ingreso Little English </title>
  <?php include 'mod/head.php'; ?>
  <style type="text/css">
    body {
      background: #18bd9b;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="css/mod.css">
</head>
<body>
<?php include 'mod/navbar_index.php' ?>
<div class="container" style="margin-top: 1%">
  <div class="row">
    <div class="col-md-4">
    <section class="titulo">    
      <h2>La Plataforma</h2>
      <p align="rigth">Es una plataforma para la enseñanza y aprendizaje de ingles en niños de 0 a 3 años, 
      a traves de contenido audio visual.</p>         
    </section>
    <section>
    <div class="panel panel-default">
        <div class="panel-heading">         
          <h3 class="panel-title" align="center">Iniciar Sesion</h3>
        </div>        
        <div class="panel-body">
          <div class="form-group">
            <label for="">Usuario:</label>
            <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre del niño" />
          </div>
          <div class="form-group">
            <label for="">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese la contraseña" />
          </div>
          <button class="btn btn-default btn-lg btn-block" id="ingresar">Ingresar</button>
        </div>
      </div>      
    </section>  
    </div>
    <div class="col-md-8">   
      <div class="col-md-12 centrar-logo">
          <img src="img/welcome.png" class="img-responsive" > 
        </div>
      </div>    
  </div>
</div>
<?php include 'mod/footer.php' ?>
</body>
</html>