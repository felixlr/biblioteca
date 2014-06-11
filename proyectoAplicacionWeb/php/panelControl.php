<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<title>Panel de Control</title>
		<?php include('includes/estilosPagina.php'); ?>
	</head>
	<body>
		<div class="fullwidth">
			<?php include('includes/headerPanelControl.php'); ?>
			<?php include('includes/contenidoPanelControl.php'); ?>
			<?php include('includes/footer.php'); ?>
		</div>
		<?php include('includes/scriptsBootstrap.php'); ?>
	</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>