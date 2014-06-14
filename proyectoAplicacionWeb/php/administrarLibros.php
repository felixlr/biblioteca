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
							<h2 class="tituloSeccion">Administrar Libros</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked">
									<li class="active"><a href="administrarLibros.php?backend=categorias">Administrar Libros</a></li>
									<li><a href="nuevoLibro.php?backend=categorias">Nuevo Libro</a></li>
								</ul>
							</div>
							<div class="col-xs-10 seccionDer">
								<?php 
									include('includes/conectar.php');
									$idConexion=conectar();
									$consulta="SELECT * FROM libros";
									$datos=mysql_query($consulta,$idConexion);
								?>
								<table class="table table-bordered table-hover table-condensed">
									<thead>
										<th>Titulo Libro</th>
										<th>ISBN</th>
										<th>Autor</th>
										<th>Editorial</th>
										<th>Edicion</th>
										<th>Anio Publicacion</th>
										<th>Portada</th>
										<th>Comentarios</th>
										<th colspan="2">Acciones</th>
									</thead>
									<tbody>
								<?php while($fila=$fila=mysql_fetch_array($datos)): ?>
										<tr>
											<td><?php echo $fila['tituloLibro']; ?></td>
											<td><?php echo $fila['ISBN']; ?></td>
											<td><?php echo $fila['autor']; ?></td>
											<td><?php echo $fila['editorial']; ?></td>
											<td><?php echo $fila['edicion']; ?></td>
											<td><?php echo $fila['anioPublicacion']; ?></td>
											<td><img src="../img/portadaLibros/<?php echo $fila['fotoLibro']; ?>"></td>
											<td><?php echo $fila['comentariosLibros']; ?></td>
											<td>
												<a class="btn btn-info btn-sm" href="edicionLibro.php?idLibro=<?php echo $fila['idLibro']; ?>" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
												<a class="btn btn-danger btn-sm" href="procesar/procesarEliminarLibro.php?idLibro=<?php echo $fila['idLibro']; ?>" title="Eliminar"><span class="glyphicon glyphicon-trash"></a>
											</td>
										</tr>
									</tbody>
								<?php endwhile; ?>
								</table>
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