<?php
	function procesarErrores($parametro){
		$mensaje;
		switch($parametro){
			case 1146:
				$mensaje="Ha ocurrido un error. La tabla no existe";
				break;
				
			case 1046:
				$mensaje="Ha ocurrido un error. Esta identificado";
				break;
				
			case 1062:
				$mensaje="Error al insertar. El elemento ya existe en la tabla.";
				break;
			
			default:
				$mensaje="Ha ocurrido un Error pero no es conocido";
				break;
		}
		return $mensaje;
	}
?>