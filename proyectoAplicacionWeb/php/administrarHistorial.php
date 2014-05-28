<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<html>
		<head>
			<title>Gestion de Historial</title>
		</head>
		<body>
			<h1>Administrar historial de prestamos</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Administracion del historial de prestamos</p>
			<a href="administrarHistorial.php">Administrar Historial</a><br/>
			<a href="administrarPrestamos.php">Administrar Prestamos</a><br/>
			<a href="panelControl.php">Ir a Panel de Control</a><br/><br/>
			
			<?php if(isset($_SESSION['mensaje'])): ?>
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']);
			endif;
				include('includes/includeAdministrarHistorial.php');
			?>
			<a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>