<?php
	session_start();
	include("../includes/conectar.php");
	include("procesarErrores.php");
	$id_conexion=conectar();
	$consulta="UPDATE usuarios SET nombre='".$_POST['nombre']."',idTipoCuenta=".$_POST['tipoDeCuenta']." WHERE idUsuario=".$_SESSION['idUsuario']."";
	
	if(mysql_query($consulta,$id_conexion)){
		$_SESSION['mensaje']="Usuario editado correctamente";
		header('Location:../administrarUsuarios.php');
	}
	else{
		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
		header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
?>