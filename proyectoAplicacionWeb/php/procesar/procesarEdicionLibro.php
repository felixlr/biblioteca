<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1){
		include('../includes/conectar.php');
		include('procesarErrores.php');
		$id_conexion=conectar();
		$consulta="UPDATE libros SET tituloLibro='".$_POST['tituloLibro']."',ISBN='".$_POST['ISBN']."',autor='".$_POST['autor']."',editorial='".$_POST['editorial']."',edicion='".$_POST['edicion']."',comentariosLibros='".$_POST['comentarios']."' WHERE idLibro='".$_SESSION['idLibro']."'";
		
		if(mysql_query($consulta,$id_conexion)){
			$_SESSION['mensaje']="Libro editado correctamente";
			header('Location:../administrarLibros.php');
		}
		else{
			$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
			header('Location:../edicionLibro.php?idLibro='.$_SESSION['idLibro'].'');
			//$_SESSION['idError']=mysql_errno($idConexion);
		}
	}
?>