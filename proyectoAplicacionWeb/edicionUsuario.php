<?php session_start(); ?>
<?php $_SESSION['idUsuario']=$_GET['idUsuario']; ?>
<html>
	<head>
		<title>Editar Usuario</title>
	</head>
	<body>
		<h1>Gestion de Usuarios</h1>
		<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Usuarios</p>
		<a href="administrarUsuarios.php">Administrar Usuarios</a><br/>
		<a href="nuevoUsuario.php">Nuevo Usuario</a><br/><br/>

		<?php if(isset($_SESSION['mensaje'])): ?>				
			<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
			<?php unset($_SESSION['mensaje']);
		endif;
			include('includes/includeEdicionUsuario.php');
		?>
	
		<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
	</body>
</html>	
