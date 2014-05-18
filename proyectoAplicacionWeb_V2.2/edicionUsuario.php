<?php session_start(); ?>
<?php $_SESSION['idUsuario']=$_GET['idUsuario']; ?>
<html>
	<head>
		<title>Editar Usuario</title>
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
			$consulta="SELECT * FROM usuarios WHERE idUsuario=".$_GET['idUsuario']."";
			$datos=mysql_query($consulta,$id_conexion);
			$fila=mysql_fetch_array($datos);
		?>
		<?php if(isset($_SESSION['mensaje'])): ?>				
			<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
			<?php unset($_SESSION['mensaje']); ?>
		<?php endif; ?>
		<form action="procesarEdicionUsuario.php" method="POST">
			Nombre: <input type="text" value="<?php echo $fila['nombre']; ?>" name="nombre">			
			Tipo de Cuenta: <input type="text" value="<?php echo $fila['tipoCuenta']; ?>" name="tipoCuenta">
			<input type="submit" value="Actualizar Usuario">			
		</form>
		<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
	</body>
</html>	
