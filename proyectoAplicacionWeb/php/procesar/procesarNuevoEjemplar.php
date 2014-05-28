<?php
	session_start();
	
	include("procesarErrores.php");
	include("../includes/conectar.php");
	$idConexion=conectar();
	
	$consulta="INSERT INTO ejemplares VALUES (".$_POST['idEjemplar'].",".$_POST['idLibro'].",0,'".$_POST['localizacion']."','".$_POST['comentarios']."')";
	
	if(mysql_query($consulta,$idConexion)){
		$_SESSION['mensaje']="Ejemplar insertado correctamente";
		header('Location:../administrarEjemplares.php');
	}
	else{
		$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
		header('Location:../nuevoEjemplar.php');
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
?>