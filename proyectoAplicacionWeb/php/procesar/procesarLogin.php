<?php
	session_start();
	
	//Incluimos la libreria con la funcion conectar

	include("../includes/conectar.php");

	//Obtenemos el identificador correspondiente para realizar las consultas
	$id_conexion=conectar();
	
	$consulta="SELECT * FROM usuarios";
	$datos=mysql_query($consulta,$id_conexion);
	
	//Buscamos si el usuario existe para darle acceso
	$encontrado=FALSE;
	$fila=mysql_fetch_array($datos);
	while($fila!="" && !$encontrado){
		if($fila['nombre']==$_POST['usuario'] && password_verify($_POST['clave'],$fila['contrasenia'])){
			$encontrado=TRUE;
			$_SESSION['usuario']=$_POST['usuario'];
			$_SESSION['tipoCuenta']=$fila['idTipoCuenta'];
		}
		else{
			$_SESSION['mensajeLogin']="Usuario o Contrasena invalido";
		}
		$fila=mysql_fetch_array($datos);
	}
	
	//Si lo encontramos es redirigido a la pagina principal (inicio) de lo contrario se lo redirige al login
	if($encontrado){
		header('Location:../inicio.php');
	}
	else {
		header('Location:../index.php');
	}
?>