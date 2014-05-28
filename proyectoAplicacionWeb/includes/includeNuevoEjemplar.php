<?php 
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT idLibro, tituloLibro FROM libros";
	$datos=mysql_query($consulta,$id_conexion);
	
	echo '
		<form action="procesar/procesarNuevoEjemplar.php" method="POST">	
			Libro:
				<select name="idLibro">';
					while ($fila=mysql_fetch_array($datos)){
						echo'
							<option value="'.$fila['idLibro'].'">'.$fila['tituloLibro'].'</option>
						';
					}
		echo '
				</select>
			Id. Ejemplar: <input type="text" name="idEjemplar">
			Localizacion: <input type="text" name="localizacion">
			Comentarios: <input type="text" name="comentarios">
			<input type="submit" value="Insertar Ejemplar">
		</form>
				';
?>