<?php

	session_start();

	include("procesarErrores.php");		
	include('../includes/conectar.php');

	foreach($_POST as $indice => $valor){
		if($valor==""){
			$indicesVacios[]=$indice;
		}
	}

	$elementosObligatorios=array('idLibro','idEjemplar','idUsuario');

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
		$idConexion=conectar();
		$consulta1="INSERT INTO prestamos (idLibro,idEjemplar,idUsuario,fechaInicio,estaActivo,comentariosPrestamos) VALUES (".$_POST['idLibro'].",".$_POST['idEjemplar'].",'".$_POST['idUsuario']."','".date('Y-m-d')."',1,'".$_POST['comentarios']."')";
		$consulta2="UPDATE ejemplares SET estaPrestado=1 WHERE idLibro='".$_POST['idLibro']."' AND idEJemplar='".$_POST['idEjemplar']."'";
		if(mysql_query($consulta1,$idConexion) AND mysql_query($consulta2,$idConexion)){
			$_SESSION['mensaje']="Prestamo realizado correctamente";
		 	header('Location:../administrarPrestamos.php');
		}
		else{
			$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
		 	header('Location:../nuevoPrestamo.php');
		}
	}
	else {
		$_SESSION['mensaje']="Faltan campos obligatorios (*)";
		header('Location:../nuevoPrestamo.php');
	}

	// session_start();
	
	// include('procesarErrores.php');
	// include('../includes/conectar.php');
	
	// $idConexion=conectar();
	
	// $consulta1="INSERT INTO prestamos (idLibro,idEjemplar,idUsuario,fechaInicio,estaActivo,comentariosPrestamos) VALUES (".$_POST['idLibro'].",".$_POST['idEjemplar'].",'".$_POST['idUsuario']."','".date('Y-m-d')."',1,'".$_POST['comentarios']."')";
	// $consulta2="UPDATE ejemplares SET estaPrestado=1 WHERE idLibro='".$_POST['idLibro']."' AND idEJemplar='".$_POST['idEjemplar']."'";

	// if(mysql_query($consulta1,$idConexion) AND mysql_query($consulta2,$idConexion)){
	// 	$_SESSION['mensaje']="Prestamo realizado correctamente";
	// 	header('Location:../administrarPrestamos.php');
	// }
	// else{
	// 	$_SESSION['mensaje']=procesarErrores(mysql_errno($idConexion));
	// 	header('Location:../nuevoPrestamo.php');
	// }
?>