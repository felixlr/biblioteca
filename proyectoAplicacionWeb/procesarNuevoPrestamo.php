<?php
	session_start();
	
	include("procesarErrores.php");
	
	function conectar(){
		$idConexion=@mysql_connect() or die("No se ha podido realizar la conexion al servidor");
		@mysql_select_db("test",$idConexion) or die("No se ha podido seleccionar la BBDD");

		return $idConexion;
	}
	
	$idConexion=conectar();
	
	$consulta1="INSERT INTO prestamos (idLibro,idEjemplar,idUsuario,fechaInicio,estaActivo,comentarios) VALUES (".$_POST['idLibro'].",".$_POST['idEjemplar'].",'".$_POST['idUsuario']."','".date('Y-m-d')."','1','".$_POST['comentarios']."')";
	$consulta2="UPDATE ejemplares SET libroPrestado=1 WHERE idLibro='".$_POST['idLibro']."' AND idEJemplar='".$_POST['idEjemplar']."'";
	
	if(mysql_query($consulta1,$idConexion) AND mysql_query($consulta2,$idConexion)){
		$_SESSION['mensaje']="Prestamo realizado correctamente";
		header('Location:administrarPrestamos.php');
	}
	else{
		$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
		header('Location:nuevoPrestamo.php');
		//$_SESSION['idError']=mysql_errno($idConexion);
	}
?>