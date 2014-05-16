<?php session_start(); ?>
<?php if(isset($_SESSION['usuario'])):?>
	<?php header('Location:principal.php'); ?>
<?php else: ?>
	<html>
		<head>
			<title>Login</title>
		</head>
		<body>
			<?php if(isset($_SESSION['mensajeLogin'])): ?>
				<p><?php echo $_SESSION['mensajeLogin']; ?></p>
				<?php unset($_SESSION['mensajeLogin']); ?>
			<?php endif; ?>
			<form action="procesarLogin.php" method="POST">
				Usuario: <input type="text" name="usuario">
				Clave: <input type="password" name="clave">
				<input type="submit" value="Ingresar">
			</form>
		</body>
	</html>
<?php endif; ?>