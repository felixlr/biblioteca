<?php
	session_start();
	include("procesarErrores.php");
	include("../includes/conectar.php");
	
	$idConexion=conectar();
		
	$consulta="INSERT INTO libros (tituloLibro,ISBN,autor,editorial,edicion,anioPublicacion,comentariosLibros) VALUES ('".$_POST['tituloLibro']."','".$_POST['ISBN']."','".$_POST['autor']."','".$_POST['editorial']."','".$_POST['edicion']."','".$_POST['anioPublicacion']."','".$_POST['comentarios']."')";
	
	if(mysql_query($consulta,$idConexion)){
		$_SESSION['mensaje']="Libro insertado correctamente";
		header('Location:../administrarLibros.php');
	}
	else{
		$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
		header('Location:../nuevoLibro.php');
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
?>