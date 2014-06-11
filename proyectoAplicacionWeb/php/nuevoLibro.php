<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<!DOCTYPE html>
	<html lang="es">
		<head>
			<title>Nuevo Libro</title>
			<?php include("includes/estilosPagina.php"); ?>
		</head>
		<body>
			<div class="fullwidth">
				<?php include('includes/headerCategorias.php'); ?>
				<section class="contenido">
					<div class="container">
						<div class="row fila">
							<h2 class="tituloSeccion">Administrar Libros</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="administrarLibros.php">Administrar Libros</a></li>
									<li class="active"><a href="nuevoLibro.php">Nuevo Libro</a></li>
									<li><a href="panelControl.php">Panel de Control</a></li>
								</ul>
							</div>
							<div class="col-xs-10 seccionDer">
								<?php include('includes/includeNuevoLibro.php'); ?>
							</div>
						</div>
						<?php if(isset($_SESSION['mensaje'])): ?>
							<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
							<?php unset($_SESSION['mensaje']);
						endif;
						?>
					</div>
				</section>
				<footer id="footer">
					<div class="container">
						<div class="row filaFooter">
							<div class="col-xs-6 ">
								<p style="padding:0px; margin:0px">© Copyright Departamento de Informatica 2014</p>
							</div>
							<div class="col-xs-6">
								<div class="row">
									<div class="col-xs-9 col-xs-offset-3 text-right">
										<ul class="list-inline enlacesFooter" style="padding:0px; margin:0px">
											<li><a href="">Mapa del sitio</a></li> |
											<li><a href="">Accesibilidad</a></li> |
											<li><a href="">Contacto</a></li> 
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</footer>
			</div>
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="../js/bootstrap.min.js"></script>
			<script src="../js/bootstrap-hover-dropdown.min.js"></script>
		</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>