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
							<h2 class="tituloSeccion">Historial de Prestamos</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked">
									<li class="active"><a href="administrarHistorial.php?backend=categorias">Historial de Prestamos</a></li>
									<li><a href="administrarPrestamos.php?backend=categorias">Administrar Prestamos</a></li>
								</ul>
							</div>
							<div class="col-xs-10 seccionDer">
							<?php
								include('includes/conectar.php');
								$idConexion=conectar();

								//Obtengo los usuarios que hay en el historial
								$consulta="SELECT DISTINCT idUsuario FROM historialprestamos";
								$datos1=mysql_query($consulta,$idConexion);
								if(mysql_num_rows($datos1)!=0):
									while($fila1=mysql_fetch_array($datos1)):
										//Obtengo el historial de prestamos de cada Usuario de la tabla historialPrestamos
										$consulta="SELECT * FROM historialprestamos WHERE idUsuario='".$fila1['idUsuario']."' ORDER BY fechaFin DESC";
										$datos2=mysql_query($consulta,$idConexion);
							?>
								<table class="table table-bordered table-hover table-condensed">
									<thead>
										<th>Usuario</th>
										<th>Id.</th>
										<th>Libro</th>
										<th>Cod. Ejemplar</th>
										<th>Inicio Prestamo</th>
										<th>Fin Prestamo</th>
										<th>Comentarios</th>
										<th>Accion</th>
									</thead>
									<tbody>
									<?php while($fila2=mysql_fetch_array($datos2)): ?>
										<tr>
											<td><?php echo $fila2['nombre']; ?></td>
											<td><?php echo $fila2['idUsuario']; ?></td>
											<td><?php echo $fila2['tituloLibro']; ?></td>
											<td><?php echo $fila2['idLibro'].".".$fila2['idEjemplar']; ?></td>
											<td><?php echo $fila2['fechaInicio']; ?></td>
											<td><?php echo $fila2['fechaFin']; ?></td>
											<td><?php echo $fila2['comentariosHistorial']; ?></td>
											<td><a class="btn btn-danger btn-sm" href="procesar/procesarEliminarPrestamo.php?idHistorial=<?php echo $fila2['idHistorial']; ?>" title="Eliminar"><span class="glyphicon glyphicon-trash"></a>
										</tr>
									<?php endwhile; ?>
									</tbody>
								</table><br/>
								<?php endwhile;
								else:
									echo '<p>No hay historial</p>';								
								endif; ?>
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