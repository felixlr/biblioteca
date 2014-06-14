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
							<h2 class="tituloSeccion">Administrar Usuarios</h2>
						</div>
						<div class="row">
							<div class="col-xs-2 seccionIzq">
								<ul class="nav nav-pills nav-stacked">
									<li class="active"><a href="administrarUsuarios.php?backend=categorias">Administrar Usuarios</a></li>
									<li><a href="nuevoUsuario.php?backend=categorias">Nuevo Usuario</a></li>
								</ul>
							</div>
							<div class="col-xs-10 seccionDer">
								<?php
									include("includes/conectar.php");
									$idConexion=conectar();
									$consulta="SELECT * FROM usuarios,tipocuenta WHERE idCuenta=idTipoCuenta";
									$datos=mysql_query($consulta,$idConexion);
								?>
								<table class="table table-bordered table-hover table-condensed">
									<thead>
										<th>Nombre</th>
										<th>DNI</th>
										<th>Tipo de Cuenta</th>
										<th>Teléfono</th>
										<th>Móvil</th>
										<th>Correo Electrónico</th>
										<th>Año</th>
										<th>Acciones</th>
									</thead>
								<?php while($fila=mysql_fetch_array($datos)): ?>
									<tbody>
										<tr>
											<td><?php echo $fila['nombre']; ?></td>
											<td><?php echo $fila['dni']; ?></td>
											<td><?php echo $fila['descripcionCuenta']; ?></td>
											<td><?php echo $fila['telefono']; ?></td>
											<td><?php echo $fila['movil']; ?></td>
											<td><?php echo $fila['email']; ?></td>
											<td><?php echo $fila['anio']; ?></td>
											<td>
												<a class="btn btn-info btn-sm" role="button" href="edicionUsuario.php?idUsuario=<?php echo $fila['idUsuario']; ?>" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
												<a class="btn btn-danger btn-sm" role="button" href="procesar/procesarEliminarUsuario.php?idUsuario=<?php echo $fila['idUsuario']; ?>" title="Eliminar"><span class="glyphicon glyphicon-trash"></a>
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