<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM tipocuenta";
	$datos=mysql_query($consulta,$id_conexion);
	$fila=mysql_fetch_array($datos);
	echo '
		<form action="procesar/procesarNuevoUsuario.php" method="POST">
			Usuario: <input type="text" name="usuario">
			DNI: <input type="text" name="dni">
			Contrasenia: <input type="password" name="contrasenia">
			Repita la Clave: <input type="password" name="contraseniaConf">
			Tipo de Cuenta:
			<select name="tipoDeCuenta">';
			while ($fila){
				echo '<option value="'.$fila['idCuenta'].'"';
				if($fila['descripcionCuenta']=="Profesor"){
					echo 'SELECTED';
				}
				echo '>'.$fila['descripcionCuenta'].'</option>';
				$fila=mysql_fetch_array($datos);
			}
		echo '
			</select>
			<input type="submit" value="Insertar Usuario">
		</form>
	';
?>