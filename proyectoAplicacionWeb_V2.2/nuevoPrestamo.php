<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']=="A"): ?>
	<html>
		<head>
			<title>Gestion de Ejemplares</title>
			<script type="text/javascript">
				function muestraEjemplar(str){
					var conexion;
					
					conexion=new XMLHttpRequest();					
					conexion.onreadystatechange=function()
					{
						if(conexion.readyState==4 && conexion.status==200){
							document.getElementById("ejemplar").innerHTML=conexion.responseText;
						}
					}
					conexion.open("GET","script.php?idLibro="+str,true);
					conexion.send();
				}
				
				function obtenUsuarios(){
					var conexion;
					
					conexion=new XMLHttpRequest();					
					conexion.onreadystatechange=function()
					{
						if(conexion.readyState==4 && conexion.status==200){
							document.getElementById("usuarios").innerHTML=conexion.responseText;
						}
					}
					conexion.open("GET","scriptUsuarios.php",true);
					conexion.send();
				}
			</script>
		</head>
		<body>
			<h1>Gestion de Ejemplares</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Prestamos</p>
			<a href="administrarPrestamos.php">Administrar Prestamos</a><br/>
			<a href="nuevoPrestamo.php">Nuevo Prestamo</a><br/><br/>
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
				$consulta="SELECT idLibro, tituloLibro FROM libros";
				$datos=mysql_query($consulta,$id_conexion);
			?>			
			<form action="" method="POST">
				Libro:
					<select name="idLibro" onchange="muestraEjemplar(this.value), obtenUsuarios()" >
						<option>Elija un libro</option>
						<?php $fila=mysql_fetch_array($datos); ?>
						<?php while ($fila):?>
							<option value="<?php echo $fila['idLibro']; ?>"><?php echo $fila['tituloLibro']; ?></option>
							<?php $fila=mysql_fetch_array($datos); ?>
						<?php endwhile; ?>
					</select>
				Ejemplar:
					<select name="idEjemplar" id="ejemplar">
						<option>Elija un ejemplar</option>
					</select>
				<?php 
					$consulta="SELECT idUsuario, nombre FROM usuarios";
					$datos=mysql_query($consulta,$id_conexion);
				?>
				Usuario:
				<select name="idUsuario" id="usuarios">
						<option>Elija un Usuario</option>
				</select>
			</form>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
		</body>
	</html>
<?php else: ?>
	<html>
		<head>
			<meta http-equiv="Refresh" content="0;url=index.php">
		</head>
	</html>
<?php endif; ?>