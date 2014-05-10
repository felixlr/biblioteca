<?php
	session_start();
	
	function conectar(){
		$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
		@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
		return $id_conexion;
	}
	
	$id_conexion=conectar();
	$consulta="DELETE FROM usuarios WHERE idUsuario=".$_GET['idUsuario']."";
	if (mysql_query($consulta,$id_conexion)){
		//echo "Consulta Realizada";
		echo '
		<html>
			<head>
				<meta http-equiv="Refresh" content="0; url=administrarUsuarios.php">
			</head>
		</html>
		';
	}
	//Definir confirmacion que desea borrar el registro
	//Definir que hacer en caso de no ejecutarse la consulta
?>