<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM libros WHERE idLibro='".$_GET['idLibro']."'";
	$datos=mysql_query($consulta,$id_conexion);
	$fila=mysql_fetch_array($datos);
	echo '
		<form action="procesar/procesarEdicionLibro.php" method="POST">
			Titulo: <input type="text" name="tituloLibro" value="'.$fila['tituloLibro'].'">
			ISBN: <input type="text" name="ISBN" value="'.$fila['ISBN'].'">
			Autor: <input type="text" name="autor" value="'.$fila['autor'].'">
			Editorial: <input type="text" name="editorial" value="'.$fila['editorial'].'">
			Edicion: <input type="text" name="edicion" value="'.$fila['edicion'].'">
			Comentarios: <input type="text" name="comentarios" value="'.$fila['comentariosLibros'].'">
			<input type="submit" value="Actualizar Libro">
		</form>
	';
	$_SESSION['idLibro']=$_GET['idLibro'];
?>