<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM usuarios,tipocuenta WHERE idUsuario=".$_GET['idUsuario']." AND usuarios.idTipoCuenta=tipocuenta.idCuenta";
	$datos1=mysql_query($consulta,$id_conexion);
	$fila1=mysql_fetch_array($datos1);

	echo '
		<form name="formulario" role="form" class="form-horizontal" action="procesar/procesarEdicionUsuario.php" method="POST">
		<fieldset>
			<div class="col-xs-12">
				<legend>Editar Usuario</legend>
			</div>
			<div class="form-group">
				<label for="nombre" class="col-xs-3 control-label">Nombre y Apellidos:&nbsp*</label>
				<div class="col-xs-7">
					<input id="nombre" type="text" class="form-control" name="nombre" value="'.$fila1['nombre'].'">
				</div>
			</div>
			<div class="form-group">
				<label for="dni" class="col-xs-3 control-label">DNI:&nbsp*</label>
				<div class="col-xs-4">
					<input id="dni" type="text" class="form-control" name="dni" value="'.$fila1['dni'].'">
				</div>
			</div>
			<div class="form-group">
				<label for="contrasenia" class="col-xs-3 control-label">Contraseña:&nbsp*</label>
				<div class="col-xs-4">
					<input id="contrasenia" type="password" class="form-control" name="contrasenia" disabled>
				</div>
				<div class="checkbox col-xs-2">
					<label>
						<input type="checkbox" onclick="document.formulario.contrasenia.disabled=!document.formulario.contrasenia.disabled; document.formulario.contraseniaConf.disabled=!document.formulario.contraseniaConf.disabled; " value=""> Cambiar contraseña
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="contraseniaConf" class="col-xs-3 control-label">Confirmar contraseña:&nbsp*</label>
				<div class="col-xs-4">
					<input id="contraseniaConf" type="password" class="form-control" name="contraseniaConf" disabled>
				</div>
			</div>
			<div class="form-group">
				<label for="tipoDeCuenta" class="col-xs-3 control-label">Tipo de Cuenta:&nbsp*</label>
				<div class="col-xs-3">
					<select id="tipoDeCuenta" class="form-control" name="tipoDeCuenta">';
						$consulta="SELECT * FROM tipocuenta";
						$datos2=mysql_query($consulta,$id_conexion);
						while($fila2=mysql_fetch_array($datos2)){
							echo '
								<option value="'.$fila2['idCuenta'].'"
							';
							if($fila1['idTipoCuenta']==$fila2['idCuenta']){
								echo 'SELECTED';
							}
							echo '
								>'.$fila2['descripcionCuenta'].'</option>
							';
						}
				echo '
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="telefono" class="col-xs-3 control-label">Teléfono:&nbsp&nbsp</label>
				<div class="col-xs-4">
					<input id="telefono" type="text" class="form-control" name="telefono" value="'.$fila1['telefono'].'">
				</div>
			</div>
			<div class="form-group">
				<label for="movil" class="col-xs-3 control-label">Móvil:&nbsp&nbsp</label>
				<div class="col-xs-4">
					<input id="movil" type="text" class="form-control" name="movil" value="'.$fila1['movil'].'">
				</div>
			</div>
			<div class="form-group">
				<label for="e-mail" class="col-xs-3 control-label">Correo Electrónico:&nbsp&nbsp</label>
				<div class="col-xs-7">
					<input id="e-mail" type="text" class="form-control" name="email" value="'.$fila1['email'].'">
				</div>
			</div>
			<div class="form-group">
				<label for="anioProfesor" class="col-xs-3 control-label">Año:&nbsp&nbsp</label>
				<div class="col-xs-4">
					<input id="anioProfesor" type="text" class="form-control" name="anio" value="'.$fila1['anio'].'">
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-4">
					<p style="font-size:0.8em;font-style:italic;">Los campos marcados con <strong>(*)</strong> son obligatorios</p>
				</div>
				<div class="col-xs-offset-4 col-xs-2">
					<button type="submit" class="btn btn-info botonFormulario">Actualizar</button>
				</div>
			</div>
		</fieldset>
		</form>
	';
	$_SESSION['idUsuario']=$_GET['idUsuario'];
?>