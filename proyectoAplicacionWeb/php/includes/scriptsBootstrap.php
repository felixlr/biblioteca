<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-hover-dropdown.min.js"></script>

<!-- Script para mostrar modal -->
<script language="javascript">
	$('#myModal').modal('show');
</script>

<!-- Script datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/cupertino/jquery-ui.css">
<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
<script>
	//Datepicker en español
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '<Ant',
		nextText: 'Sig>',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		weekHeader: 'Sm',
		dateFormat: 'dd-mm-yy',
		maxDate: "+1M +10D",
		minDate: -20,
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);
	//Datepicker en español

	//Cargamos Datepicker sobre el elemento con ID campofecha
	$(document).ready(function(){
		$("#calendario").datepicker();
	})
</script>

<script type="text/javascript">
	//Mostrar elemento oculta finalizarPrestamo.php
	var x;
	x=$(document);
	x.ready(mostrarDiv);

	function mostrarDiv(){
		var x;
		x=$("#mostrar");
		x.click(mostrarFecha);

		x=$("#ocultar");
		x.click(ocultarFecha);
	}

	function mostrarFecha(){
		x=$("#finalizar");
		x.fadeIn("fast");
		x=$("#mostrar");
		x.fadeTo("fast",0.5);
	}

	function ocultarFecha(){
		x=$("#finalizar");
		x.fadeOut("fast");
		x=$("#mostrar");
		x.fadeTo("fast",1);
	}
</script>