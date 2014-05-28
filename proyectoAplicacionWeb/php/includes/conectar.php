<?php
	function conectar(){
			$id_conexion=@mysql_connect('localhost','biblioteca','123456') or die("No se pudo establecer la conexion al servidor");
			@mysql_select_db('biblioteca',$id_conexion) or die("La BBDD no existe");
			return $id_conexion;
		}
?>