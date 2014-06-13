<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT idLibro,tituloLibro FROM libros ORDER BY idLibro";
	$datos1=mysql_query($consulta,$id_conexion);

	while($fila1=mysql_fetch_array($datos1)){
		$consulta="SELECT * FROM ejemplares WHERE idLibro=".$fila1['idLibro']."";
		$datos2=mysql_query($consulta,$id_conexion);
		if(mysql_num_rows($datos2)!=0){
			echo '
				<table class="table table-bordered table-hover table-condensed">
					<thead>
						<th>Libro</th>
						<th>Cod. Ejemplar</th>
						<th>Localizacion</th>
						<th>Comentarios</th>
						<th>Acciones</th>
					</thead>
					<tbody>
			';
			while($fila2=mysql_fetch_array($datos2)){
				echo '
					<tr>
						<td>'.$fila1['tituloLibro'].'</td>
						<td>'.$fila2['idLibro'].".".$fila2['idEjemplar'].'</td>
						<td>'.$fila2['localizacion'].'</td>
						<td>'.$fila2['comentariosEjemplares'].'</td>
						<td>
							<a class="btn btn-info btn-sm" href="edicionEjemplar.php?idLibro='.$fila2['idLibro'].'&idEjemplar='.$fila2['idEjemplar'].'" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
							<a class="btn btn-danger btn-sm" href="procesar/procesarEliminarEjemplar.php?idLibro='.$fila2['idLibro'].'&idEjemplar='.$fila2['idEjemplar'].'" title="Eliminar"><span class="glyphicon glyphicon-trash"></a>
						</td>
					</tr>
			';
			}
			echo '
					</tbody>
				</table><br/>
			';
		}
	}				
?>