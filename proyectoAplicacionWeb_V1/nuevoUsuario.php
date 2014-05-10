<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Inicio</title>
		</head>
		<body>
			<h1>Gestion de Usuarios</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Usuarios</p>
			<a href="administrarUsuarios.php">Administrar Usuarios</a><br/>
			<a href="nuevoUsuario.php">Nuevo Usuario</a><br/><br/>
			<?php if(isset($_SESSION['idError'])): ?>				
					<p>Error al insertar el Usuario. Identificador de error: <?php echo $_SESSION['idError']; ?></p>
				<?php unset($_SESSION['idError']); ?>
			<?php endif; ?>
			<form action="procesarNuevoUsuario.php" method="POST">
				Usuario: <input type="text" name="usuario">
				Clave: <input type="password" name="clave">
				Tipo de Cuenta: <input type="text" name="tipoCuenta">
				<input type="submit" value="Insertar Usuario">
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