<?php
	include('conectar.php');
	$id_conexion=conectar();

	//Obtengo los usuarios que hay en el historial
	$consulta="SELECT DISTINCT idUsuario FROM historialprestamos";
	$datos1=mysql_query($consulta,$id_conexion);
	if(mysql_num_rows($datos1)!=0){
		while($fila1=mysql_fetch_array($datos1)){
			//Obtengo el historial de prestamos de cada Usuario de la tabla historialPrestamos
			$consulta="SELECT * FROM historialprestamos WHERE idUsuario='".$fila1['idUsuario']."' ORDER BY fechaFin DESC";
			$datos2=mysql_query($consulta,$id_conexion);
			echo '<table class="table table-bordered table-hover table-condensed">
					<thead>
						<th>Usuario</th>
						<th>ID. Usuario</th>
						<th>Libro</th>
						<th>Codigo Ejemplar</th>
						<th>Inicio de Prestamo</th>
						<th>Fin de Prestamo</th>
						<th>Comentarios</th>
						<th>Accion</th>
					</thead>
					<tbody align="center">
			';
			while($fila2=mysql_fetch_array($datos2)){
				echo '
					<tr>
						<td>'.$fila2['nombre'].'</td>
						<td>'.$fila2['idUsuario'].'</td>
						<td>'.$fila2['tituloLibro'].'</td>
						<td>'.$fila2['idLibro'].'.'.$fila2['idEjemplar'].'</td>
						<td>'.$fila2['fechaInicio'].'</td>
						<td>'.$fila2['fechaFin'].'</td>
						<td>'.$fila2['comentariosHistorial'].'</td>
						<td><a class="btn btn-danger btn-sm" href="procesar/procesarEliminarPrestamo.php?idHistorial='.$fila2['idHistorial'].'" title="Eliminar"><span class="glyphicon glyphicon-trash"></a>
					</tr>
				';
			}
			echo '
					</tbody>
				</table><br/>
			';
		}
	}
	else{
		echo '<p>No hay historial</p>';
	}
?>