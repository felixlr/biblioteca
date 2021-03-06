<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<!DOCTYPE html>
	<html lang="es">
		<head>
			<title>Administrar Ejemplares</title>
			<?php include("includes/estilosPagina.php"); ?>
		</head>
		<body>
			<div class="fullwidth">
				<?php include('includes/mensajeSistema.php'); ?>
				<?php include('includes/headerCategorias.php'); ?>
				<section class="contenido">
					<div class="container">
						<div class="row fila">
							<h2 class="tituloSeccion">Administrar Ejemplares</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked bg">
									<li class="active"><a href="administrarEjemplares.php">Administrar Ejemplares</a></li>
									<li><a href="nuevoEjemplar.php">Nuevo Ejemplar</a></li>
								</ul>
							</div>
							<div class="col-xs-10 seccionDer">
								<?php include('includes/includeAdministrarEjemplares.php'); ?>
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