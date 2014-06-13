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

	$elementosObligatorios=array('tituloLibro','ISBN');

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

		camposNoValidosLibro($indicesNoValidos);

		if(empty($indicesNoValidos)){
			$idConexion=conectar();
			$consulta="INSERT INTO libros VALUES (null,'".$_POST['tituloLibro']."','".$_POST['ISBN']."','".$_POST['autor']."','".$_POST['editorial']."','".$_POST['edicion']."','".$_POST['anioPublicacion']."','".$_POST['comentarios']."','')";
			if(mysql_query($consulta,$idConexion)){
				$_SESSION['mensaje']="Libro insertado correctamente";
				header('Location:../administrarLibros.php');
			}
			else{
				$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion),3);
				header('Location:../nuevoLibro.php');
			}
		}
		else{
			$_SESSION['mensaje']= implode("-",$indicesNoValidos);
			header('Location:../nuevoLibro.php');
		}
	}
	else {
		$_SESSION['mensaje']="Faltan campos obligatorios (*)";
		header('Location:../nuevoLibro.php');
	}

	// if(!$faltanCamposObligatorios){
	// 	if(validarTitulo($_POST['tituloLibro']) AND validarISBN($_POST['ISBN']) AND validarCampoLetras($_POST['autor']) AND validarEditorialEdicion($_POST['editorial']) AND validarEditorialEdicion($_POST['edicion']) AND validarAnio($_POST['anioPublicacion'] )){
	// 		$idConexion=conectar();
	// 		$consulta="INSERT INTO libros VALUES (null,'".$_POST['tituloLibro']."','".$_POST['ISBN']."','".$_POST['autor']."','".$_POST['editorial']."','".$_POST['edicion']."',".$_POST['anioPublicacion'].",'".$_POST['comentarios']."','".$_POST['portadaLibro']."')";
	// 		if(mysql_query($consulta,$idConexion)){
	// 			$_SESSION['mensaje']="Libro insertado correctamente";
	// 			header('Location:../administrarLibros.php');
	// 		}
	// 		else{
	// 			echo "falla query";
	// 		die();
	// 			$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
	// 			header('Location:../nuevoLibro.php');
	// 			//$_SESSION['idError']=mysql_errno($idConexion);
	// 		}
	// 	}
	// 	else{
	// 		$_SESSION['mensaje']="Hay campos que no son validos";
	// 		header('Location:../nuevoLibro.php');
	// 	}
	// }
	// else {
	// 	$_SESSION['mensaje']="Faltan campos obligatorios (*)";
	// 	header('Location:../nuevoLibro.php');
	// }
	
	// session_start();
	// include("procesarErrores.php");
	// include("../includes/conectar.php");
	
	// $idConexion=conectar();
		
	// $consulta="INSERT INTO libros (tituloLibro,ISBN,autor,editorial,edicion,anioPublicacion,comentariosLibros) VALUES ('".$_POST['tituloLibro']."','".$_POST['ISBN']."','".$_POST['autor']."','".$_POST['editorial']."','".$_POST['edicion']."','".$_POST['anioPublicacion']."','".$_POST['comentarios']."')";
	
	// if(mysql_query($consulta,$idConexion)){
	// 	$_SESSION['mensaje']="Libro insertado correctamente";
	// 	header('Location:../administrarLibros.php');
	// }
	// else{
	// 	$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
	// 	header('Location:../nuevoLibro.php');
	// 	//$_SESSION['idError']=mysql_errno($idConexion);
	// }
?>