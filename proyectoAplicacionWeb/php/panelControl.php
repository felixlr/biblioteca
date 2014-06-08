<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<title>Panel de Control</title>
		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/style.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="fullwidth">
			<div class="barraDecorativa"></div>
			<header class="header">
				<div class="container">
					<div class="row">
						<div class="col-xs-6">
							<a href="panelControl.php"><img src="../img/logo.png" alt="Logo" class="logo"></a>
						</div>
						<div class="col-xs-6">
							<div class="dropdown botonMenuDer rowHeader">
								<button style="width:100%;" class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
									<span class="glyphicon glyphicon-user"></span> Administrador
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu " role="menu" aria-labelledby="dropdownMenu1">
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Perfil</a></li>
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Enlace Prueba</a></li>								
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Front-End</a></li>								
									<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Cerrar Sesión</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="linea"></div>
			<section class="contenido">
				<div class="container">
					<div class="row fila">
						<h2 class="tituloSeccion">Panel de Control</h2>
					</div>
					<div class="row fila">
						<div class="col-xs-4">
							<div class="categoriasPanel">
								<div class="barraDecorativaCategoria"></div>
								<br/>
								<a href="administrarUsuarios.php"><img src="../img/panelAdministracion/administrarUsuarios.png" alt="Usuarios">
								<p class="tituloBotonCategoria">Administrar Usuarios</p></a>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="categoriasPanel">
								<div class="barraDecorativaCategoria"></div>
								<br/>
								<a href="administrarLibros.php"><img src="../img/panelAdministracion/administrarLibros.png" alt="Libros">
								<p class="tituloBotonCategoria">Administrar Libros</p></a>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="categoriasPanel">
								<div class="barraDecorativaCategoria"></div>
								<br/>
								<a href="administrarEjemplares.php"><img src="../img/panelAdministracion/administrarEjemplares.png" alt="Ejemplares">
								<p class="tituloBotonCategoria">Administrar Ejemplares</p></a>
							</div>
						</div>
					</div>
					<div class="row fila">
						<div class="col-xs-4 col-xs-offset-2">
							<div class="categoriasPanel">
								<div class="barraDecorativaCategoria"></div>
								<br/>
								<a href="administrarPrestamos.php"><img src="../img/panelAdministracion/administrarPrestamos.png" alt="Prestamos">
								<p class="tituloBotonCategoria">Administrar Prestamos</p></a>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="categoriasPanel">
								<div class="barraDecorativaCategoria"></div>
								<br/>
								<a href="administrarHistorial.php"><img src="../img/panelAdministracion/administrarHistorial4.png" alt="Historial">
								<p class="tituloBotonCategoria">Historial</p></a>
							</div>
						</div>
					</div>
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
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../js/bootstrap.min.js"></script>
	</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>