<div class="col-md-12">
	<div class="page-header">
    	<h2>Modificar datos usuarios</h2>
 	</div>
	<form id="form_usuario">
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
			<select name="usuario_tipo" class="form-control" required="">
				<option value="admin">Administrador</option>
				<option value="user">Usuario</option>
			</select>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-default">Registrar</button>
	<button class="btn btn-default">Cancelar</button>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
$(document).ready(function (){
	cargarDatosUsuario();
});
function cargarDatosUsuario() {
	$.getJSON("ajax/ajax_actions.php", {accion: 'cargar_datos_usuario'}, function(resp){
		$('#tbody-usuarios').append(contenidoTabla);
	});
}
</script>
