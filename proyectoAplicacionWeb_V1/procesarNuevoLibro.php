<?php
	function conectar(){
		$idConexion=@mysql_connect() or die("No se ha podido realizar la conexion al servidor");
		@mysql_select_db("test",$idConexion) or die("No se ha podido seleccionar la BBDD");
		
		return $idConexion;
	}
	
	$idConexion=conectar();
		
	$consulta="INSERT INTO libros (tituloLibro,ISBN,autor,editorial,edicion,comentarios) VALUES ('".$_POST['tituloLibro']."',".$_POST['ISBN'].",'".$_POST['autor']."','".$_POST['editorial']."','".$_POST['edicion']."','".$_POST['comentarios']."')";
	
	mysql_query($consulta,$idConexion);
	
	echo '
		<html>
			<head>
				<meta http-equiv="Refresh" content="0;url=administrarLibros.php">
			</head>
		</html>
	';
?>