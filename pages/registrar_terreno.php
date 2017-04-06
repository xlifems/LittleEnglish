<div class="container">
	<div class="page-header">
    	<h2>Registrar terreno</h2>      
 	</div>
<form id="form_terreno">
	<div class="row">
		<div class="col-md-12">
		<div class="form-group">
			<label>Ubicacion</label>
			<input type="text" name="terreno_ubicacion" class="form-control">
		</div>
		</div>
	</div>
	<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label>ASNM</label>
			<input type="text" name="terreno_ASNM" class="form-control">
		</div>		
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Area total</label>
			<input type="number" name="terreno_areatotal" class="form-control">
		</div>		
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Area sembrada</label>
			<input type="text" name="terreno_areasembrada" class="form-control">
		</div>		
	</div>	
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Acesso</label>
				<input type="text" name="terreno_acesso" class="form-control">
			</div>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Recursos hidricos</label>
				<input type="text" name="terreno_recursoshidricos" class="form-control">
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Fertilizacion</label>
				<input type="text" name="terreno_fertilizacion" class="form-control">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Uso de suelos</label>
				<input type="text" name="terreno_usosuelos" class="form-control">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Dueño del terreno</label>
				<select name="ins_persona_id" id="ins_persona_id" class="form-control">
					
				</select>
			</div>			
		</div>
	</div>
	<button type="submit" class="btn btn-default">Registrar</button>
	<button class="btn btn-default">Cancelar</button>	
</form>
</div>