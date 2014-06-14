<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT idLibro,tituloLibro FROM libros ORDER BY idLibro";
	$datos1=mysql_query($consulta,$id_conexion);
	// $consulta="SELECT * FROM libros,ejemplares WHERE libros.idLibro=ejemplares.idLibro AND idLibro='".$_GET['idLibro']."' AND idEjemplar='".$_GET['idEjemplar']."'";
	// $datos=mysql_query($consulta,$id_conexion);
	// $fila=mysql_fetch_array($datos);
	echo '
		<form role="form" class="form-horizontal" action="procesar/procesarEdicionEjemplar.php" method="POST">
		<fieldset>
			<div class="col-xs-12">
				<legend>Editar Ejemplar</legend>
			</div>
			<div class="form-group">
				<label for="idLibro" class="col-xs-3 control-label">Libro:&nbsp*</label>
				<div class="col-xs-4">
					<select id="idLibro" class="form-control" name="idLibro">';
						while ($fila=mysql_fetch_array($datos1)){
							echo'
							<option value="'.$fila['idLibro'].'"';
							if ($fila['idLibro']==$_GET['idLibro']){
								echo' SELECTED';
							}
							echo '>'.$fila['tituloLibro'].'</option>
							';
						}
				echo '</select>
				</div>
			</div>';
	$consulta="SELECT * FROM ejemplares WHERE idLibro='".$_GET['idLibro']."' AND idEjemplar='".$_GET['idEjemplar']."'";
	$datos2=mysql_query($consulta,$id_conexion);
	$fila=mysql_fetch_array($datos2);
		echo '
			<div class="form-group">
				<label for="idEjemplar" class="col-xs-3 control-label">ID. Ejemplar:&nbsp*</label>
				<div class="col-xs-1">
					<input id="idEjemplar" type="text" class="form-control" name="idEjemplar" value="'.$fila['idEjemplar'].'">
				</div>
			</div>
			<div class="form-group">
				<label for="localizacion" class="col-xs-3 control-label">Localización:&nbsp*</label>
				<div class="col-xs-4">
					<input id="localizacion" type="text" class="form-control" name="localizacion" value="'.$fila['localizacion'].'">
				</div>
			</div>
			<div class="form-group">
				<label for="comentarios" class="col-xs-3 control-label">Comentarios:&nbsp&nbsp</label>
				<div class="col-xs-7">
					<textarea name="comentarios" class="form-control" rows="3">'.$fila['comentariosEjemplares'].'</textarea>
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
	$_SESSION['idLibro']=$_GET['idLibro'];
	$_SESSION['idEjemplar']=$_GET['idEjemplar'];
?>