<?php session_start(); ?>
<?php $_SESSION['idUsuario']=$_GET['idUsuario']; ?>
<html>
	<head>
		<title>Editar Usuario</title>
		<script>
			function muestraTipoCuenta(){
					var conexion;
					
					conexion=new XMLHttpRequest();					
					conexion.onreadystatechange=function()
					{
						if(conexion.readyState==4 && conexion.status==200){
							document.getElementById("cuentaUsuario").innerHTML=conexion.responseText;
						}
					}
					conexion.open("GET","scriptCuenta.php",true);
					conexion.send();
				}
		</script>
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
			$consulta1="SELECT * FROM usuarios,tipocuenta WHERE idUsuario=".$_GET['idUsuario']." AND usuarios.tipoCuenta=tipocuenta.nombreTipoCuenta";
			$datos1=mysql_query($consulta1,$id_conexion);
			
			$fila1=mysql_fetch_array($datos1);
		?>
		<?php if(isset($_SESSION['mensaje'])): ?>				
			<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
			<?php unset($_SESSION['mensaje']); ?>
		<?php endif; ?>
		<form action="procesarEdicionUsuario.php" method="POST">
			Nombre: <input type="text" value="<?php echo $fila1['nombre']; ?>" name="nombre">			
			Tipo de Cuenta:
				<select name="tipoDeCuenta">
					<?php
						$consulta2="SELECT * FROM tipocuenta";
						$datos2=mysql_query($consulta2,$id_conexion);
						$fila2=mysql_fetch_array($datos2);
						while($fila2):
					?>
					<option value="<?php echo $fila2['nombreTipoCuenta']; ?>" <?php if($fila1['tipoCuenta']==$fila2['nombreTipoCuenta']){echo "SELECTED";} ?>><?php echo $fila2['descripcionTipoCuenta']; ?></option>
						<?php $fila2=mysql_fetch_array($datos2);?>
					<?php endwhile; ?>
				</select>
			<input type="submit" value="Actualizar Usuario">			
		</form>
		<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
	</body>
</html>	
