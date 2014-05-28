<?php 
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM libros";
	$datos=mysql_query($consulta,$id_conexion);				
	
	echo '
		<table border=1px width=80% rules="rows">
			<tbody align="center">
				<tr>
					<td>Titulo Libro</td>
					<td>ISBN</td>
					<td>Autor</td>
					<td>Editorial</td>
					<td>Edicion</td>
					<td>Anio Publicacion</td>
					<td>Comentarios</td>
					<td colspan="2">Acciones</td>
				</tr>
	';
	while($fila=$fila=mysql_fetch_array($datos)){
		echo '
			<tr>
				<td>'.$fila['tituloLibro'].'</td>
				<td>'.$fila['ISBN'].'</td>
				<td>'.$fila['autor'].'</td>
				<td>'.$fila['editorial'].'</td>
				<td>'.$fila['edicion'].'</td>
				<td>'.$fila['anioPublicacion'].'</td>
				<td>'.$fila['comentariosLibros'].'</td>
				<td><a href="edicionLibro.php?idLibro='.$fila['idLibro'].'">Editar Libro</a></td>
				<td><a href="procesar/procesarEliminarLibro.php?idLibro='.$fila['idLibro'].'">Eliminar Libro</a></td>
			</tr>
		';
	}
	echo '
			</tbody>
		</table>
	';
?>