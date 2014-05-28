<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<html>
		<head>
			<title>Edicion Libro</title>
		</head>
		<body>
			<h1>Gestion de Libros</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Libros</p>
			<a href="administrarLibros.php">Administrar Libros</a><br/>
			<a href="nuevoLibro.php">Nuevo Libro</a><br/><br/>
			<?php if(isset($_SESSION['mensaje'])): ?>				
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']);
			endif; 
				include('includes/includeEdicionLibro.php');
			?>

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