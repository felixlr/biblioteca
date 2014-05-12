<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Inicio</title>
		</head>
		<body>
			<h1>Gestion de Libros</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Libros</p>
			<a href="administrarLibros.php">Administrar Libros</a><br/>
			<a href="nuevoLibro.php">Nuevo Libro</a><br/><br/>
			<?php if(isset($_SESSION['mensaje'])): ?>				
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']); ?>
			<?php endif; ?>
			<form action="procesarNuevoLibro.php" method="POST">
				Titulo Libro: <input type="text" name="tituloLibro">
				ISBN Libro: <input type="text" name="ISBN">
				Autor: <input type="text" name="autor">
				Editorial: <input type="text" name="editorial">
				Edicion: <input type="text" name="edicion">
				Comentarios: <input type="text" name="comentarios">
				<input type="submit" value="Insertar Libro">
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