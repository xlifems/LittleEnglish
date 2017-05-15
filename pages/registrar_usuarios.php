<div class="col-md-12">
	<div class="page-header">
    	<h2>Registrar usuarios</h2>
 	</div>
	<form id="form_usuario">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Usuario</label>
				<input type="" name="usuario_nickname" class="form-control" required="">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Tipo de identificacion</label>
				<select name="usuario_tidentificacion" class="form-control" required="" >
					<option value="1">C.C</option>
					<option value="2">T.I</option>
					<option value="3">PAS</option>
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label># de Identificacion</label>
				<input type="number" name="usuario_identificacion" class="form-control" required="">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			<label>Nombres</label>
			<input type="" name="usuario_nombres" class="form-control" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Apellidos</label>
			<input type="" name="usuario_apellidos" class="form-control" required="">
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
			<input type="text" name="usuario_direccion" class="form-control" required="">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label>Barrio</label>
			<input type="text" name="usuario_barrio" class="form-control" required="">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
			<label>Telefono</label>
			<input type="number" name="usuario_telefono" class="form-control" required="">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
			<label>Correo electronico</label>
			<input type="email" name="usuario_correo" class="form-control" required="">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
			<label>Contraseña</label>
			<input type="text" name="usuario_password" class="form-control" required="">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
			<label>Tipo de usuario</label>
			<select name="usuario_tipo" class="form-control" required="">
				<option value="admin">Administrador</option>
				<option value="usuario">Usuario</option>
			</select>
			</div>

		</div>
	</div>
	<button type="submit" class="btn btn-default">Registrar</button>
	<button class="btn btn-default">Cancelar</button>
	</form>
</div>
