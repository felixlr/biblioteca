<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Inicio</title>
		</head>
		<body>
			<h1>Gestion de Usuarios</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Usuarios</p>
			<a href="administrarUsuarios.php">Administrar Usuarios</a><br/>
			<a href="nuevoUsuario.php">Nuevo Usuario</a><br/><br/>
			<?php if(isset($_SESSION['mensaje'])): ?>				
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']); ?>
			<?php endif; ?>
			<?php 
				function conectar(){
					$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
					@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
					return $id_conexion;
				}
				$id_conexion=conectar();
				$consulta="SELECT nombreTipoCuenta, descripcionTipoCuenta FROM tipocuenta";
				$datos=mysql_query($consulta,$id_conexion);
			?>
			<form action="procesarNuevoUsuario.php" method="POST">
				Usuario: <input type="text" name="usuario">
				Clave: <input type="password" name="clave">
				Repita la Clave: <input type="password" name="claveConf">
				Tipo de Cuenta:
					<select name="tipoDeCuenta">
						<?php $fila=mysql_fetch_array($datos); ?>
						<?php while ($fila!=""):?>						
							<option value="<?php echo $fila['nombreTipoCuenta']; ?>" <?php if($fila['descripcionTipoCuenta']=="Profesor"){ echo "SELECTED";} ?>><?php echo $fila['descripcionTipoCuenta']; ?></option>
							<?php $fila=mysql_fetch_array($datos); ?>
						<?php endwhile; ?>
					</select>
				<input type="submit" value="Insertar Usuario">
			</form>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: ?>
	<?php header('Location:index.php'); ?>
<?php endif; ?>