<?php
	function conectar(){
		$id_conexion=@mysql_connect() or die("No se pudo establecer la conexion al servidor");
		@mysql_select_db("test",$id_conexion) or die("La BBDD no existe");
		return $id_conexion;
	}
	
	$id_conexion=conectar();
	$consulta="SELECT * FROM ejemplares WHERE idLibro='".$_GET['idLibro']."' AND libroPrestado=0";
	$datos=mysql_query($consulta,$id_conexion);
	
	echo '<option>Elija un ejemplar</option>';
	$fila=mysql_fetch_array($datos);
	while($fila){
		echo'
			<option value="'.$fila['idEjemplar'].'">'.$fila['idEjemplar'].'</option>
		';
		$fila=mysql_fetch_array($datos);
	}
?>