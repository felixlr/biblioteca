<?php
	//Funciones para procesar los distintos fallos del sistema
	include('errorObjetosDuplicados.php');


	//Funcion que recibe 2 parametro (nº de error de mysql, categoria donde se produce el error).
	//Llama a otras funciones las cuales procesan el mensaje a devolver al usuario
	function procesarErrores($param1,$param2){
		$mensaje;
		switch($param1){
			case 1146:
				$mensaje="Ha ocurrido un error. La tabla no existe";
				break;
				
			case 1046:
				$mensaje="Ha ocurrido un error. Esta identificado";
				break;
				
			case 1062:
				$mensaje=objetosDuplicados($param2);
				break;
			
			default:
				$mensaje="Error aun no definido en la funcion";
				break;
		}
		return $mensaje;
	}
?>