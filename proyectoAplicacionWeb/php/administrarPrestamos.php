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
				<?php include('includes/header.php'); ?>
				<section class="contenido">
					<div class="container">
						<div class="row fila">
							<h2 class="tituloSeccion">Administrar Prestamos</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked">
									<li class="active"><a href="administrarPrestamos.php?backend=categorias">Administrar Prestamos</a></li>
									<li><a href="nuevoPrestamo.php?backend=categorias">Nuevo Prestamo</a></li>
								</ul>
							</div>
							<div class="col-xs-10 seccionDer">
								<?php
									include('includes/conectar.php');
									$idConexion=conectar();
									$consulta="SELECT idUsuario,nombre FROM usuarios";
									$datos1=mysql_query($consulta,$idConexion);
									while($fila1=mysql_fetch_array($datos1)):
										$consulta="SELECT libros.tituloLibro,prestamos.* FROM libros, prestamos WHERE libros.idLibro=prestamos.idLibro AND prestamos.idUsuario=".$fila1['idUsuario']." AND estaActivo=1 ORDER BY prestamos.fechaInicio DESC";
										$datos2=mysql_query($consulta,$idConexion);

										if(mysql_num_rows($datos2)!=0):
								?>
											<table class="table table-bordered table-hover table-condensed">
												<thead>
													<th>Usuario</th>
													<th>ID. Usuario</th>
													<th>Libro</th>
													<th>Codigo Ejemplar</th>
													<th>Inicio Prestamo</th>
													<th>Comentarios</th>
													<th colspan="2">Acciones</th>
												</thead>
												<tbody>
									<?php 		while($fila2=mysql_fetch_array($datos2)): ?>
													<tr>
														<td><?php echo $fila1['nombre']; ?></td>
														<td><?php echo $fila1['idUsuario']; ?></td>
														<td><?php echo $fila2['tituloLibro']; ?></td>
														<td><?php echo $fila2['idLibro'].".".$fila2['idEjemplar']; ?></td>
														<td><?php echo $fila2['fechaInicio']; ?></td>
														<td><?php echo $fila2['comentariosPrestamos']; ?></td>
														<td>
															<a class="btn btn-info btn-sm" href="edicionPrestamo.php?idPrestamo=<?php echo $fila2['idPrestamo']; ?>&idLibro=<?php echo $fila2['idLibro']; ?>&idEjemplar=<?php echo $fila2['idEjemplar']; ?>" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
															<a class="btn btn-warning btn-sm" href="verPrestamo.php?idPrestamo=<?php echo $fila2['idPrestamo']; ?>&idLibro=<?php echo $fila2['idLibro']; ?>&idEjemplar=<?php echo $fila2['idEjemplar']; ?>" title="Ver Prestamo"><span class="glyphicon glyphicon-eye-open"></a>
														</td>
													</tr>
									<?php 		endwhile; ?>
								<?php 	endif; 
									endwhile;
								?>

												</tbody>
											</table><br/>
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