<?php
	session_start();
	
	include("procesarErrores.php");		
	include('../includes/conectar.php');
	include('../includes/validarDatos.php');

	foreach($_POST as $indice => $valor){
		if($valor==""){
			$indicesVacios[]=$indice;
		}
	}

	if(isset($_POST['contrasenia'])){
		$elementosObligatorios=array('nombre','dni','contrasenia','contraseniaConf');
	}
	else{
		$elementosObligatorios=array('nombre','dni');
	}

	$faltanCamposObligatorios=FALSE;
	for($i=0;$i<count($elementosObligatorios);$i++){
		if(isset($indicesVacios)){
			$j=0;
			while($j<count($indicesVacios) && !$faltanCamposObligatorios){
				if($elementosObligatorios[$i]==$indicesVacios[$j]){
					$faltanCamposObligatorios=TRUE;			
				}
				$j++;
			}
		}
	}
	
	if(!$faltanCamposObligatorios){

		$indicesNoValidos=array();
		camposNoValidosUsuario($indicesNoValidos);

		if(empty($indicesNoValidos)){
			//Inicio la conexion si no faltan datos y los datos son validos
			$idConexion=conectar();
			//Comprobar si esta editando la contraseña
			if(isset($_POST['contrasenia'])){
				//Actualizo usuario con edicion de contraseña
				$consulta="UPDATE usuarios SET nombre='".$_POST['nombre']."',dni='".$_POST['dni']."',contrasenia='".password_hash($_POST['contrasenia'],1)."',idTipoCuenta=".$_POST['tipoDeCuenta'].",telefono=".$_POST['telefono'].",movil=".$_POST['movil'].",email='".$_POST['email']."',anio='".$_POST['anio']."' WHERE idUsuario=".$_SESSION['idUsuario']."";
				if(mysql_query($consulta,$idConexion)){
	 				$_SESSION['mensaje']="Usuario editado correctamente";
	 				header('Location:../administrarUsuarios.php');
	 			}
	 			else{
	 				//Mensaje de error si hay un problema al realizar la query
	 				$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
	 				header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	 			}
			}
			else{
				//Actualizo sin editar contraseña
				$consulta="UPDATE usuarios SET nombre='".$_POST['nombre']."',dni='".$_POST['dni']."',idTipoCuenta=".$_POST['tipoDeCuenta'].",telefono=".$_POST['telefono'].",movil=".$_POST['movil'].",email='".$_POST['email']."',anio='".$_POST['anio']."' WHERE idUsuario=".$_SESSION['idUsuario']."";
			 	if(mysql_query($consulta,$idConexion)){
			 		$_SESSION['mensaje']="Usuario editado correctamente";
			 		header('Location:../administrarUsuarios.php');
			 	}
				else{
					//Mensaje de error si hay un problema al realizar la query
			 		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
			 		header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
			 	}
			}
		}
		else{
			$_SESSION['mensaje']=implode("-",$indicesNoValidos);
			header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
		}
	}
	else{
		$_SESSION['mensaje']="Faltan campos obligatorios (*)";
		header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	}
		
	// 	$idConexion=conectar();
		
	// 	if(isset($_POST['contrasenia'])){
	// 		if(validarCampoLetras($_POST['nombre']) AND validarDNI($_POST['dni']) AND validarContrasenia($_POST['contrasenia'],$_POST['contraseniaConf']) AND validarCorreo($_POST['email']) AND validarTelefonoMovil($_POST['telefono']) AND validarTelefonoMovil($_POST['movil']) AND validarAnio($_POST['anio'])){
	// 			//Actualizo editando contraseña
	// 			$consulta="UPDATE usuarios SET nombre='".$_POST['nombre']."',dni='".$_POST['dni']."',contrasenia='".password_hash($_POST['contrasenia'],1)."',idTipoCuenta=".$_POST['tipoDeCuenta'].",telefono=".$_POST['telefono'].",movil=".$_POST['movil'].",email='".$_POST['email']."',anio='".$_POST['anio']."' WHERE idUsuario=".$_SESSION['idUsuario']."";
	// 			if(mysql_query($consulta,$idConexion)){
	//  				$_SESSION['mensaje']="Usuario editado correctamente";
	//  				header('Location:../administrarUsuarios.php');
	//  			}
	//  			else{
	//  				$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
	//  				header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	//  			}
	// 		}
	// 		else{
	// 			$_SESSION['mensaje']="Hay campos que no son validos";
	// 			header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	// 		}
	// 	}
	// 	else{
	// 		if(validarCampoLetras($_POST['nombre']) AND validarDNI($_POST['dni']) AND validarCorreo($_POST['email']) AND validarTelefonoMovil($_POST['telefono']) AND validarTelefonoMovil($_POST['movil']) AND validarAnio($_POST['anio'])){
	// 			//Actualizo sin editar contraseña
	// 			$consulta="UPDATE usuarios SET nombre='".$_POST['nombre']."',dni='".$_POST['dni']."',idTipoCuenta=".$_POST['tipoDeCuenta'].",telefono=".$_POST['telefono'].",movil=".$_POST['movil'].",email='".$_POST['email']."',anio='".$_POST['anio']."' WHERE idUsuario=".$_SESSION['idUsuario']."";
	// 		 	if(mysql_query($consulta,$idConexion)){
	// 		 		$_SESSION['mensaje']="Usuario editado correctamente";
	// 		 		header('Location:../administrarUsuarios.php');
	// 		 	}
	// 			else{
	// 		 		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
	// 		 		header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	// 		 	}
	// 		}
	// 		else{
	// 			$_SESSION['mensaje']="Hay campos que no son validos";
	// 			header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	// 		}
	// 	}
	// }
	// else{
	// 	$_SESSION['mensaje']="Faltan campos obligatorios (*)";
	// 	header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	// }

	// $id_conexion=conectar();

	// if(isset($_POST['contraseniaConf'])){
	// 	//Verificar que los campos no esten vacios
	// 	if($_POST['contrasenia']!="" && $_POST['contraseniaConf']!=""){
	// 		//Comparar que las constraseñas sean iguales para ejecutar la actualizacion
	// 		if(strcmp($_POST['contrasenia'], $_POST['contraseniaConf'])==0){
	// 			$consulta="UPDATE usuarios SET nombre='".$_POST['nombre']."',idTipoCuenta=".$_POST['tipoDeCuenta'].",contrasenia='".password_hash($_POST['contrasenia'],1)."' WHERE idUsuario=".$_SESSION['idUsuario']."";
	// 			if(mysql_query($consulta,$id_conexion)){
	// 				$_SESSION['mensaje']="Usuario editado correctamente";
	// 				header('Location:../administrarUsuarios.php');
	// 			}
	// 			else{
	// 				$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
	// 				header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	// 			}
	// 		}
	// 		else {
	// 			$_SESSION['mensaje']="Los campos de contraseña deben ser iguales";
	// 			header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	// 		}
	// 	}
	// 	else{
	// 		$_SESSION['mensaje']="Los campos de contraseña no pueden estar vacios";
	// 		header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	// 	}
	// }
	// else{
	// 	$consulta="UPDATE usuarios SET nombre='".$_POST['nombre']."',idTipoCuenta=".$_POST['tipoDeCuenta'].",contrasenia='".password_hash($_POST['contrasenia'],1)."' WHERE idUsuario=".$_SESSION['idUsuario']."";
	// 	if(mysql_query($consulta,$id_conexion)){
	// 		$_SESSION['mensaje']="Usuario editado correctamente";
	// 		header('Location:../administrarUsuarios.php');
	// 	}
	// 	else{
	// 		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
	// 		header('Location:../edicionUsuario.php?idUsuario='.$_SESSION['idUsuario'].'');
	// 	}
	// }
?>