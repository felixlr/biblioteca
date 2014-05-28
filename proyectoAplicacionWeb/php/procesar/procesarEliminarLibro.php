<?php
	session_start();
	include("../includes/conectar.php");
	include("procesarErrores.php");
	
	$id_conexion=conectar();
	$consulta="DELETE FROM libros WHERE idLibro=".$_GET['idLibro']."";
	
	if(mysql_query($consulta,$id_conexion)){
		$_SESSION['mensaje']="Libro Eliminado";
	}
	else{
		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
	
	header('Location:../administrarLibros.php');
?>