<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
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
				<form action="procesar/procesarNuevoLibro.php" method="POST">
					Titulo Libro: <input type="text" name="tituloLibro">
					ISBN Libro: <input type="text" name="ISBN">
					Autor: <input type="text" name="autor">
					Editorial: <input type="text" name="editorial">
					Edicion: <input type="text" name="edicion">
					Anio Publicacion: <input type="text" name="anioPublicacion">
					Comentarios: <input type="text" name="comentarios">
					<input type="submit" value="Insertar Libro">
				</form>
				<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
			</body>
		</html>
<?php else: header('inicio.php'); endif; ?>