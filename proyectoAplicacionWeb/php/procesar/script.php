<?php
	include('../includes/conectar.php');
	$id_conexion=conectar();
	$consulta="SELECT * FROM ejemplares WHERE idLibro='".$_GET['idLibro']."' AND estaPrestado=0";
	$datos=mysql_query($consulta,$id_conexion);
	
	echo '<option>Elija un ejemplar</option>';
	while($fila=mysql_fetch_array($datos)){
		echo'
			<option value="'.$fila['idEjemplar'].'">'.$fila['idEjemplar'].'</option>
		';
	}
?>