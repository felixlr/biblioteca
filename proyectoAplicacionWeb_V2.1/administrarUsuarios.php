<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Administrar Usuarios</title>
		</head>
		<body>
			<h1>Gestion de Usuarios</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Usuarios</p>
			<a href="administrarUsuarios.php">Administrar Usuarios</a><br/>
			<a href="nuevoUsuario.php">Nuevo Usuario</a><br/><br/>
			
			<?php 
				function conectar(){
					$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
					@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
					return $id_conexion;
				}
				$id_conexion=conectar();
				$consulta="SELECT * FROM usuarios";
				$datos=mysql_query($consulta,$id_conexion);
			?>
			<?php if(isset($_SESSION['mensaje'])): ?>
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']); ?>
			<?php endif;?>
			<table border=1px width=80% rules="rows">
				<thead>
						<th>Nombre</th>
						<th>Clave</th>
						<th>Tipo de Cuenta</th>
						<th colspan="2">Acciones</th>
				</thead>
				<tbody align="center">
					<?php $fila=mysql_fetch_array($datos); ?>
						<?php while($fila): ?>					
							<tr>
								<td><?php echo $fila['nombre']; ?></td>
								<td><?php echo $fila['clave']; ?></td>
								<td><?php echo $fila['tipoCuenta']; ?></td>
								<td><a href="edicionUsuario.php?idUsuario=<?php echo $fila['idUsuario']; ?>">Editar Usuario</a></td>
								<td><a href="procesarEliminarUsuario.php?idUsuario=<?php echo $fila['idUsuario']; ?>">Eliminar Usuario</a></td>
							</tr>
						<?php $fila=mysql_fetch_array($datos); ?>
					<?php endwhile; ?>
				</tbody>
			</table>
			<?php
				// //Nueva Consulta para obtener tipos de Cuenta
				// $consulta="SELECT nombreTipoCuenta, descripcionTipoCuenta FROM tipocuenta";
				// $_SESSION['tiposDeCuenta']=mysql_query($consulta,$id_conexion);
				// echo gettype($_SESSION['tiposDeCuenta']);
			?>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: ?>
	<html>
		<head>
			<meta http-equiv="Refresh" content="0; url=index.php">
		</head>
	</html>
<?php endif; ?>