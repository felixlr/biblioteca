<?php 
	include('conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT idLibro, tituloLibro FROM libros";
	$datos=mysql_query($consulta,$id_conexion);
	echo'
		<form action="procesar/procesarNuevoPrestamo.php" method="POST">
		Libro:
			<select name="idLibro" onchange="muestraEjemplar(this.value), obtenUsuarios()">
				<option>Elija un libro</option>
	';
		while ($fila=mysql_fetch_array($datos)){
			echo '
				<option value="'.$fila['idLibro'].'">'.$fila['tituloLibro'].'</option>
			';
		}
	echo '
			</select>
		Ejemplar:
			<select name="idEjemplar" id="ejemplar">
				<option>Elija un ejemplar</option>
			</select>
		Usuario:
			<select name="idUsuario" id="usuarios">
				<option>Elija un Usuario</option>
			</select>
			Comentarios: <input type="text" name="comentarios">
			<input type="submit" value="Insertar Prestamo">
		</form>
	';
?>