<?php
	$id_conexion=mysql_connect();
	if($id_conexion==FALSE)
		echo "error al conectar";
	else echo "Conectado";
	
	//echo gettype($id_conexion);
	
	// mysql_select_db("test",$id_conexion);
	// $consulta="select nombre, clave	from usuarios";
	// $datos=mysql_query($consulta,$id_conexion);
	// $encontrado=FALSE;
	
	// $fila=mysql_fetch_array($datos);
	// while($fila!="" && !$encontrado){
		// if($fila['nombre']==$_POST['usuario'] && $fila['clave']==$_POST['clave']){
			// $encontrado=TRUE;
		// }
		// $fila=mysql_fetch_array($datos);
	// }
	// if($encontrado){
		// echo "Has ingresado";
	// }
	// else echo "Usuario o contrasenia invalidos";
?>