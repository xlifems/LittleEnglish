<?php session_start();?>
<div class="row titulos">
	<h1>Escoger Sonido</h1>
</div>
<h4><B>Usuario:</B> <?php echo $_SESSION["nombres"]?></h4>
<input id="id_session" type="text" name="" value="<?php echo $_SESSION["id"] ?>" style="display:none">
<div class="row">
	<div class="col-sm-4 col-sm-offset-2">
		<img id="numero_e1" src="img/numeros/e1.png" class="e1">
	</div>
	<div class="col-sm-5 col-sm-offset-1">
		<div class="row">
			<button id="opc1"  class="btn btn-default btn-lg btn-opcion">
				<span class="glyphicon glyphicon-volume-up"></span> One
			</button>
		</div>
		<div class="row">
			<button id="opc2"  class="btn btn-default btn-lg btn-opcion">
				<span class="glyphicon glyphicon-volume-up"></span> Five
			</button>
		</div>
		<div class="row">
			<button id="opc3"  class="btn btn-default btn-lg btn-opcion">
				<span class="glyphicon glyphicon-volume-up"></span> Three
			</button>
		</div>
	</div>
</div>
<p><b>Nota:</b> Escoge el sonido que creas que corresponde al numero en pantalla y click en el boton calificar <span class="glyphicon glyphicon-check"></span>. Si la opción es correcta continua.</p>
<div class="row">
	<div class="col-sm-3">
		<button id="" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-chevron-left"></span></button>
	</div>
	<div class="col-sm-3 col-sm-offset-6">
		<button id="calificar-e1"  class="btn btn-success btn-lg"><span class="glyphicon glyphicon-check"></button>
		<button id="next-numero" class="btn btn-success btn-lg"></span>Siguiente lección</span></button>
	</div>
</div>
