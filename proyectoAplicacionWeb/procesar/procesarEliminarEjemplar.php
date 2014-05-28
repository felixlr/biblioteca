<?php
	session_start();
	include("../includes/conectar.php");
	include("procesarErrores.php");
	
	$id_conexion=conectar();
	$consulta="DELETE FROM ejemplares WHERE idLibro=".$_GET['idLibro']." AND idEjemplar=".$_GET['idEjemplar']." AND estaPrestado=0";
	
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
	
	header('Location:../administrarEjemplares.php');
?>