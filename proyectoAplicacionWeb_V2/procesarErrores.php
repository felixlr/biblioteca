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
			
			default:
				$mensaje="Ha ocurrido un Error pero no es conocido";
				break;
		}
		return $mensaje;
	}
?>