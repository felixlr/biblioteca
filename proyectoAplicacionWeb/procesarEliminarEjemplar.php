<?php
	include("procesarErrores.php");
	session_start();
	
	function conectar(){
		$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
		@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
		return $id_conexion;
	}
	
	$id_conexion=conectar();
	$consulta="DELETE FROM ejemplares WHERE idLibro=".$_GET['idLibro']." AND idEjemplar=".$_GET['idEjemplar']." AND libroPrestado=0";
	
	if(mysql_query($consulta,$id_conexion)){
		if(mysql_affected_rows($id_conexion)>0){
			$_SESSION['mensaje']="Ejemplar eliminado";
		}
		else{
			$_SESSION['mensaje']="No es posible eliminar un ejemplar prestado";
		}
	}
	else{
		echo mysql_errno($id_conexion);
		die();
		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
	}
	
	header('Location:administrarEjemplares.php');
?>