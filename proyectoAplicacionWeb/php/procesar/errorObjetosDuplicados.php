<?php
	//Funcion que devuelve un mensaje si se intenta insertar un usuario que ya existe
	function objetosDuplicados($param){
		switch ($param){
			case 1:
				return "El usuario ya existe en el sistema";
				break;
			case 2:
				return "El libro ya existe en el sistema";
				break;
			case 3:
				return "El ejemplar ya existe en el sistema";
				break;
			default:
				return "Error de Categoria. Sin embargo el objeto ya existe en el sistema";
				break;
		}
	}
?>