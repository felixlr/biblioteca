<?php
	include("procesarErrores.php");
	session_start(); 
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"){
		function conectar(){
			$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
			@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
			return $id_conexion;
		}
		$id_conexion=conectar();
		$consulta="UPDATE ejemplares SET idEjemplar=".$_POST['idEjemplar'].",idLibro=".$_POST['idLibro'].",libroPrestado=".$_SESSION['libroPrestado'].",localizacion='".$_POST['localizacion']."',comentarios='".$_POST['comentarios']."' WHERE idLibro='".$_SESSION['idLibro']."' AND idEjemplar='".$_SESSION['idEjemplar']."'";
		
		if(mysql_query($consulta,$id_conexion)){
			$_SESSION['mensaje']="Ejemplar editado correctamente";
			header('Location:administrarEjemplares.php');
		}
		else{
			$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
			header('Location:edicionEjemplar.php?idLibro='.$_SESSION['idLibro'].'&idEjemplar='.$_SESSION['idEjemplar'].'');
			//$_SESSION['idError']=mysql_errno($idConexion);
		}
	}
?>