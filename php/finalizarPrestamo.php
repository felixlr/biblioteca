<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<!DOCTYPE html>
	<html lang="es">
		<head>
			<title>Finalizar Prestamos</title>
			<?php include('includes/estilosPagina.php'); ?>
		</head>
		<body>
			<div class="fullwidth">
				<?php include('includes/mensajeSistema.php'); ?>
				<?php include('includes/headerCategorias.php'); ?>
				<section class="contenido">
					<div class="container">
						<div class="row fila">
							<h2 class="tituloSeccion">Administrar Prestamos</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked">
									<li class="active"><a href="administrarPrestamos.php">Administrar Prestamos</a></li>
									<li><a href="nuevoPrestamo.php">Nuevo Prestamo</a></li>
								</ul>
							</div>
							<div class="col-xs-10 seccionDer">
								<?php include('includes/includeFinalizarPrestamo.php'); ?>
							</div>
						</div>
					</div>
				</section>
				<?php include('includes/footer.php'); ?>
			</div>
			<?php $_SESSION['idPrestamo']=$_GET['idPrestamo']; ?>
			<?php $_SESSION['idLibro']=$_GET['idLibro']; ?>
			<?php $_SESSION['idEjemplar']=$_GET['idEjemplar']; ?>
			<?php include('includes/scriptsBootstrap.php'); ?>
		</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>