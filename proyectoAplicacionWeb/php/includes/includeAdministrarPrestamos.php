<?php 
	include('conectar.php');
	$id_conexion=conectar();
	$consulta1="SELECT idUsuario,nombre FROM usuarios";
	$datos1=mysql_query($consulta1,$id_conexion);

	while($fila1=mysql_fetch_array($datos1)){
		$consulta2="SELECT libros.tituloLibro,prestamos.* FROM libros, prestamos WHERE libros.idLibro=prestamos.idLibro AND prestamos.idUsuario=".$fila1['idUsuario']." AND estaActivo=1 ORDER BY prestamos.fechaInicio DESC";
		$datos2=mysql_query($consulta2,$id_conexion);
		if(mysql_num_rows($datos2)!=0){
			echo '
				<table border=1px width=80% rules="rows">
					<thead>
						<th>Usuario</th>
						<th>ID. Usuario</th>
						<th>Libro</th>
						<th>Codigo Ejemplar</th>
						<th>Fecha Inicio Prestamo</th>
						<th>Fecha Fin Prestamo</th>
						<th>Comentarios</th>
						<th colspan="2">Acciones</th>
					</thead>
					<tbody align="center">
			';
			while($fila2=mysql_fetch_array($datos2)){
				echo '
						<tr>
							<td>'.$fila1['nombre'].'</td>
							<td>'.$fila1['idUsuario'].'</td>
							<td>'.$fila2['tituloLibro'].'</td>
							<td>'.$fila2['idLibro'].'.'.$fila2['idEjemplar'].'</td>
							<td>'.$fila2['fechaInicio'].'</td>
							<td>'.$fila2['fechaFin'].'</td>
							<td>'.$fila2['comentariosPrestamos'].'<?php echo ; ?></td>
							<td><a href="edicionPrestamo.php?idPrestamo='.$fila2['idPrestamo'].'">Editar Prestamo</a></td>
							<td><a href="finalizarPrestamo.php?idPrestamo='.$fila2['idPrestamo'].'&idLibro='.$fila2['idLibro'].'&idEjemplar='.$fila2['idEjemplar'].'">Finalizar Prestamo</a></td>
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