<?php

	echo '
		<form role="form" class="form-horizontal" action="procesar/procesarFinalizarPrestamo.php" method="POST">
			<fieldset>
				<div class="col-xs-12">
					<legend>Finalizar Prestamo</legend>
				</div>
				<div class="form-group">
					<label for="dia" class="col-xs-3 control-label">Día:</label>
					<div class="col-xs-4">
						<select id="dia" class="form-control" name="dia">
							<option value="">Elije un dia</option>';
							for($i=1;$i<=31;$i++){
								echo '
									<option value="';
									if($i<10){
										echo '0'.$i;
									}
									else{
										echo $i;
									}
									echo '">';
									if($i<10){
										echo '0'.$i;
									}else{
										echo $i;
									}
									echo '</option>';								
							}
					echo '</select>
					</div>
				</div>
				<div class="form-group">
					<label for="mes" class="col-xs-3 control-label">Mes:</label>
					<div class="col-xs-4">
						<select id="mes" class="form-control" name="mes">
							<option value="">Elije un mes</option>';
							for($i=1;$i<=12;$i++){
								echo '
									<option value="';
									if($i<10){
										echo '0'.$i;
									}
									else{
										echo $i;
									}
									echo '">';
									if($i<10){
										echo '0'.$i;
									}else{
										echo $i;
									}
									echo '</option>';								
							}
					echo '</select>
					</div>
				</div>
				<div class="form-group">
					<label for="anio" class="col-xs-3 control-label">Año:</label>
					<div class="col-xs-4">
						<select id="anio" class="form-control" name="anio">
							<option value="">Elije un año</option>';
							for($i=date('Y');$i>=2000;$i--){
								echo '
								<option value="'.$i.'">'.$i.'</option>';
							}
					echo '</select>
					</div>
				</div>
				<div class="form-group">
	    			<div class="col-xs-offset-8 col-xs-2">
	      				<button type="submit" class="btn btn-info botonFormulario">Finalizar</button>
	    			</div>
	  			</div>
			</fieldset>
		</form>
	';
?>