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

	$elementosObligatorios=array('nombre','dni','contrasenia','contraseniaConf');

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
		if(validarCampoLetras($_POST['nombre']) AND validarDNI($_POST['dni']) AND validarContrasenia($_POST['contrasenia'],$_POST['contraseniaConf']) AND validarCorreo($_POST['email']) AND validarTelefonoMovil($_POST['telefono']) AND validarTelefonoMovil($_POST['movil']) AND validarAnio($_POST['anio'])){
			$idConexion=conectar();
			$consulta="INSERT INTO usuarios VALUES (null,'".$_POST['dni']."','".password_hash($_POST['contrasenia'],1)."','".$_POST['nombre']."',".$_POST['telefono'].",".$_POST['movil'].",'".$_POST['email']."',".$_POST['tipoDeCuenta'].",".$_POST['anio'].")";
			if(mysql_query($consulta,$idConexion)){
				$_SESSION['mensaje']="Usuario insertado correctamente";
				header('Location:../administrarUsuarios.php');
			}
			else{
				$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion),1);
				header('Location:../nuevoUsuario.php');
				//$_SESSION['idError']=mysql_errno($idConexion);
			}
		}
		else{
			$_SESSION['mensaje']="Hay campos que no son validos";
			header('Location:../nuevoUsuario.php');
		}
	}
	else {
		$_SESSION['mensaje']="Faltan campos obligatorios (*)";
		header('Location:../nuevoUsuario.php');
	}

	// //Verificar que la clave coincide para el usuario
	// if($_POST['contrasenia']==$_POST['contraseniaConf'])
	// {
	// 	include("procesarErrores.php");		
	// 	include('../includes/conectar.php');
	// 	$idConexion=conectar();
	// 	$consulta="INSERT INTO usuarios (dni,contrasenia,nombre,idTipoCuenta) VALUES ('".$_POST['dni']."','".password_hash($_POST['contrasenia'],1)."','".$_POST['usuario']."',".$_POST['tipoDeCuenta'].")";
		
	// 	if(mysql_query($consulta,$idConexion)){
	// 		$_SESSION['mensaje']="Usuario insertado correctamente";
	// 		header('Location:../administrarUsuarios.php');
	// 	}
	// 	else{
	// 		$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
	// 		header('Location:../nuevoUsuario.php');
	// 		//$_SESSION['idError']=mysql_errno($idConexion);
	// 	}
	// }
	// else {
	// 	$_SESSION['mensaje']="La clave introducida no coincide";
	// 	header('Location:../nuevoUsuario.php');
	// }
?>