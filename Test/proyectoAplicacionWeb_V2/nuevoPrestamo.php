<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Gestion de Ejemplares</title>
		</head>
		<body>
			<h1>Gestion de Ejemplares</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Prestamos</p>
			<a href="administrarPrestamos.php">Administrar Prestamos</a><br/>
			<a href="nuevoPrestamo.php">Nuevo Prestamo</a><br/><br/>
			<?php if(isset($_SESSION['mensaje'])): ?>				
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']); ?>
			<?php endif; ?>
			<?php 
				function conectar(){
					$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
					@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
					return $id_conexion;
				}
				$id_conexion=conectar();
				$consulta="SELECT idLibro, tituloLibro FROM libros";
				$datos=mysql_query($consulta,$id_conexion);
			?>			
			<form action="procesarNuevoEjemplar.php" method="POST">
				Libro:
					<select name="idLibro">
						<?php $fila=mysql_fetch_array($datos); ?>
						<?php while ($fila!=""):?>						
							<option value="<?php echo $fila['idLibro']; ?>"><?php echo $fila['tituloLibro']; ?></option>
							<?php $fila=mysql_fetch_array($datos); ?>
						<?php endwhile; ?>
					</select>
				Id. Ejemplar: <input type="text" name="idEjemplar">
				Usuario: <input type="text" name="localizacion">
				Fecha Inicio: <input type="text" name="fechaInicio">
				Fecha Fin: <input type="text" name="fechaFin">
				Comentarios: <input type="text" name="comentarios">
				<input type="submit" value="Insertar Prestamo">
			</form>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: ?>
	<html>
		<head>
			<meta http-equiv="Refresh" content="0;url=index.php">
		</head>
	</html>
<?php endif; ?>