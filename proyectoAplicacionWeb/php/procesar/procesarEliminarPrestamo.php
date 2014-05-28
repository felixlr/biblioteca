<?php
	session_start();
	include("../includes/conectar.php");
	include("procesarErrores.php");
	
	$id_conexion=conectar();
	$consulta="DELETE FROM historialprestamos WHERE idHistorial=".$_GET['idHistorial']."";
	
	if(mysql_query($consulta,$id_conexion)){
		$_SESSION['mensaje']="Prestamo eliminado del Historial";
	}
	else{
		echo mysql_errno($id_conexion);
		die();
		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
	
	header('Location:../administrarHistorial.php');
?>