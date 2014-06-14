<div class="barraDecorativa"></div>
<header id="header">
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				<a href="panelControl.php?backend=inicio">
					<div id="mainLogo">
						<img src="../img/logo.gif" alt="Logo" class="logo">
					</div>
					<div class="textoLogo">
						<p>Departamento de Informática</p>
						<p>IES Lope de Vega</p>
					</div>
				</a>
			</div>
			<?php
				if (isset($_GET['backend'])){
					if ($_GET['backend']=="inicio"){
						include('headerInicioPanel.php');
					}
					else{
						include('headerCategorias.php');
					}
				}
				else{
					include('headerFrontEnd.php');
				}
			?>
		</div>
	</div>
</header>
<div class="linea"></div>