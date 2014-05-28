<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1){

		include('../includes/conectar.php');
		include('procesarErrores.php');
		$id_conexion=conectar();
		$consulta="UPDATE ejemplares SET idEjemplar=".$_POST['idEjemplar'].",idLibro=".$_POST['idLibro'].",localizacion='".$_POST['localizacion']."',comentariosEjemplares='".$_POST['comentarios']."' WHERE idLibro='".$_SESSION['idLibro']."' AND idEjemplar='".$_SESSION['idEjemplar']."'";
		if(mysql_query($consulta,$id_conexion)){
			$_SESSION['mensaje']="Ejemplar editado correctamente";
			header('Location:../administrarEjemplares.php');
		}
		else{
			$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
			header('Location:../edicionEjemplar.php?idLibro='.$_SESSION['idLibro'].'&idEjemplar='.$_SESSION['idEjemplar'].'');
			//$_SESSION['idError']=mysql_errno($idConexion);
		}
	}
?>