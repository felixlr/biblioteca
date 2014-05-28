<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM usuarios,tipocuenta WHERE idUsuario=".$_GET['idUsuario']." AND usuarios.idTipoCuenta=tipocuenta.idCuenta";
	$datos1=mysql_query($consulta,$id_conexion);
	$fila1=mysql_fetch_array($datos1);

	echo '
		<form action="procesar/procesarEdicionUsuario.php" method="POST">
			Nombre: <input type="text" value="'.$fila1['nombre'].'" name="nombre">
			Tipo de Cuenta:
				<select name="tipoDeCuenta">';
					$consulta="SELECT * FROM tipocuenta";
					$datos2=mysql_query($consulta,$id_conexion);
					while($fila2=mysql_fetch_array($datos2)){
						echo '
							<option value="'.$fila2['idCuenta'].'"
						';
						if($fila1['idTipoCuenta']==$fila2['idCuenta']){
							echo 'SELECTED';
						}
						echo '
							>'.$fila2['descripcionCuenta'].'</option>
						';
					}
			echo '
				</select>
			<input type="submit" value="Actualizar Usuario">
		</form>
		';
	$_SESSION['idUsuario']=$_GET['idUsuario'];
?>