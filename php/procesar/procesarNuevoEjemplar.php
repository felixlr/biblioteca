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

	$elementosObligatorios=array('idLibro','idEjemplar','localizacion');

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

		camposNoValidosEjemplar($indicesNoValidos);

		if(empty($indicesNoValidos)){
			$idConexion=conectar();
			$consulta="INSERT INTO ejemplares VALUES (".$_POST['idEjemplar'].",".$_POST['idLibro'].",0,'".$_POST['localizacion']."','".$_POST['comentarios']."')";
			if(mysql_query($consulta,$idConexion)){
				$_SESSION['mensaje']="Ejemplar insertado correctamente";
				header('Location:../administrarEjemplares.php');
			}
			else{
				$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion),3);
				header('Location:../nuevoEjemplar.php');
			}
		}
		else{
			$_SESSION['mensaje']= implode("-",$indicesNoValidos);
			header('Location:../nuevoEjemplar.php');
		}
	}
	else {
		$_SESSION['mensaje']="Faltan campos obligatorios (*)";
		header('Location:../nuevoEjemplar.php');
	}


	// if(!$faltanCamposObligatorios){
	// 	if(validarIdEjemplar($_POST['idEjemplar']) AND validarCampoLetras($_POST['localizacion'])){
	// 		$idConexion=conectar();
	// 		$consulta="INSERT INTO ejemplares VALUES (".$_POST['idEjemplar'].",".$_POST['idLibro'].",0,'".$_POST['localizacion']."','".$_POST['comentarios']."')";
	// 		if(mysql_query($consulta,$idConexion)){
	// 			$_SESSION['mensaje']="Ejemplar insertado correctamente";
	// 			header('Location:../administrarEjemplares.php');
	// 		}
	// 		else{
	// 			$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
	// 			header('Location:../nuevoEjemplar.php');
	// 			//$_SESSION['idError']=mysql_errno($idConexion);
	// 		}
	// 	}
	// 	else{
	// 		$_SESSION['mensaje']="Hay campos que no son validos";
	// 		header('Location:../nuevoEjemplar.php');
	// 	}
	// }
	// else {
	// 	$_SESSION['mensaje']="Faltan campos obligatorios (*)";
	// 	header('Location:../nuevoEjemplar.php');
	// }

	//	session_start();	
	// include("procesarErrores.php");
	// include("../includes/conectar.php");
	// $idConexion=conectar();
	
	// $consulta="INSERT INTO ejemplares VALUES (".$_POST['idEjemplar'].",".$_POST['idLibro'].",0,'".$_POST['localizacion']."','".$_POST['comentarios']."')";
	
	// if(mysql_query($consulta,$idConexion)){
	// 	$_SESSION['mensaje']="Ejemplar insertado correctamente";
	// 	header('Location:../administrarEjemplares.php');
	// }
	// else{
	// 	$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
	// 	header('Location:../nuevoEjemplar.php');
	// 	//$_SESSION['idError']=mysql_errno($idConexion);
	// }
?>