<?php session_start(); ?>
<?php if(isset($_SESSION['usuario'])): ?>
	<html>
		<head>
			<title>Inicio</title>
		</head>
		<body>
			<h1>Pagina de Inicio</h1>
			<p>Bienvenido <?php $_SESSION['usuario']; ?></p>
				<?php if($_SESSION['tipoCuenta']=="A"): ?>
					<a href="panelControl.php">Ir al panel de Control</a><br/>
				<?php endif; ?>
			<a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: ?>
	<html>
		<head>
			<meta http-equiv="Refresh" content="0;url=login.php">
		</head>
	</html>
<?php endif ?>

<?php
	session_start();
	
	if(isset($_SESSION['usuario'])){
		echo '
			<html>
				<head>
					<title>Inicio</title>
				</head>
				<body>
					<h1>Pagina de Inicio</h1>
					<p>Bienvenido '.$_SESSION['usuario'].'</p>
					';
					if($_SESSION['tipoCuenta']=="A"){
						echo '<a href="panelControl.php">Ir al panel de Control</a><br/>';
					};
				echo '<a href="cerrarSesion.php">Cerrar Sesion</a>
				</body>
			</html>
		';
	}
	else{
		echo '
		<html>
			<head>
				<meta http-equiv="Refresh" content="0;url=login.php">
			</head>
		</html>
		';
	}
?>
