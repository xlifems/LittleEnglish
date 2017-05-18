<?php session_start();?>
<div class="row titulos">
	<h1>Escuchemos como suenan las vocales</h1>
</div>
<h4><B>Usuario:</B> <?php echo $_SESSION["nombres"]?></h4>
<input id="id_session" type="text" name="" value="<?php echo $_SESSION["id"] ?>" style="display:none">
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<img id="vocal" src="" class="">
	</div>
</div>
<div class="row">
	<div class="col-sm-3">
		<button id="play-vocal" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-volume-up"></span>
		</button>
	</div>
	<div class="col-sm-3 col-sm-offset-6">
		<button id="next-vocal" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-arrow-right"></span></button>
	</div>
</div>
