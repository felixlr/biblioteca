<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Gestion de Historial</title>
		</head>
		<body>
			<h1>Administrar historial de prestamos</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Administracion del historial de prestamos</p>
			<a href="administrarHistorial.php">Administrar Historial</a><br/>
			<a href="administrarPrestamos.php">Administrar Prestamos</a><br/>
			<a href="panelControl.php">Ir a Panel de Control</a><br/><br/>
			<?php 
				function conectar(){
					$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
					@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
					return $id_conexion;
				}
				$id_conexion=conectar();
				//Obtengo los usuarios que hay en el historial
				$consulta="SELECT DISTINCT idUsuario FROM historialprestamos";
				$datos1=mysql_query($consulta,$id_conexion);
			?>
			<?php if(isset($_SESSION['mensaje'])): ?>
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']); ?>
			<?php endif;?>
			<?php if(mysql_num_rows($datos1)!=0): ?>
				<?php 
					$fila1=mysql_fetch_array($datos1);
					while($fila1):
					
					//Obtengo el historial de prestamos de cada Usuario de la tabla historialPrestamos
					$consulta="SELECT * FROM historialprestamos WHERE idUsuario='".$fila1['idUsuario']."' ORDER BY fechaFin DESC";
					$datos2=mysql_query($consulta,$id_conexion);
				?>
					<table border=1px width=80% rules="rows">
					<thead>
						<th>Usuario</th>
						<th>ID. Usuario</th>
						<th>Libro</th>
						<th>Codigo Ejemplar</th>
						<th>Fecha Inicio Prestamo</th>
						<th>Fecha Fin Prestamo</th>
						<th>Comentarios</th>
						<th>Accion</th>
					</thead>
					<?php
						$fila2=mysql_fetch_array($datos2);
						while($fila2):
					?>			
						<tbody align="center">
							<tr>
								<td><?php echo $fila2['nombre']; ?></td>
								<td><?php echo $fila2['idUsuario']; ?></td>
								<td><?php echo $fila2['tituloLibro']; ?></td>
								<td><?php echo $fila2['idLibro'].".".$fila2['idEjemplar']; ?></td>									
								<td><?php echo $fila2['fechaInicio']; ?></td>
								<td><?php echo $fila2['fechaFin']; ?></td>
								<td><?php echo $fila2['comentarios']; ?></td>
								<td><a href="procesarEliminarPrestamo.php?idHistorial=<?php echo $fila2['idHistorial']; ?>">Eliminar del historial</a></td>
							</tr>
						</tbody>
						<?php $fila2=mysql_fetch_array($datos2); ?>
					<?php endwhile; ?>
				</table><br/>
					<?php $fila1=mysql_fetch_array($datos1); ?>
				<?php endwhile; ?>
			<?php else: ?>
				<p>No hay historial</p>
			<?php endif; ?>
			
			<a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else:
	header('Location:index.php');
 endif; ?>