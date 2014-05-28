<?php
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM ejemplares WHERE idLibro='".$_GET['idLibro']."' AND idEjemplar='".$_GET['idEjemplar']."'";
	$datos=mysql_query($consulta,$id_conexion);
	$fila=mysql_fetch_array($datos);

	echo'
		<form action="procesar/procesarEdicionEjemplar.php" method="POST">
			Id. Libro: <input type="text" name="idLibro" value="'.$fila['idLibro'].'">
			Num. Ejemplar: <input type="text" name="idEjemplar" value="'.$fila['idEjemplar'].'">
			Localizacion: <input type="text" name="localizacion" value="'.$fila['localizacion'].'">
			Comentarios: <input type="text" name="comentarios" value="'.$fila['comentariosEjemplares'].'">
			<input type="submit" value="Actualizar Ejemplar">
		</form>
	';
	$_SESSION['idLibro']=$_GET['idLibro'];
	$_SESSION['idEjemplar']=$_GET['idEjemplar'];
?>