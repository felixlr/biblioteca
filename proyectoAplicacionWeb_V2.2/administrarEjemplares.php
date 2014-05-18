<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Administrar Ejemplares</title>
		</head>
		<body>
			<h1>Gestion de Ejemplares</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Ejemplares</p>
			<a href="administrarEjemplares.php">Administrar Ejemplares</a><br/>
			<a href="nuevoEjemplar.php">Nuevo Ejemplar</a><br/><br/>
			
			<?php
				function conectar(){
					$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
					@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
					return $id_conexion;
				}
				$id_conexion=conectar();
				
				$consulta1="SELECT idLibro,tituloLibro FROM libros";
				$datos1=mysql_query($consulta1,$id_conexion);
				
			?>
			<?php if(isset($_SESSION['mensaje'])): ?>
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']); ?>
			<?php endif;?>
								
			<?php
				$fila1=mysql_fetch_array($datos1);
				while($fila1):
				
				$consulta2="SELECT * FROM ejemplares WHERE idLibro='".$fila1['idLibro']."'";
				$datos2=mysql_query($consulta2,$id_conexion);
			?>
			<?php if(mysql_num_rows($datos2)!=0): ?>
				<table border=1px width=80% rules="rows">
					<caption align="top"><?php echo $fila1['tituloLibro'] ?></caption>
					<thead>
							<th>Codigo Ejemplar</th>
							<th>Localizacion</th>
							<th>Comentarios</th>
							<th colspan="2">Acciones</th>
					</thead>
					<tbody align="center">
						<?php $fila2=mysql_fetch_array($datos2); ?>
							<?php while($fila2!=""): ?>
								<tr>
									<td><?php echo $fila2['idLibro'].".".$fila2['idEjemplar']; ?></td>
									<td><?php echo $fila2['localizacion']; ?></td>
									<td><?php echo $fila2['comentarios']; ?></td>
									<td><a href="edicionEjemplar.php?idLibro=<?php echo $fila2['idLibro']; ?>&idEjemplar=<?php echo $fila2['idEjemplar']; ?>">Editar Ejemplar</a></td>
									<td><a href="procesarEliminarEjemplar.php?idLibro=<?php echo $fila2['idLibro']; ?>&idEjemplar=<?php echo $fila2['idEjemplar']; ?>">Eliminar Ejemplar</a></td>
								</tr>
							<?php $fila2=mysql_fetch_array($datos2); ?>
						<?php endwhile; ?>
					</tbody>
				</table>
				<br/>
			<?php endif; ?>				
				<?php $fila1=mysql_fetch_array($datos1); ?>
			<?php endwhile; ?>
			<a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: ?>
	<html>
		<head>
			<meta http-equiv="Refresh" content="0; url=index.php">
		</head>
	</html>
<?php endif; ?>