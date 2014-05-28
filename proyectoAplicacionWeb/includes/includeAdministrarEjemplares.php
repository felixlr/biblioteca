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
				<table border=1px width=80% rules="rows">
					<thead>
						<th>Libro</th>
						<th>Codigo Ejemplar</th>
						<th>Localizacion</th>
						<th>Comentarios</th>
						<th colspan="2">Acciones</th>
					</thead>
					<tbody align="center">
			';
			while($fila2=mysql_fetch_array($datos2)){
				echo '
					<tr>
						<td>'.$fila1['tituloLibro'].'</td>
						<td>'.$fila2['idLibro'].".".$fila2['idEjemplar'].'</td>
						<td>'.$fila2['localizacion'].'</td>
						<td>'.$fila2['comentariosEjemplares'].'</td>
						<td><a href="edicionEjemplar.php?idLibro='.$fila2['idLibro'].'&idEjemplar='.$fila2['idEjemplar'].'">Editar Ejemplar</a></td>
						<td><a href="procesar/procesarEliminarEjemplar.php?idLibro='.$fila2['idLibro'].'&idEjemplar='.$fila2['idEjemplar'].'">Eliminar Ejemplar</a></td>
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