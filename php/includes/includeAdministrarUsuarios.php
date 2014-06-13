<?php
	include("conectar.php");
	$idConexion=conectar();
	$consulta="SELECT * FROM usuarios,tipocuenta WHERE idCuenta=idTipoCuenta";
	$datos=mysql_query($consulta,$idConexion);

	echo '
		<table class="table table-bordered table-hover table-condensed">
			<thead>
				<th>Nombre</th>
				<th>DNI</th>
				<th>Tipo de Cuenta</th>
				<th>Teléfono</th>
				<th>Móvil</th>
				<th>Correo Electrónico</th>
				<th>Año</th>
				<th>Acciones</th>
			</thead>
			<tbody>
	';
	while($fila=mysql_fetch_array($datos)){
		echo '
				<tr>
					<td>'.$fila['nombre'].'</td>
					<td>'.$fila['dni'].'</td>
					<td>'.$fila['descripcionCuenta'].'</td>
					<td>'.$fila['telefono'].'</td>
					<td>'.$fila['movil'].'</td>
					<td>'.$fila['email'].'</td>
					<td>'.$fila['anio'].'</td>
					<td>
						<a class="btn btn-info btn-sm" role="button" href="edicionUsuario.php?idUsuario='.$fila['idUsuario'].'" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
						<a class="btn btn-danger btn-sm" role="button" href="procesar/procesarEliminarUsuario.php?idUsuario='.$fila['idUsuario'].'" title="Eliminar"><span class="glyphicon glyphicon-trash"></a>
					</td>					
				</tr>
		';
	}
	echo '
			</tbody>
		</table>
	';
?>