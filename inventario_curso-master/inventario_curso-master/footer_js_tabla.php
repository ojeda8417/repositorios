  <!--PAGINADOR-->
    <script src="<?php echo Conectar::ruta();?>public/js_tabla/jquery.dataTables.js"></script>
    <script>
		$(document).ready(function(){
			$('#myTable').dataTable();
		});
	</script>
    <script src="<?php echo Conectar::ruta();?>public/js_tabla/tablesort.min.js"></script>