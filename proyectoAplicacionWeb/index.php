<?php 
	session_start();
	if(isset($_SESSION['usuario'])):
		header('Location:php/inicio.php');
	else:
?>
		<html>
			<head>
				<title>Login</title>
			</head>
			<body>
				<?php if(isset($_SESSION['mensajeLogin'])): ?>
					<p><?php echo $_SESSION['mensajeLogin']; ?></p>
					<?php unset($_SESSION['mensajeLogin']); ?>
				<?php endif; ?>
				<form action="php/procesar/procesarLogin.php" method="POST">
					Usuario: <input type="text" name="usuario">
					Clave: <input type="password" name="clave">
					<input type="submit" value="Ingresar">
				</form>
			</body>
		</html>
<?php endif; ?>

<?php
	// session_start();
	
	// if(isset($_SESSION['usuario'])){
	// 	header('Location:php/principal.php');
	// }
	// else{
	// 	header('Location:php/login.php');
	// }
?>