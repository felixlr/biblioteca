<?php
	session_start();
	//Verificar que la clave coincide para el usuario
	if($_POST['contrasenia']==$_POST['contraseniaConf'])
	{
		include("../procesarErrores.php");		
		include('../includes/conectar.php');
		$idConexion=conectar();
		$consulta="INSERT INTO usuarios (dni,contrasenia,nombre,idTipoCuenta) VALUES ('".$_POST['dni']."','".password_hash($_POST['contrasenia'],1)."','".$_POST['usuario']."',".$_POST['tipoDeCuenta'].")";
		
		if(mysql_query($consulta,$idConexion)){
			$_SESSION['mensaje']="Usuario insertado correctamente";
			header('Location:../administrarUsuarios.php');
		}
		else{
			$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
			header('Location:../nuevoUsuario.php');
			//$_SESSION['idError']=mysql_errno($idConexion);
		}
	}
	else {
		$_SESSION['mensaje']="La clave introducida no coincide";
		header('Location:../nuevoUsuario.php');
	}
?>