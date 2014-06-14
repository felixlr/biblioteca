<?php
	session_start();
	if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<!DOCTYPE html>
	<html lang="es">
		<head>			
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
								<div class="row">
									<div class="col-xs-12">
										<?php
											include('includes/conectar.php');
											$idConexion=conectar();
											$consulta="SELECT * FROM prestamos WHERE idPrestamo=".$_GET['idPrestamo']."";
											$datos1=mysql_query($consulta,$idConexion);
											$fila1=mysql_fetch_array($datos1);

											//Obtencion de los datos del Usuario
											$consulta="SELECT * FROM usuarios WHERE idUsuario=".$fila1['idUsuario']."";
											$datos2=mysql_query($consulta,$idConexion);
											$fila2=mysql_fetch_array($datos2);

											//Obtencion de la descripcion de Tipo Cuenta
											$consulta="SELECT * FROM tipocuenta WHERE idCuenta=".$fila2['idTipoCuenta']."";
											$datos3=mysql_query($consulta,$idConexion);
											$fila3=mysql_fetch_array($datos3);
										?>
										<p><strong>Usuario</strong></p>
										<table class="table table-bordered table-hover table-condensed">
											<thead>
												<th>Nombre</th>
												<th>DNI</th>
												<th>Telefono</th>
												<th>Movil</th>
												<th>E-mail</th>
												<th>Tipo Cuenta</th>
												<th>Año</th>
											</thead>
											<tbody>
												<tr>
													<td><?php echo $fila2['nombre']; ?></td>
													<td><?php echo $fila2['dni']; ?></td>
													<td><?php echo $fila2['telefono']; ?></td>
													<td><?php echo $fila2['movil']; ?></td>
													<td><?php echo $fila2['email']; ?></td>
													<td><?php echo $fila3['descripcionCuenta']; ?></td>
													<td><?php echo $fila2['anio']; ?></td>
												</tr>
											</tbody>
										</table>
										<?php
											//Obtencion de los datos del Libro
											$consulta="SELECT * FROM libros WHERE idLibro=".$_GET['idLibro']."";
											$datos3=mysql_query($consulta,$idConexion);
											$fila3=mysql_fetch_array($datos3);
										?>										
										<p><strong>Libro</strong></p>
										<table class="table table-bordered table-hover table-condensed">
											<thead>
												<th>Libro</th>
												<th>ISBN</th>
												<th>Autor</th>
												<th>Editorial</th>
												<th>Edicion</th>
												<th>Año Publicación</th>
											</thead>
											<tbody>
												<tr>
													<td><?php echo $fila3['tituloLibro']; ?></td>
													<td><?php echo $fila3['ISBN']; ?></td>
													<td><?php echo $fila3['autor']; ?></td>
													<td><?php echo $fila3['editorial']; ?></td>
													<td><?php echo $fila3['edicion']; ?></td>
													<td><?php echo $fila3['anioPublicacion']; ?></td>
												</tr>
											</tbody>
										</table>
										<p><strong>Prestamo</strong></p>
										<table class="table table-bordered table-hover table-condensed">
											<thead>
												<th>Libro</th>
												<th>Cod. Ejemplar</th>
												<th>Fecha Inicio</th>
												<th>Estado</th>
											</thead>
											<tbody>
												<tr>
													<td><?php echo $fila3['tituloLibro']; ?></td>
													<td><?php echo $fila1['idLibro'].".".$fila1['idEjemplar']; ?></td>
													<td><?php echo $fila1['fechaInicio']; ?></td>
													<td><?php echo $fila1['estaActivo']; ?></td>
												</tr>												
											</tbody>
										</table>
										<p><strong>Comentarios</strong></p>
										<table class="table table-bordered table-hover table-condensed">
											<tbody>
												<tr>
													<td style="text-align:left;"><?php echo $fila1['comentariosPrestamos']; ?></td>
												</tr>
											</tbody>
										</table>
										<button id="mostrar" type="button" class="btn btn-warning" style="float:right;">Finalizar Prestamo</button>
										<a class="btn btn-default" href="administrarPrestamos.php?backend=categorias" style="float:right; margin-right:10px;">Volver</a>
										<div id="finalizar" style="display:none;">
											<form class="form-horizontal" role="form">
												<div class="form-group">														
													<label for="calendario" class="col-xs-4 control-label">Finalizar prestamo:</label>
													<div class="col-xs-3">
														<input type="text" class="form-control" id="calendario" value="<?php echo date('d-m-Y'); ?>">															
													</div>
												</div>
												<div class="form-group">
													<div class="col-xs-7">
														<a href="procesar/procesarFinalizarPrestamo.php" class="btn btn-warning" style="float:right">Confirmar</a>
														<button id="ocultar" type="button" class="btn btn-default" style="float:right; margin-right:10px;">Cancelar</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
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