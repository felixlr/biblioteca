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
			$consulta="UPDATE libros SET tituloLibro='".$_POST['tituloLibro']."',ISBN='".$_POST['ISBN']."',autor='".$_POST['autor']."',editorial='".$_POST['editorial']."',edicion='".$_POST['edicion']."',comentariosLibros='".$_POST['comentarios']."',fotoLibro='".$_POST['portadaLibro']."' WHERE idLibro='".$_SESSION['idLibro']."'";
			if(mysql_query($consulta,$idConexion)){
				$_SESSION['mensaje']="Libro editado correctamente";
		 		header('Location:../administrarLibros.php');
			}
			else{
				$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
				header('Location:../edicionLibro.php?idLibro='.$_SESSION['idLibro'].'');
			}
		}
		else{
			$_SESSION['mensaje']= implode("-",$indicesNoValidos);
			header('Location:../edicionLibro.php?idLibro='.$_SESSION['idLibro'].'');
		}
	}
	else {
		$_SESSION['mensaje']="Faltan campos obligatorios (*)";
		header('Location:../edicionLibro.php?idLibro='.$_SESSION['idLibro'].'');
	}

	// if(!$faltanCamposObligatorios){
	// 	if(validarTitulo($_POST['tituloLibro']) AND validarISBN($_POST['ISBN']) AND validarCampoLetras($_POST['autor']) AND validarEditorialEdicion($_POST['editorial']) AND validarEditorialEdicion($_POST['edicion']) AND validarAnio($_POST['anioPublicacion'] )){
	// 		$idConexion=conectar();
	// 		$consulta="UPDATE libros SET tituloLibro='".$_POST['tituloLibro']."',ISBN='".$_POST['ISBN']."',autor='".$_POST['autor']."',editorial='".$_POST['editorial']."',edicion='".$_POST['edicion']."',comentariosLibros='".$_POST['comentarios']."',fotoLibro='".$_POST['portadaLibro']."' WHERE idLibro='".$_SESSION['idLibro']."'";
	// 		if(mysql_query($consulta,$idConexion)){
	// 			$_SESSION['mensaje']="Libro editado correctamente";
	// 	 		header('Location:../administrarLibros.php');
	// 		}
	// 		else{
	// 			$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
	// 			header('Location:../edicionLibro.php?idLibro='.$_SESSION['idLibro'].'');
	// 			//$_SESSION['idError']=mysql_errno($idConexion);
	// 		}
	// 	}
	// 	else{
	// 		$_SESSION['mensaje']="Hay campos que no son validos";
	// 		header('Location:../edicionLibro.php?idLibro='.$_SESSION['idLibro'].'');
	// 	}
	// }
	// else {
	// 	$_SESSION['mensaje']="Faltan campos obligatorios (*)";
	// 	header('Location:../edicionLibro.php?idLibro='.$_SESSION['idLibro'].'');
	// }

	// session_start();
	// if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1){
	// 	include('../includes/conectar.php');
	// 	include('procesarErrores.php');
	// 	$id_conexion=conectar();
	// 	$consulta="UPDATE libros SET tituloLibro='".$_POST['tituloLibro']."',ISBN='".$_POST['ISBN']."',autor='".$_POST['autor']."',editorial='".$_POST['editorial']."',edicion='".$_POST['edicion']."',comentariosLibros='".$_POST['comentarios']."',fotoLibro='".$_POST['portadaLibro']."' WHERE idLibro='".$_SESSION['idLibro']."'";
		
	// 	if(mysql_query($consulta,$id_conexion)){
	// 		$_SESSION['mensaje']="Libro editado correctamente";
	// 		header('Location:../administrarLibros.php');
	// 	}
	// 	else{
	// 		$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
	// 		header('Location:../edicionLibro.php?idLibro='.$_SESSION['idLibro'].'');
	// 		//$_SESSION['idError']=mysql_errno($idConexion);
	// 	}
	// }
?>