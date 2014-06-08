<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT idLibro, tituloLibro FROM libros";
	$datos=mysql_query($consulta,$id_conexion);
	echo '
		<form role="form" class="form-horizontal" action="procesar/procesarNuevoPrestamo.php" method="POST">
		<fieldset>
			<div class="col-xs-12">
				<legend>Alta Prestamo</legend>
			</div>
			<div class="form-group">
				<label for="idLibro" class="col-xs-3 control-label">Libro:</label>
				<div class="col-xs-4">
					<select name="idLibro" onchange="muestraEjemplar(this.value), obtenUsuarios()" id="idLibro" class="form-control">
						<option value="">Elija un libro</option>';
						while ($fila=mysql_fetch_array($datos)){
							echo'
								<option value="'.$fila['idLibro'].'">'.$fila['tituloLibro'].'</option>
							';
						}
				echo '</select>
				</div>
			</div>
			<div class="form-group">
				<label for="ejemplar" class="col-xs-3 control-label">ID. Ejemplar:</label>
				<div class="col-xs-4">
					<select id="ejemplar" name="idEjemplar" class="form-control">
						<option value="">Elija un ejemplar</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="usuarios" class="col-xs-3 control-label">Usuario:</label>
				<div class="col-xs-4">
					<select name="idUsuario" id="usuarios" class="form-control">
						<option value="">Elija un Usuario</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="comentarios" class="col-xs-3 control-label">Comentarios:</label>
				<div class="col-xs-7">
					<textarea name="comentarios" class="form-control" rows="3" placeholder="Introduzca un comentario"></textarea>
				</div>
			</div>
			<div class="form-group">
    			<div class="col-xs-offset-8 col-xs-2">
      				<button type="submit" class="btn btn-info botonFormulario">Insertar</button>
    			</div>
  			</div>
		</fieldset>
		</form>
	';
?>