<?php
	include('../includes/conectar.php');	
	$id_conexion=conectar();
	$consulta="SELECT idUsuario,nombre FROM usuarios";
	$datos=mysql_query($consulta,$id_conexion);
	
	echo '<option value="">Elija un Usuario</option>';
	while($fila=mysql_fetch_array($datos)){
		echo'
			<option value="'.$fila['idUsuario'].'">'.$fila['nombre'].'</option>
		';
	}
?>