<?php

//INICIO validar informacion relativa a los Usuarios

	function validarCampoLetras($param){
		$patron="/^([a-zA-Záéíóúñ]{1,}[\s]{0,1})+$/";
		if(preg_match($patron, $param)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

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

	function validarAutorEditorialEdicion($param){
		$patron="/^([a-zA-Záéíóúñ]{2,}[\s]{0,1})+$/";
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

// FIN validar informacion relativa a los libros

// INICIO validar informacion relativa a los ejemplares

	function validarLibroEjemplar($param){
		$patron="/^[0-9]{1,}$/";
		if(preg_match($patron, $param)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function validarLocalizacion($param){
		$patron="/^([a-zA-Z0-9áéíóúñ]{2,}[\s]{0,1})+$/";
		if(preg_match($patron, $param)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

// FIN validar informacion relativa a los ejemplares

// INICIO validar informacion relativa a los prestamos

	function validarCod($param){
		$patron="/^[0-9]{1,}$/";
		if(preg_match($patron, $param)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

// FIN validar informacion relativa a los ejemplares


// Funciones validar campos formularios

	function camposNoValidosUsuario(&$indicesNoValidos){
		if(!validarCampoLetras($_POST['nombre'])){
			$indicesNoValidos[]="Introduzca un nombre valido";
		}
		if(!validarDNI($_POST['dni'])){
			$indicesNoValidos[]="Introduzca un DNI valido";
		}
		if(!validarContrasenia($_POST['contrasenia'],$_POST['contraseniaConf'])){
			$indicesNoValidos[]="La contraseña debe coincidir";
		}
		if(!validarCorreo($_POST['email'])){
			$indicesNoValidos[]="Introduzca un email valido";
		}
		if(!validarTelefonoMovil($_POST['telefono'])){
			$indicesNoValidos[]="Introduzca un teléfono valido";
		}
		if(!validarTelefonoMovil($_POST['movil'])){
			$indicesNoValidos[]="Introduzca un móvil valido";	
		}
		if (!validarAnio($_POST['anio'])){
			$indicesNoValidos[]="Introduzca un año valido";		
		}
	}

	function camposNoValidosLibro(&$indicesNoValidos){
		if(!validarTitulo($_POST['tituloLibro'])){
			$indicesNoValidos[]="Introduzca un titulo valido";
		}
		if(!validarISBN($_POST['ISBN'])){
			$indicesNoValidos[]="Introduzca un ISBN valido";
		}
		if(!validarAutorEditorialEdicion($_POST['autor'])){
			$indicesNoValidos[]="Introduzca un autor valido";
		}
		if(!validarAutorEditorialEdicion($_POST['editorial'])){
			$indicesNoValidos[]="Introduzca un editorial valido";
		}
		if(!validarAutorEditorialEdicion($_POST['edicion'])){
			$indicesNoValidos[]="La edicion no es valida";
		}
		if(!validarAnio($_POST['anioPublicacion'])){
			$indicesNoValidos[]="Introduzca un año valido";	
		}
	}

	function camposNoValidosEjemplar(&$indicesNoValidos){
		if(!validarLibroEjemplar($_POST['idLibro'])){
			$indicesNoValidos[]="El codigo del libro no es valido";
		}
		if(!validarLibroEjemplar($_POST['idEjemplar'])){
			$indicesNoValidos[]="El codigo del ejemplar no es valido";
		}
		if(!validarLocalizacion($_POST['localizacion'])){
			$indicesNoValidos[]="La localizacion no es valida";
		}
	}

	function camposNoValidosPrestamo(&$indicesNoValidos){
		if(!validarCod($_POST['idLibro'])){
			$indicesNoValidos[]="El codigo del libro no es valido";
		}
		if(!validarCod($_POST['idEjemplar'])){
			$indicesNoValidos[]="El codigo del ejemplar no es valido";
		}
		if(!validarCod($_POST['idUsuario'])){
			$indicesNoValidos[]="El codigo del usuario no es valido";
		}
	}

// FIN Funciones validar campos formularios
?>