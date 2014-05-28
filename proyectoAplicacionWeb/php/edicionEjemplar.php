<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<html>
		<head>
			<title>Edicion Ejemplar</title>
		</head>
		<body>
			<h1>Gestion de Ejemplares</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Ejemplares</p>
			<a href="administrarEjemplares.php">Administrar Ejemplares</a><br/>
			<a href="nuevoEjemplar.php">Nuevo Ejemplar</a><br/><br/>
			<?php if(isset($_SESSION['mensaje'])): ?>				
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']);
			endif;
				include('includes/includeEdicionEjemplar.php');
			?>
			<a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>