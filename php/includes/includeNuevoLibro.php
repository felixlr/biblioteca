<form role="form" class="form-horizontal" action="procesar/procesarNuevoLibro.php" method="POST">
	<fieldset>
		<div class="col-xs-12">
			<legend>Alta Libro</legend>
		</div>
		<div class="form-group">
			<label for="tituloLibro" class="col-xs-3 control-label">Titulo:&nbsp*</label>
			<div class="col-xs-7">
				<input id="tituloLibro" type="text" class="form-control" name="tituloLibro" placeholder="Titulo del Libro">
			</div>
		</div>
		<div class="form-group">
			<label for="ISBN" class="col-xs-3 control-label">ISBN:&nbsp*</label>
			<div class="col-xs-4">
				<input id="ISBN" type="text" class="form-control" name="ISBN" placeholder="ISBN">
			</div>
		</div>
		<div class="form-group">
			<label for="autor" class="col-xs-3 control-label">Autor:&nbsp&nbsp</label>
			<div class="col-xs-4">
				<input id="autor" type="text" class="form-control" name="autor" placeholder="Autor o Autores">
			</div>
		</div>
		<div class="form-group">
			<label for="editorial" class="col-xs-3 control-label">Editorial:&nbsp&nbsp</label>
			<div class="col-xs-4">
				<input id="editorial" type="text" class="form-control" name="editorial" placeholder="Editorial del Libro">
			</div>
		</div>
		<div class="form-group">
			<label for="edicion" class="col-xs-3 control-label">Edición:&nbsp&nbsp</label>
			<div class="col-xs-4">
				<input id="edicion" type="text" class="form-control" name="edicion" placeholder="Edición">
			</div>
		</div>
		<div class="form-group">
			<label for="anioPublicacion" class="col-xs-3 control-label">Año de Publicación:&nbsp&nbsp</label>
			<div class="col-xs-4">
				<input id="anioPublicacion" type="text" class="form-control" name="anioPublicacion" placeholder="Año de Publicación">
			</div>
		</div>
		<div class="form-group">
			<label for="comentarios" class="col-xs-3 control-label">Comentarios:&nbsp&nbsp</label>
			<div class="col-xs-7">
				<textarea name="comentarios" class="form-control" rows="3" placeholder="Introduzca un comentario"></textarea>
			</div>
		</div>
		<!--<div class="form-group">
			<label for="portadaLibro" class="col-xs-3 control-label">Portada Libro:&nbsp&nbsp</label>
			<div class="col-xs-5">
				<input type="file" id="portadaLibro" class="form-control" name="portadaLibro">
			</div>
		</div>-->
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