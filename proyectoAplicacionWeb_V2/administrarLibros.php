<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Gestion de Libros</title>
		</head>
		<body>
			<h1>Gestion de Libros</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Libros</p>
			<a href="administrarLibros.php">Administrar Libros</a><br/>
			<a href="nuevoLibro.php">Nuevo Libro</a><br/><br/>
			
			<?php 
				function conectar(){
					$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
					@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
					return $id_conexion;
				}
				$id_conexion=conectar();
				$consulta="SELECT * FROM libros";
				$datos=mysql_query($consulta,$id_conexion);				
			?>
			<?php if(isset($_SESSION['mensaje'])): ?>
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']); ?>
			<?php endif;?>
			<table border=1px width=50% rules="rows">
				<tbody align="center">
					<tr>
						<td>Titulo Libro</td>
						<td>ISBN</td>
						<td>Autor</td>
						<td>Editorial</td>
						<td></td>
						<td></td>
					</tr>
					<?php $fila=mysql_fetch_array($datos); ?>
						<?php while($fila!=""): ?>						
							<tr>
								<td><?php echo $fila['tituloLibro']; ?></td>
								<td><?php echo $fila['ISBN']; ?></td>
								<td><?php echo $fila['autor']; ?></td>
								<td><?php echo $fila['editorial']; ?></td>
								<td><a href="edicionLibro.php?idLibro=<?php echo $fila['idLibro']; ?>">Editar Libro</a></td>
								<td><a href="procesarEliminarLibro.php?idLibro=<?php echo $fila['idLibro']; ?>">Eliminar Libro</a></td>
							</tr>
						<?php $fila=mysql_fetch_array($datos); ?>
					<?php endwhile; ?>
				</tbody>
			</table>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: ?>
	<html>
		<head>
			<meta http-equiv="Refresh" content="0; url=index.php">
		</head>
	</html>
<?php endif; ?>