

	//init------------------------------------>
	$(document).ready(function(){

		$('#btn-zona').click(function(e){
			e.preventDefault();
			$('#modalBuscarZona').modal('show');
		});
		$("#select_zona").click(function(e){
			e.preventDefault();
			$('#modalBuscarZona').modal('hide');
		});
	});