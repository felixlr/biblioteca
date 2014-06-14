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
							<h2 class="tituloSeccion">Administrar Ejemplares</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked bg">
									<li class="active"><a href="administrarEjemplares.php?backend=categorias">Administrar Ejemplares</a></li>
									<li><a href="nuevoEjemplar.php?backend=categorias">Nuevo Ejemplar</a></li>
								</ul>
							</div>
							<div class="col-xs-10 seccionDer">
								<?php
									include('includes/conectar.php');
									$idConexion=conectar();
									$consulta="SELECT idLibro,tituloLibro FROM libros ORDER BY idLibro";
									$datos1=mysql_query($consulta,$idConexion);

									while($fila1=mysql_fetch_array($datos1)):
										$consulta="SELECT * FROM ejemplares WHERE idLibro=".$fila1['idLibro']."";
										$datos2=mysql_query($consulta,$idConexion);
										if(mysql_num_rows($datos2)!=0):
								?>
									<table class="table table-bordered table-hover table-condensed">
										<thead>
											<th>Libro</th>
											<th>Cod. Ejemplar</th>
											<th>Localizacion</th>
											<th>Comentarios</th>
											<th>Acciones</th>
										</thead>
										<tbody>
									<?php 	while($fila2=mysql_fetch_array($datos2)): ?>
											<tr>
												<td><?php echo $fila1['tituloLibro']; ?></td>
												<td><?php echo $fila2['idLibro'].".".$fila2['idEjemplar']; ?></td>
												<td><?php echo $fila2['localizacion']; ?></td>
												<td><?php echo $fila2['comentariosEjemplares']; ?></td>
												<td>
													<a class="btn btn-info btn-sm" href="edicionEjemplar.php?idLibro=<?php echo $fila2['idLibro']; ?>&idEjemplar=<?php echo $fila2['idEjemplar']; ?>" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
													<a class="btn btn-danger btn-sm" href="procesar/procesarEliminarEjemplar.php?idLibro=<?php echo $fila2['idLibro']; ?>&idEjemplar=<?php echo $fila2['idEjemplar']; ?>" title="Eliminar"><span class="glyphicon glyphicon-trash"></a>
												</td>
											</tr>
									<?php 	endwhile;
										endif; ?>									
										</tbody>
									</table><br/>
								<?php endwhile; ?>
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