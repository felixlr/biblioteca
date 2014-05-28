<?php session_start(); ?>
<?php if(isset($_SESSION['usuario']) && $_SESSION['tipoCuenta']==1): ?>
	<html>
		<head>
			<title>Finalizar Prestamo</title>
		</head>
		<body>
			<h1>Gestion de Prestamos</h1>
			<p> Bienvenido <?php echo $_SESSION['usuario']; ?>. Estas en el panel de Gestion de Prestamos</p>
			<a href="administrarPrestamos.php">Administrar Prestamos</a><br/>
			<a href="nuevoPrestamo.php">Nuevo Prestamo</a><br/><br/>
			<?php if(isset($_SESSION['mensaje'])): ?>
				<p>Mensaje: <?php echo $_SESSION['mensaje']; ?></p>
				<?php unset($_SESSION['mensaje']); ?>
			<?php endif; ?>
			<form action="procesar/procesarFinalizarPrestamo.php" method="POST">
				Dia:
				<select name="dia">
					<option value="">Elije un dia</option>
					<?php for($i=1;$i<=31;$i++):?>
						<option value="<?php if($i<10){echo "0".$i;}else {echo $i;} ?>"><?php if($i<10){echo "0".$i;}else {echo $i;} ?></option> 
					<?php endfor; ?>
				</select>
				Mes:
				<select name="mes">
					<option value="">Elije un mes</option>
					<?php for($i=1;$i<=12;$i++):?>
						<option value="<?php if($i<10){echo "0".$i;}else {echo $i;} ?>"><?php if($i<10){echo "0".$i;}else {echo $i;} ?></option>
					<?php endfor; ?>
				</select>
				Anio:
				<select name="anio">
					<option value="">Elije un anio</option>
					<?php for($i=date('Y');$i>=2000;$i--):?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
				<input type="submit" value="Finalizar Prestamo">
			</form>
			<br/><a href="cerrarSesion.php">Cerrar Sesion</a>
			<?php $_SESSION['idPrestamo']=$_GET['idPrestamo']; ?>
			<?php $_SESSION['idLibro']=$_GET['idLibro']; ?>
			<?php $_SESSION['idEjemplar']=$_GET['idEjemplar']; ?>
		</body>
	</html>
<?php else: header('Location:inicio.php'); endif; ?>