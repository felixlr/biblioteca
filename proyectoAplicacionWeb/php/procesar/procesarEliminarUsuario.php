<?php
	session_start();
	include("../includes/conectar.php");
	include("procesarErrores.php");
	
	$id_conexion=conectar();
	$consulta="DELETE FROM usuarios WHERE idUsuario=".$_GET['idUsuario']."";
	
	if(mysql_query($consulta,$id_conexion)){
		$_SESSION['mensaje']="Usuario Eliminado";
	}
	else{
		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
	
	header('Location:../administrarUsuarios.php');
?>