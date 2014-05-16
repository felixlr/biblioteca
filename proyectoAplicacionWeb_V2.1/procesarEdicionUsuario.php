<?php
	include("procesarErrores.php");
	session_start();
	function conectar(){
		$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
		@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
		return $id_conexion;
	}
	$id_conexion=conectar();
	$consulta="UPDATE usuarios SET nombre='".$_POST['nombre']."',clave=".$_POST['clave'].",tipoCuenta='".$_POST['tipoCuenta']."' WHERE idUsuario=".$_SESSION['idUsuario']."";
	
	if(mysql_query($consulta,$id_conexion)){
		$_SESSION['mensaje']="Usuario editado correctamente";
		header('Location:administrarUsuarios.php');
	}
	else{
		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
		header('Location:edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
?>