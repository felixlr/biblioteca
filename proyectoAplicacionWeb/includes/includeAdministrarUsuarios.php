<?php
	include("conectar.php");
	$idConexion=conectar();
	$consulta="SELECT * FROM usuarios,tipoCuenta WHERE idCuenta=idTipoCuenta";
	$datos=mysql_query($consulta,$idConexion);

	echo '
		<table border=1px width=80% rules="rows">
			<thead>
				<th>Nombre</th>
				<th>Tipo de Cuenta</th>
				<th colspan="2">Acciones</th>
			</thead>
			<tbody align="center">
	';
	while($fila=mysql_fetch_array($datos)){
		echo '
				<tr>
					<td>'.$fila['nombre'].'</td>
					<td>'.$fila['descripcionCuenta'].'</td>
					<td><a href="edicionUsuario.php?idUsuario='.$fila['idUsuario'].'">Editar Usuario</a></td>
					<td><a href="procesar/procesarEliminarUsuario.php?idUsuario='.$fila['idUsuario'].'">Eliminar Usuario</a></td>
				</tr>
		';
	}
	echo '
			</tbody>
		</table>
	';
?>