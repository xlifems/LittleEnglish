<?php session_start();?>
<div class="row titulos">
	<h1>Escuchemos como suenan los números</h1>
</div>
<h4><B>Usuario:</B> <?php echo $_SESSION["nombres"]?></h4>
<input id="id_session" type="text" name="" value="<?php echo $_SESSION["id"] ?>" style="display:none">
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<img id="numero" src="img/numeros/1.png" class="1">
	</div>
</div>
<p><b>Nota:</b> Click sobre el boton <span class="glyphicon glyphicon-volume-up"></span> para reproducir el sonido del numero en pantalla y click en el boton <span class="glyphicon glyphicon-check"></span> para continuar con el proximo número.</p>
<div class="row">
	<div class="col-sm-3">
		<button id="" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-chevron-left"></span></button>
		<button id="play-numero" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-volume-up"></span></button>
	</div>
	<div class="col-sm-3 col-sm-offset-6">
		<button id="next-numero" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-chevron-right"></button>
		<a  id="next-leccion" href="?page=numeros_e1" style="display:none"><button  class="btn btn-success btn-lg"></span>Siguiente lección</span></button></a>
	</div>
</div>
