<?php
	function conectar(){
		$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
		@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
		return $id_conexion;
	}
	
	$id_conexion=conectar();
	$consulta="SELECT idUsuario,nombre FROM usuarios";
	$datos=mysql_query($consulta,$id_conexion);
	
	echo '<option>Elija un Usuario</option>';
	$fila=mysql_fetch_array($datos);
	while($fila){
		echo'
			<option value="'.$fila['idUsuario'].'">'.$fila['nombre'].'</option>
		';
		$fila=mysql_fetch_array($datos);
	}
?>