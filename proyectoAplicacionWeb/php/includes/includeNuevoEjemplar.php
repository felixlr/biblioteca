<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT idLibro, tituloLibro FROM libros";
	$datos=mysql_query($consulta,$id_conexion);
	$fila=mysql_fetch_array($datos);
	echo '
		<form role="form" class="form-horizontal" action="procesar/procesarNuevoEjemplar.php" method="POST">
		<fieldset>
			<div class="col-xs-12">
				<legend>Alta Ejemplar</legend>
			</div>
			<div class="form-group">
				<label for="idLibro" class="col-xs-3 control-label">Libro:</label>
				<div class="col-xs-4">
					<select id="idLibro" class="form-control" name="idLibro">';
						while ($fila=mysql_fetch_array($datos)){
							echo'
								<option value="'.$fila['idLibro'].'">'.$fila['tituloLibro'].'</option>
							';
						}
				echo '</select>
				</div>
			</div>
			<div class="form-group">
				<label for="idEjemplar" class="col-xs-3 control-label">ID. Ejemplar:</label>
				<div class="col-xs-2">
					<input id="idEjemplar" type="text" class="form-control" name="idEjemplar" placeholder="ID Ejemplar">
				</div>
			</div>
			<div class="form-group">
				<label for="localizacion" class="col-xs-3 control-label">Localización:</label>
				<div class="col-xs-4">
					<input id="localizacion" type="text" class="form-control" name="localizacion" placeholder="Localización">
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