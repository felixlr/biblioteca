<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<!DOCTYPE html>
	<html lang="es">
		<head>
			<title>Nuevo Prestamo</title>
			<?php include('includes/estilosPagina.php'); ?>
		</head>
		<body>
			<div class="fullwidth">
				<?php include('includes/mensajeSistema.php'); ?>
				<?php include('includes/header.php'); ?>
				<section class="contenido">
					<div class="container">
						<div class="row fila">
							<h2 class="tituloSeccion">Nuevo Prestamos</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="administrarPrestamos.php?backend=categorias">Administrar Prestamos</a></li>
									<li class="active"><a href="nuevoPrestamo.php?backend=categorias">Nuevo Prestamo</a></li>
								</ul>
							</div>
							<div class="col-xs-10 seccionDer">
								<?php include('includes/includeNuevoPrestamo.php'); ?>
							</div>
						</div>
					</div>
				</section>
				<?php include('includes/footer.php'); ?>
			</div>
			<?php include('includes/scriptsBootstrap.php'); ?>
			<script type="text/javascript">
						function muestraEjemplar(str){
							var conexion;
							
							conexion=new XMLHttpRequest();					
							conexion.onreadystatechange=function()
							{
								if(conexion.readyState==4 && conexion.status==200){
									document.getElementById("ejemplar").innerHTML=conexion.responseText;
								}
							}
							conexion.open("GET","procesar/script.php?idLibro="+str,true);
							conexion.send();
						}
						function obtenUsuarios(){
							var conexion;
							
							conexion=new XMLHttpRequest();					
							conexion.onreadystatechange=function()
							{
								if(conexion.readyState==4 && conexion.status==200){
									document.getElementById("usuarios").innerHTML=conexion.responseText;
								}
							}
							conexion.open("GET","procesar/scriptUsuarios.php",true);
							conexion.send();
						}
			</script>
		</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>