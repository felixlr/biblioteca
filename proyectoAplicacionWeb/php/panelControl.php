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
			<?php include('includes/header.php'); ?>
			<section class="contenido">
				<div class="container">
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<div class="row fila">
								<div class="col-xs-12">
									<h2 class="tituloSeccion">Panel de Control</h2>
								</div>
							</div>
							<div class="row fila">
								<div class="col-xs-4">
									<a href="administrarUsuarios.php?backend=categorias">
										<div class="categoriasPanel">
											<div class="barraDecorativaCategoria"></div>
											<br/>
											<img src="../img/panelAdministracion/administrarUsuarios.png" alt="Usuarios">
											<p class="tituloBotonCategoria">Administrar Usuarios</p>
										</div>
									</a>
								</div>
								<div class="col-xs-4">
									<a href="administrarLibros.php?backend=categorias">
										<div class="categoriasPanel">
											<div class="barraDecorativaCategoria"></div>
											<br/>
											<img src="../img/panelAdministracion/administrarLibros.png" alt="Libros">
											<p class="tituloBotonCategoria">Administrar Libros</p>
										</div>
									</a>
								</div>
								<div class="col-xs-4">
									<a href="administrarEjemplares.php?backend=categorias">
										<div class="categoriasPanel">
											<div class="barraDecorativaCategoria"></div>
											<br/>
											<img src="../img/panelAdministracion/administrarEjemplares.png" alt="Ejemplares">
											<p class="tituloBotonCategoria">Administrar Ejemplares</p>
										</div>
									</a>
								</div>
							</div>
							<div class="row fila">
								<div class="col-xs-4">
									<a href="administrarPrestamos.php?backend=categorias">
										<div class="categoriasPanel">
											<div class="barraDecorativaCategoria"></div>
											<br/>
											<img src="../img/panelAdministracion/administrarPrestamos.png" alt="Prestamos">
											<p class="tituloBotonCategoria">Administrar Prestamos</p>
										</div>
									</a>
								</div>
								<div class="col-xs-4">
									<a href="administrarHistorial.php?backend=categorias">
										<div class="categoriasPanel">
											<div class="barraDecorativaCategoria"></div>
											<br/>
											<img src="../img/panelAdministracion/administrarHistorial4.png" alt="Historial">
											<p class="tituloBotonCategoria">Historial</p>
										</div>
									</a>
								</div>
								<div class="col-xs-4">
									<a href="administrarPrestamos.php?backend=categorias">
										<div class="categoriasPanel">
											<div class="barraDecorativaCategoria"></div>
											<br/>
											<img src="../img/panelAdministracion/administrarMensajes.png" alt="Prestamos">
											<p class="tituloBotonCategoria">Mensajes</p>
										</div>
									</a>
								</div>
							</div>
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