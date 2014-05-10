<?php
	//Escribir if de validacion
	
	session_start();
	
	//Conectamos con el servidor y la BBDD correspondiente
	function conectar(){
		$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
		@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
		return $id_conexion;
	}
	
	//Obtenemos el identificador correspondiente para realizar las consultas
	$id_conexion=conectar();
	
	$consulta="SELECT * FROM usuarios";
	$datos=mysql_query($consulta,$id_conexion);
	
	//Buscamos si el usuario existe para darle acceso
	$encontrado=FALSE;
	$fila=mysql_fetch_array($datos);
	while($fila!="" && !$encontrado){
		if($fila['nombre']==$_POST['usuario'] && $fila['clave']==$_POST['clave']){
			$encontrado=TRUE;
			$_SESSION['usuario']=$_POST['usuario'];
			$_SESSION['clave']=$_POST['clave'];
			$_SESSION['tipoCuenta']=$fila['tipoCuenta'];
		}
		$fila=mysql_fetch_array($datos);
	}
	
	//Si lo encontramos es redirigido a la pagina principal (inicio) de lo contrario se lo redirige al login
	if($encontrado){
		echo '
		<html>
			<head>
				<meta http-equiv="Refresh" content="0;url=principal.php">
			</head>
		</html>
		';
	}
	else {
		echo '
		<html>
			<head>
				<meta http-equiv="Refresh" content="0;url=login.php">
			</head>
		</html>
		';
		//cambiar por redirect
	}
?>