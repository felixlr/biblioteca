<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Mensaje:</h4>
			</div>
			<div class="modal-body" style="padding-top: 5px; padding-bottom:5px;">
				<?php
					$indicesNoValidos=explode("-",$_SESSION['mensaje']); 
					foreach($indicesNoValidos as $valor){
						echo '<p>'.$valor.'</p>';
					}
				?>
			</div>
			<div class="modal-footer" style="padding-top:5px; padding-bottom:5px;">
				<button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>