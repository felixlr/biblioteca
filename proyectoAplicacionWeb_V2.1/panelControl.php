<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Inicio</title>
		</head>
		<body>
			<h1>Panel de Control</h1>
			<p>Estas en el panel de control <?php echo $_SESSION['usuario']; ?></p>
			<a href="administrarUsuarios.php">Gestion de Usuarios</a><br/>
			<a href="administrarLibros.php">Gestion de Libros</a><br/>
			<a href="administrarEjemplares.php">Gestion de Ejemplares</a><br/>
			<a href="administrarPrestamos.php">Gestion de Prestamos</a><br/>
			
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