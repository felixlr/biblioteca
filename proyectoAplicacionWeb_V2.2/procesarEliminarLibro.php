<?php
	include("procesarErrores.php");
	session_start();
	
	function conectar(){
		$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
		@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
		return $id_conexion;
	}
	
	$id_conexion=conectar();
	$consulta="DELETE FROM libros WHERE idLibro=".$_GET['idLibro']."";
	
	if(mysql_query($consulta,$id_conexion)){
		$_SESSION['mensaje']="Libro Eliminado";
	}
	else{
		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
	
	header('Location:administrarLibros.php');
?>