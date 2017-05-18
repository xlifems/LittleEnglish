<?php session_start();?>
<div class="row titulos">
	<h1>Animales</h1>
</div>
<h4><B>Usuario:</B> <?php echo $_SESSION["nombres"]?></h4>
<input id="id_session" type="text" name="" value="<?php echo $_SESSION["id"] ?>" style="display:none">
<section class="section-animal" id="section-1">
	<div class="row">
	<div class="flip col-sm-3" id="dog">
		<img src="img/animales/dog-icon_36986.png" class="flip-1" >
		<div class="flip-2"> dog </div>
	</div>
	<div class="flip col-sm-3" id="cat" >
		<img src="img/animales/black-cat-icon_36995.png" class="flip-1" >
		<div class="flip-2"> cat </div>
	</div>
	<div class="flip col-sm-3" id="cow">
		<img src="img/animales/cow-icon_36988.png" class="flip-1" >
		<div class="flip-2"> cow </div>
	</div>
	<div class="flip col-sm-3" id="chicken">
		<img src="img/animales/chicken-icon_36990.png" class="flip-1" >
		<div class="flip-2"> chicken </div>
	</div>
</div>
</section>
<section class="section-animal" id="section-2">
	<div class="row">
	<div class="flip col-sm-3" id="donkey">
		<img src="img/animales/donkey-icon_36983.png" class="flip-1" >
		<div class="flip-2"> donkey </div>
	</div>
	<div class="flip col-sm-3" id="sheep">
		<img src="img/animales/sheep-icon_36964.png" class="flip-1" >
		<div class="flip-2"> sheep </div>
	</div>
	<div class="flip col-sm-3" id="mouse">
		<img src="img/animales/mouse-icon_36973.png" class="flip-1" >
		<div class="flip-2"> mouse </div>
	</div>
	<div class="flip col-sm-3" id="crab">
		<img src="img/animales/crab-icon_36987.png" class="flip-1" >
		<div class="flip-2"> crab </div>
	</div>
</div>
</section>
<section class="section-animal" id="section-3">
	<p><b>Nota:</b> Manten click sostenido sobre cada figura para escuchar y ver su traduccion en ingles. pulsa boton continuar para guardar progreso.</p>
<div class="row">
	<div class="col-sm-4">
		<button id="btn-next-animal" type="button"  class="btn btn-success btn-lg">Continuar <span class="glyphicon glyphicon-chevron-right"></button>
	</div>
</div>
</section>
