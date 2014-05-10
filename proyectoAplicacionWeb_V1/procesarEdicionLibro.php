<?php 
	session_start(); 
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"){
		function conectar(){
			$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
			@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
			return $id_conexion;
		}
		$id_conexion=conectar();
		$consulta="UPDATE libros SET tituloLibro='".$_POST['tituloLibro']."',ISBN='".$_POST['ISBN']."',autor='".$_POST['autor']."',editorial='".$_POST['editorial']."',edicion='".$_POST['edicion']."',comentarios='".$_POST['comentarios']."' WHERE idLibro='".$_SESSION['idLibro']."'";
		$datos=mysql_query($consulta,$id_conexion);
		
		echo'
			<html>
				<head>
					<meta http-equiv="Refresh" content="0;url=administrarLibros.php">
				</head>
			</html>
		';
	}
?>