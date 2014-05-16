<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Edicion Ejemplar</title>
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
				$consulta="SELECT * FROM ejemplares WHERE idLibro='".$_GET['idLibro']."' AND num='".$_GET['num']."'";
				$datos=mysql_query($consulta,$id_conexion);
				$fila=mysql_fetch_array($datos);
			?>
			<?php if(isset($_SESSION['mensaje'])): ?>				
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']); ?>
			<?php endif; ?>
			<form action="procesarEdicionEjemplar.php" method="POST">
				Id. Libro: <input type="text" name="idLibro" value="<?php echo $fila['idLibro'] ?>">
				Num. Ejemplar: <input type="text" name="num" value="<?php echo $fila['num'] ?>">
				Localizacion: <input type="text" name="localizacion" value="<?php echo $fila['localizacion'] ?>">
				Comentarios: <input type="text" name="comentarios" value="<?php echo $fila['comentarios'] ?>">
				<input type="submit" value="Actualizar Ejemplar">
			</form>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
			<?php $_SESSION['idLibro']=$_GET['idLibro']; ?>
			<?php $_SESSION['num']=$_GET['num']; ?>
		</body>
	</html>
<?php else: ?>
	<?php header('Location:index.php'); ?>
<?php endif; ?>