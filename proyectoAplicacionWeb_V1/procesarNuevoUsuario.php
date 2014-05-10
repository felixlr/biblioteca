<?php
	session_start();
	function conectar(){
		$idConexion=@mysql_connect() or die("No se ha podido realizar la conexion al servidor");
		@mysql_select_db("test",$idConexion) or die("No se ha podido seleccionar la BBDD");
		
		return $idConexion;
	}
	
	$idConexion=conectar();
		
	$consulta="INSERT INTO usuarios (nombre,clave,tipoCuenta) VALUES ('".$_POST['usuario']."',".$_POST['clave'].",'".$_POST['tipoCuenta']."')";
	
	if(mysql_query($consulta,$idConexion)){
		$_SESSION['mensaje']="Usuario insertado";
		header('Location:administrarUsuarios.php');
	}
	else{
		 header('Location:nuevoUsuario.php');
		 $_SESSION['idError']=mysql_errno($idConexion);
	}
?>