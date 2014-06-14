<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM tipocuenta";
	$datos=mysql_query($consulta,$id_conexion);
	$fila=mysql_fetch_array($datos);
	echo '
		<form role="form" class="form-horizontal" action="procesar/procesarNuevoUsuario.php" method="POST">
		<fieldset>
			<div class="col-xs-12">
				<legend>Alta Usuario</legend>
			</div>
			<div class="form-group">
				<label for="nombre" class="col-xs-3 control-label">Nombre y Apellidos:&nbsp*</label>
				<div class="col-xs-7">
					<input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre y Apellidos">
				</div>
			</div>
			<div class="form-group">
				<label for="dni" class="col-xs-3 control-label">DNI:&nbsp*</label>
				<div class="col-xs-4">
					<input id="dni" type="text" class="form-control" name="dni" placeholder="00000000A">
				</div>
			</div>
			<div class="form-group">
				<label for="contrasenia" class="col-xs-3 control-label">Contraseña:&nbsp*</label>
				<div class="col-xs-4">
					<input id="contrasenia" type="password" class="form-control" name="contrasenia" placeholder="Contraseña">
				</div>
			</div>
			<div class="form-group">
				<label for="contraseniaConf" class="col-xs-3 control-label">Repetir Contraseña:&nbsp*</label>
				<div class="col-xs-4">
					<input id="contraseniaConf" type="password" class="form-control" name="contraseniaConf" placeholder="Confirmar contraseña">
				</div>
			</div>
			<div class="form-group">
				<label for="tipoDeCuenta" class="col-xs-3 control-label">Tipo de Cuenta:&nbsp*</label>
				<div class="col-xs-3">
					<select id="tipoDeCuenta" class="form-control" name="tipoDeCuenta">';
						while ($fila){
							echo '<option value="'.$fila['idCuenta'].'"';
							if($fila['descripcionCuenta']=="Profesor"){
								echo 'SELECTED';
							}
							echo '>'.$fila['descripcionCuenta'].'</option>';
							$fila=mysql_fetch_array($datos);
						}
			echo '	</select>
				</div>
			</div>
			<div class="form-group">
				<label for="telefono" class="col-xs-3 control-label">Teléfono:&nbsp&nbsp</label>
				<div class="col-xs-4">
					<input id="telefono" type="text" class="form-control" name="telefono" placeholder="Teléfono">
				</div>
			</div>
			<div class="form-group">
				<label for="movil" class="col-xs-3 control-label">Móvil:&nbsp&nbsp</label>
				<div class="col-xs-4">
					<input id="movil" type="text" class="form-control" name="movil" placeholder="Móvil">
				</div>
			</div>
			<div class="form-group">
				<label for="e-mail" class="col-xs-3 control-label">Correo Electrónico:&nbsp&nbsp</label>
				<div class="col-xs-7">
					<input id="e-mail" type="text" class="form-control" name="email" placeholder="ejemplo@dominio.com">
				</div>
			</div>
			<div class="form-group">
				<label for="anioProfesor" class="col-xs-3 control-label">Año:&nbsp&nbsp</label>
				<div class="col-xs-4">
					<input id="anioProfesor" type="text" class="form-control" name="anio" placeholder="Año de alta del Usuario">
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-4">
					<p style="font-size:0.8em;font-style:italic;">Los campos marcados con <strong>(*)</strong> son obligatorios</p>
				</div>
				<div class="col-xs-offset-4 col-xs-2">
					<button type="submit" class="btn btn-info botonFormulario">Insertar</button>
				</div>
			</div>
		</fieldset>
		</form>
	';
?>