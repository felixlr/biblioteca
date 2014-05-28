<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<html>
		<head>
			<title>Gestion de Libros</title>
		</head>
		<body>
			<h1>Gestion de Libros</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Libros</p>
			<a href="administrarLibros.php">Administrar Libros</a><br/>
			<a href="nuevoLibro.php">Nuevo Libro</a><br/>
			<a href="panelControl.php">Ir a Panel de Control</a><br/><br/>

			<?php if(isset($_SESSION['mensaje'])): ?>
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']);
			endif;
				include('includes/includeAdministrarLibros.php');
			?>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>