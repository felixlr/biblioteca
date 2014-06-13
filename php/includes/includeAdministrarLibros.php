<?php 
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM libros";
	$datos=mysql_query($consulta,$id_conexion);				
	
	echo '
		<table class="table table-bordered table-hover table-condensed">
			<thead>
				<th>Titulo Libro</th>
				<th>ISBN</th>
				<th>Autor</th>
				<th>Editorial</th>
				<th>Edicion</th>
				<th>Anio Publicacion</th>
				<th>Comentarios</th>
				<th colspan="2">Acciones</th>
			</thead>
			<tbody>
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
				<td>
					<a class="btn btn-info btn-sm" href="edicionLibro.php?idLibro='.$fila['idLibro'].'" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
					<a class="btn btn-danger btn-sm" href="procesar/procesarEliminarLibro.php?idLibro='.$fila['idLibro'].'" title="Eliminar"><span class="glyphicon glyphicon-trash"></a>
				</td>				
			</tr>
		';
	}
	echo '	</tbody>
		</table>
	';
?>