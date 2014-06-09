<?php
	//Funcion que devuelve un mensaje si se intenta insertar un elemento que ya existe
	function objetosDuplicados($param){
		$mensaje;
		switch ($param){
			case 1:
				$mensaje="El usuario ya existe en el sistema";
				break;
			case 2:
				$mensaje="El libro ya existe en el sistema";
				break;
			case 3:
				$mensaje="El ejemplar ya existe en el sistema";
				break;
			default:
				$mensaje="Error de Categoria. Sin embargo el objeto ya existe en el sistema";
				break;
		}
		return $mensaje;
	}
?>