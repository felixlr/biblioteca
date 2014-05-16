<?php
	include("procesarErrores.php");
	session_start();
	function conectar(){
		$idConexion=@mysql_connect() or die("No se ha podido realizar la conexion al servidor");
		@mysql_select_db("test",$idConexion) or die("No se ha podido seleccionar la BBDD");
		
		return $idConexion;
	}
	
	$idConexion=conectar();
		
	$consulta="INSERT INTO libros (tituloLibro,ISBN,autor,editorial,edicion,comentarios) VALUES ('".$_POST['tituloLibro']."',".$_POST['ISBN'].",'".$_POST['autor']."','".$_POST['editorial']."','".$_POST['edicion']."','".$_POST['comentarios']."')";
	
	if(mysql_query($consulta,$idConexion)){
		$_SESSION['mensaje']="Libro insertado correctamente";
		header('Location:administrarLibros.php');
	}
	else{
		$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
		header('Location:nuevoLibro.php');
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
?>