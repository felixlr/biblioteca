<?php
	session_start(); 
	if(isset($_SESSION['usuario'])): ?>
		<html>
			<head>
				<title>Inicio</title>
			</head>
			<body>
				<h1>Pagina de Inicio</h1>
				<p>Bienvenido <?php echo $_SESSION['usuario']; ?></p>
					<?php if($_SESSION['tipoCuenta']==1): ?>
						<a href="panelControl.php?backend=inicio">Ir al panel de Control</a><br/>
					<?php endif; ?>
				<a href="cerrarSesion.php">Cerrar Sesion</a>
			</body>
		</html>
<?php else: header('Location:../index.php'); endif ?>
