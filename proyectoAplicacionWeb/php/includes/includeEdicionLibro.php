<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM libros WHERE idLibro='".$_GET['idLibro']."'";
	$datos=mysql_query($consulta,$id_conexion);
	$fila=mysql_fetch_array($datos);
	echo '
		<form role="form" class="form-horizontal" action="procesar/procesarEdicionLibro.php" method="POST">
			<fieldset>
				<div class="col-xs-12">
					<legend>Editar Libro</legend>
				</div>
				<div class="form-group">
					<label for="tituloLibro" class="col-xs-3 control-label">Titulo:</label>
					<div class="col-xs-7">
						<input id="tituloLibro" type="text" class="form-control" name="tituloLibro" value="'.$fila['tituloLibro'].'">
					</div>
				</div>
				<div class="form-group">
					<label for="ISBN" class="col-xs-3 control-label">ISBN:</label>
					<div class="col-xs-4">
						<input id="ISBN" type="text" class="form-control" name="ISBN" value="'.$fila['ISBN'].'">
					</div>
				</div>
				<div class="form-group">
					<label for="autor" class="col-xs-3 control-label">Autor:</label>
					<div class="col-xs-4">
						<input id="autor" type="text" class="form-control" name="autor" value="'.$fila['autor'].'">
					</div>
				</div>
				<div class="form-group">
					<label for="editorial" class="col-xs-3 control-label">Editorial:</label>
					<div class="col-xs-4">
						<input id="editorial" type="text" class="form-control" name="editorial" value="'.$fila['editorial'].'">
					</div>
				</div>
				<div class="form-group">
					<label for="edicion" class="col-xs-3 control-label">Edición:</label>
					<div class="col-xs-4">
						<input id="edicion" type="text" class="form-control" name="edicion" value="'.$fila['edicion'].'">
					</div>
				</div>
				<div class="form-group">
					<label for="anioPublicacion" class="col-xs-3 control-label">Año de Publicación:</label>
					<div class="col-xs-4">
						<input id="anioPublicacion" type="text" class="form-control" name="anioPublicacion" value="'.$fila['anioPublicacion'].'">
					</div>
				</div>
				<div class="form-group">
					<label for="comentarios" class="col-xs-3 control-label">Comentarios:</label>
					<div class="col-xs-7">
						<textarea name="comentarios" class="form-control" rows="3">'.$fila['comentariosLibros'].'</textarea>
					</div>
				</div>
				<div class="form-group">
	    			<div class="col-xs-offset-8 col-xs-2">
	      				<button type="submit" class="btn btn-info botonFormulario">Actualizar</button>
	    			</div>
	  			</div>
			</fieldset>
		</form>
	';
	$_SESSION['idLibro']=$_GET['idLibro'];
?>