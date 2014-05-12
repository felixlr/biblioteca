<?php
	session_start();
	
	if(isset($_SESSION['usuario'])){
		echo '
			<html>
				<head>
					<meta http-equiv="Refresh" content="0; url=principal.php">
				</head>
			</html>
		';
	}
	else{
		echo '
			<html>
				<head>
					<meta http-equiv="Refresh" content="0; url=login.php">
				</head>
			</html>
		';
	}
?>