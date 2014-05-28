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
	
	echo '
		<option value="'.$fila1['nombreTipoCuenta'].'">'.$fila1['descripcionTipoCuenta'].'</option>
	';
	
	$consulta2="SELECT * FROM tipocuenta";
	$datos2=mysql_query($consulta2,$id_conexion);
	$fila2=mysql_fetch_array($datos2);
	
	while($fila2){
		if($fila1['tipoCuenta']!=$fila2['nombreTipoCuenta']){
			echo '
				<option value="'.$fila2['nombreTipoCuenta'].'">'.$fila2['descripcionTipoCuenta'].'</option>
			';
		}
		$fila2=mysql_fetch_array($datos2);
	}
?>