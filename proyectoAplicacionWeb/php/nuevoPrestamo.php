<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<html>
		<head>
			<title>Gestion de Prestamos</title>
		</head>
		<body>
			<h1>Gestion de Prestamos</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Prestamos</p>
			<a href="administrarPrestamos.php">Administrar Prestamos</a><br/>
			<a href="nuevoPrestamo.php">Nuevo Prestamo</a><br/><br/>
			<?php if(isset($_SESSION['mensaje'])): ?>				
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']);
				endif;

				include('includes/includeNuevoPrestamo.php');

			?>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
			
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
					conexion.open("GET","procesar/script.php?idLibro="+str,true);
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
					conexion.open("GET","procesar/scriptUsuarios.php",true);
					conexion.send();
				}
			</script>
		</body>
	</html>
<?php else: header('inicio.php'); endif; ?>