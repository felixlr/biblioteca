<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Edicion Libro</title>
		</head>
		<body>
			<h1>Gestion de Libros</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Libros</p>
			<a href="administrarLibros.php">Administrar Libros</a><br/>
			<a href="nuevoLibro.php">Nuevo Libro</a><br/><br/>
			<?php
				function conectar(){
					$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
					@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
					return $id_conexion;
				}
				$id_conexion=conectar();
				$consulta="SELECT * FROM libros WHERE idLibro='".$_GET['idLibro']."'";
				$datos=mysql_query($consulta,$id_conexion);
				$fila=mysql_fetch_array($datos);
			?>
			<form action="procesarEdicionLibro.php" method="POST">
				Titulo: <input type="text" name="tituloLibro" value="<?php echo $fila['tituloLibro'] ?>">
				ISBN: <input type="text" name="ISBN" value="<?php echo $fila['ISBN'] ?>">
				Autor: <input type="text" name="autor" value="<?php echo $fila['autor'] ?>">
				Editorial: <input type="text" name="editorial" value="<?php echo $fila['editorial'] ?>">
				Edicion: <input type="text" name="edicion" value="<?php echo $fila['edicion'] ?>">
				Comentarios: <input type="text" name="comentarios" value="<?php echo $fila['comentarios'] ?>">
				<input type="submit" value="Actualizar Libro">
			</form>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
			<?php $_SESSION['idLibro']=$_GET['idLibro']; ?>
		</body>
	</html>
<?php else: ?>
	<html>
		<head>
			<meta http-equiv="Refresh" content="0;url=index.php">
		</head>
	</html>
<?php endif; ?>