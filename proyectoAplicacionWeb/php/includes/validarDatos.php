<?php

//Comun a Usuarios, Libro => Autores, 
	function validarCampoLetras($param){
		$patron="/^([a-zA-Záéíóúñ]{1,}[\s]{0,1})+$/";
		if(preg_match($patron, $param)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

//INICIO validar informacion relativa a los Usuarios

	function validarDNI($param){
		$patron="/^[0-9]{8}+[a-zA-Z]{1}$/";

		if(preg_match($patron, $param)){
			$letra='TRWAGMYFPDXBNJZSQVHLCKET';
			$digitos=preg_split("/[a-zA-Z]/",$param);
			if($param[strlen($param)-1]==$letra[$digitos[0]%23]){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
	}

	function validarContrasenia($param1,$param2){
		if($param1==$param2){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function validarCorreo($param){
		$patron="/^[a-zA-Z0-9-_.]{3,}+[@]+[a-zA-Z0-9]{2,}+[.]+[a-zA-Z]{2,4}$/";
		if($param==""){
			return TRUE;
		}
		else{
			if(preg_match($patron, $param)){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	}

	function validarTelefonoMovil($param){
		$patron="/^[0-9]{9}$/";
		if($param==""){
			return TRUE;
		}
		else{
			if(preg_match($patron, $param)){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	}

	function validarAnio($param){
		$patron="/^[0-9]{4}$/";
		if($param==""){
			return TRUE;
		}
		else{
			if($param<=date('Y')){
				if(preg_match($patron, $param)){
					return TRUE;
				}
				else{
					return FALSE;
				}
			}	
			else{
				return FALSE;
			}
		}
	}

//FIN validar informacion relativa a los Usuarios

// INICIO validar informacion relativa a los libros

	function validarTitulo($param){
		$patron="/^([a-zA-Z]{3,}[\s]{0,1})+$/";
		if(preg_match($patron, $param)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function validarISBN($param){
		$patron="/^[0-9]{10,13}$/";
		if(preg_match($patron, $param)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function validarEditorialEdicion($param){
		$patron="/^[a-zA-Z]{2,}$/";
		if($param==""){
			return TRUE;
		}
		else {
			if(preg_match($patron, $param)){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	}

	// function validarISBN($param){
	// 	$patron="/^[0-9]{10,13}$/";
	// 	if(preg_match($patron, $param)){
	// 		return TRUE;
	// 	}
	// 	else{
	// 		return FALSE;
	// 	}
	// }

// FIN validar informacion relativa a los libros

// INICIO validar informacion relativa a los ejemplares

	function validarIdEjemplar($param){
		$patron="/^[0-9]{1,}$/";
		if(preg_match($patron, $param)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	// function validarLocalizacion($param){
	// 	$patron="/^[a-zA-Záéíóúñ]$/";
	// 	if($param==""){
	// 		return TRUE;
	// 	}
	// 	else{
	// 		if(preg_match($patron, $param)){
	// 			return TRUE;
	// 		}
	// 		else{
	// 			return FALSE;
	// 		}
	// 	}
	// }

	// function validarEditorialEdicion($param){
	// 	$patron="/^[a-zA-Z]{2,}$/";
	// 	if($param==""){
	// 		return TRUE;
	// 	}
	// 	else {
	// 		if(preg_match($patron, $param)){
	// 			return TRUE;
	// 		}
	// 		else{
	// 			return FALSE;
	// 		}
	// 	}
	// }

	// function validarISBN($param){
	// 	$patron="/^[0-9]{10,13}$/";
	// 	if(preg_match($patron, $param)){
	// 		return TRUE;
	// 	}
	// 	else{
	// 		return FALSE;
	// 	}
	// }

// FIN validar informacion relativa a los ejemplares

// Funcion sin uso
	// function validarNuevoUsuario($usuario,$dni,$contrasenia,$contraseniaConf,$correo,$telef,$movil,$anio){
	// 	if(validarNombre($usuario) AND validarDNI($dni) AND validarCOntrasenia($contrasenia,$contraseniaConf) AND validarCorreo($correo) AND validarTelefonoMovil($telef) AND validarTelefonoMovil($movil) AND validarAnio($anio)){
	// 		return TRUE;
	// 	}
	// 	else{
	// 		return FALSE;
	// 	}
	// }
?>