<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<!DOCTYPE html>
	<html lang="es">
		<head>
			<title>Nuevo Usuario</title>
			<?php include('includes/estilosPagina.php'); ?>
		</head>
		<body>
			<div class="fullwidth">
				<?php include('includes/headerCategorias.php'); ?>
				<section class="contenido">
					<div class="container">
						<div class="row fila">
							<h2 class="tituloSeccion">Administrar Usuarios</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="administrarUsuarios.php">Administrar Usuarios</a></li>
									<li class="active"><a href="nuevoUsuario.php">Nuevo Usuario</a></li>
								</ul>
							</div>
							<?php include("includes/mensajeSistema.php"); ?>
							<div class="col-xs-10 seccionDer">
								<?php include('includes/includeNuevoUsuario.php'); ?>
							</div>
						</div>
					</div>
				</section>
				<?php include('includes/footer.php'); ?>
			</div>
			<?php include('includes/scriptsBootstrap.php'); ?>
		</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>