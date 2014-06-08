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

	$elementosObligatorios=array('idLibro','idEjemplar');

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
		if(validarIdEjemplar($_POST['idEjemplar']) AND validarCampoLetras($_POST['localizacion'])){
			$idConexion=conectar();
			$consulta="UPDATE ejemplares SET idEjemplar=".$_POST['idEjemplar'].",idLibro=".$_POST['idLibro'].",localizacion='".$_POST['localizacion']."',comentariosEjemplares='".$_POST['comentarios']."' WHERE idLibro='".$_SESSION['idLibro']."' AND idEjemplar='".$_SESSION['idEjemplar']."'";
			if(mysql_query($consulta,$idConexion)){
				$_SESSION['mensaje']="Ejemplar editado correctamente";
		 		header('Location:../administrarEjemplares.php');
			}
			else{
				$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
				header('Location:../edicionEjemplar.php?idLibro='.$_SESSION['idLibro'].'&idEjemplar='.$_SESSION['idEjemplar'].'');
				//$_SESSION['idError']=mysql_errno($idConexion);
			}
		}
		else{
			$_SESSION['mensaje']="Hay campos que no son validos";
			header('Location:../edicionEjemplar.php?idLibro='.$_SESSION['idLibro'].'&idEjemplar='.$_SESSION['idEjemplar'].'');
		}
	}
	else {
		$_SESSION['mensaje']="Faltan campos obligatorios (*)";
		header('Location:../edicionEjemplar.php?idLibro='.$_SESSION['idLibro'].'&idEjemplar='.$_SESSION['idEjemplar'].'');
	}

	// session_start();
	// if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1){

	// 	include('../includes/conectar.php');
	// 	include('procesarErrores.php');
	// 	$id_conexion=conectar();
	// 	$consulta="UPDATE ejemplares SET idEjemplar=".$_POST['idEjemplar'].",idLibro=".$_POST['idLibro'].",localizacion='".$_POST['localizacion']."',comentariosEjemplares='".$_POST['comentarios']."' WHERE idLibro='".$_SESSION['idLibro']."' AND idEjemplar='".$_SESSION['idEjemplar']."'";
	// 	if(mysql_query($consulta,$id_conexion)){
	// 		$_SESSION['mensaje']="Ejemplar editado correctamente";
	// 		header('Location:../administrarEjemplares.php');
	// 	}
	// 	else{
	// 		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
	// 		header('Location:../edicionEjemplar.php?idLibro='.$_SESSION['idLibro'].'&idEjemplar='.$_SESSION['idEjemplar'].'');
	// 		//$_SESSION['idError']=mysql_errno($idConexion);
	// 	}
	// }
?>