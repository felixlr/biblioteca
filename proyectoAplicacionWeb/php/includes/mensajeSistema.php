<?php if(isset($_SESSION['mensaje'])){
		include("includes/mensajeModal.php");
		unset($_SESSION['mensaje']);
	}
?>