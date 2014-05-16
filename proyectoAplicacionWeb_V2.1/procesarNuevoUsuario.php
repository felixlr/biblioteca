<?php
	session_start();
	
	if($_POST['clave']==$_POST['claveConf']){
	
		include("procesarErrores.php");

		
		function conectar(){
			$idConexion=@mysql_connect() or die("No se ha podido realizar la conexion al servidor");
			@mysql_select_db("test",$idConexion) or die("No se ha podido seleccionar la BBDD");
			
			return $idConexion;
		}
		
		$idConexion=conectar();
		
		$consulta="INSERT INTO usuarios (nombre,clave,tipoCuenta) VALUES ('".$_POST['usuario']."','".password_hash($_POST['clave'],1)."','".$_POST['tipoDeCuenta']."')";
		
		if(mysql_query($consulta,$idConexion)){
			$_SESSION['mensaje']="Usuario insertado correctamente";
			header('Location:administrarUsuarios.php');
		}
		else{
			$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
			header('Location:nuevoUsuario.php');
			//$_SESSION['idError']=mysql_errno($idConexion);
		}
	}
	else {
		$_SESSION['mensaje']="La clave introducida no coincide";
		header('Location:nuevoUsuario.php');
	}
?>