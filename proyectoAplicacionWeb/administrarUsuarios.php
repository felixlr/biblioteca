<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<html>
		<head>
			<title>Administrar Usuarios</title>
		</head>
		<body>
			<h1>Gestion de Usuarios</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Usuarios</p>
			<a href="administrarUsuarios.php">Administrar Usuarios</a><br/>
			<a href="nuevoUsuario.php">Nuevo Usuario</a><br/>
			<a href="panelControl.php">Ir a Panel de Control</a><br/><br/>
			<?php 
				if(isset($_SESSION['mensaje'])): ?>
					<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
					<?php unset($_SESSION['mensaje']);
				endif; 

				include("includes/includeAdministrarUsuarios.php");
			?>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>