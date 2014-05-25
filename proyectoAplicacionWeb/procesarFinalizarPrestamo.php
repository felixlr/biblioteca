<?php
	include("procesarErrores.php");
	session_start();
	
	if(($_POST['dia']!="" AND $_POST['mes']!="" AND $_POST['anio']!="")){
		if(checkdate($_POST['mes'],$_POST['dia'],$_POST['anio'])){
			function conectar(){
				$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
				@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
				return $id_conexion;
			}
			
			$id_conexion=conectar();

			$consulta1="UPDATE prestamos SET fechaFin=".$_POST['anio']."".$_POST['mes']."".$_POST['dia'].", estaActivo=0 WHERE idPrestamo=".$_SESSION['idPrestamo']."";
			$consulta2="UPDATE ejemplares SET libroPrestado=0 WHERE idLibro=".$_SESSION['idLibro']." AND idEjemplar=".$_SESSION['idEjemplar']."";
			
			if(mysql_query($consulta1,$id_conexion) AND mysql_query($consulta2,$id_conexion)){
				$consulta1="SELECT * FROM prestamos WHERE idPrestamo=".$_SESSION['idPrestamo']."";
				$consulta2="DELETE FROM prestamos WHERE idPrestamo=".$_SESSION['idPrestamo']."";
				if($datos=mysql_query($consulta1,$id_conexion) AND mysql_query($consulta2,$id_conexion)){
					$fila=mysql_fetch_array($datos);
					$consulta="SELECT * FROM usuarios,libros WHERE idLibro=".$fila['idLibro']." AND idUsuario=".$fila['idUsuario']."";
					
					//Organizar codigo
					
					$datos1=mysql_query($consulta,$id_conexion);
					$fila1=mysql_fetch_array($datos1);
					$consulta1="INSERT INTO historialprestamos (nombre,idUsuario,tituloLibro,idLibro,idEjemplar,fechaInicio,fechaFin,comentarios) VALUES ('".$fila1['nombre']."',".$fila['idUsuario'].",'".$fila1['tituloLibro']."',".$fila['idLibro'].",".$fila['idEjemplar'].",'".$fila['fechaInicio']."','".$fila['fechaFin']."','".$fila['comentarios']."')";
					if(mysql_query($consulta1,$id_conexion)){
						$_SESSION['mensaje']="Prestamo finalizado";
					}else
					{
						echo mysql_errno($id_conexion);
				die();
				$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
					}
				}
				else
				{
					echo mysql_errno($id_conexion);
				die();
				$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
				}
			}
			else{
				echo mysql_errno($id_conexion);
				die();
				$_SESSION['mensaje']=procesarErrores(mysql_errno($id_conexion));
			}
			header('Location:administrarPrestamos.php');
		}
		else{
			$_SESSION['mensaje']="Introduzca una fecha valida";
			header('Location:finalizarPrestamo.php?idPrestamo='.$_SESSION['idPrestamo'].'&idLibro='.$_SESSION['idLibro'].'&idEjemplar='.$_SESSION['idEjemplar'].'');
		}
	}
	else {
		$_SESSION['mensaje']="Los campos no pueden estar vacios";
		header('Location:finalizarPrestamo.php?idPrestamo='.$_SESSION['idPrestamo'].'&idLibro='.$_SESSION['idLibro'].'&idEjemplar='.$_SESSION['idEjemplar'].'');
	}
?>