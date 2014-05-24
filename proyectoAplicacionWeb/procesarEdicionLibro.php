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
		$consulta="UPDATE libros SET tituloLibro='".$_POST['tituloLibro']."',ISBN=".$_POST['ISBN'].",autor='".$_POST['autor']."',editorial='".$_POST['editorial']."',edicion='".$_POST['edicion']."',comentarios='".$_POST['comentarios']."' WHERE idLibro='".$_SESSION['idLibro']."'";
		
		if(mysql_query($consulta,$id_conexion)){
			$_SESSION['mensaje']="Libro editado correctamente";
			header('Location:administrarLibros.php');
		}
		else{
			$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
			header('Location:edicionLibro.php?idLibro='.$_SESSION['idLibro'].'');
			//$_SESSION['idError']=mysql_errno($idConexion);
		}
	}
?>