
	<!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    
	<script src="<?php echo base_url();?>assets/js/sliptree-bootstrap-tokenfield/bootstrap-tokenfield.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url();?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <!-- DATEPICKER -->
	<script src="<?php echo base_url();?>assets/js/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>assets/js/datepicker/js/locales/bootstrap-datepicker.es.js"></script>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#<?=$dropactive ?>').addClass('active');
			$('#<?=$active ?>').addClass('active');
		});
	</script>

    <!-- AdminLTE App -->
    <script src="<?php echo base_url();?>assets/js/AdminLTE/app.js" type="text/javascript"></script>

	<script src="<?php echo base_url();?>assets/js/jqueryvalidation/languages/jquery.validationEngine-es.js"></script>
	<script src="<?php echo base_url();?>assets/js/jqueryvalidation/jquery.validationEngine.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
	<script src="<?php echo base_url();?>assets/js/util/datatable_plugins.js"></script>
	<script src="<?php echo base_url();?>assets/js/util/functiongen.js"></script>
	<script src="<?php echo base_url();?>assets/js/datatables.actions.js"></script>
	<script src="<?php echo base_url();?>assets/js/prettify.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.bootstrap.wizard.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/printThis.js"></script>

	<script type="text/javascript">
		var base_url = "<?php echo base_url();?>";
		$(document).ready(function(){
			//datepicker
			$(".datepicker,.input-daterange").datepicker({
				format: "dd/mm/yyyy",
			    language: "es",
			    autoclose: true,
			    orientation: "top auto",
			    todayHighlight: true
			});

			var urlExportCierreXLS = base_url + "assets/extensiones/reportes_xls/formato_reporte_cuadrecaja.php";
			var urlExportCierrePDF = base_url + "assets/extensiones/reportes_pdf/formato_reporte_cuadrecaja.php";			
			
			$('#lanza-cierremes').click(function(e){
				e.preventDefault();
				$('#modalcierremes').modal('show');
			});

			$('#btn-cierremes').click(function(){
				$('#modalcierremes').modal('hide');
				var ajax = $.ajax({
					url: base_url+"logistica/Servicios/cierremes",
					dataType: "json",
					async: false
				});
				ajax.done(function(data){
					$('#aftercierremes').modal('show');
				});
			});
		///CUADRE DE CAJA
		function prepararDatosCuadreCaja(){
			var date01 =fechaFormatoSQL(new Date($("#fecha01").datepicker("getDates")));
			tablacuadrecaja = $.ajax({
			       url: base_url + 'ventas/CuadreCaja/get_cuadrecaja/'+date01,
			       async: false
			   }).responseText;
			$('#table_cuadrecaja').val(tablacuadrecaja);
		}


			$('#lanza-cuadrecaja').click(function(e){
				e.preventDefault();
				$('#modalcuadrecaja').modal('show');
			});

			$('#pdfcuadrecaja').click(function(e){
				e.preventDefault();	
				prepararDatosCuadreCaja();			
				$("#FormCuadreCaja").attr("action",urlExportCierrePDF);
				$('#FormCuadreCaja').submit();
				$('#table_cuadrecaja').val('');	
				$('#modalcuadrecaja').modal('hide');
			});

			$('#xlscuadrecaja').click(function(e){
				e.preventDefault();
				prepararDatosCuadreCaja();
				$("#FormCuadreCaja").attr("action",urlExportCierreXLS);
				$('#FormCuadreCaja').submit();
				$('#table_cuadrecaja').val('');
				$('#modalcuadrecaja').modal('hide');
			});
		});
	</script>
	<script src="<?php echo $jsvista;?>"></script>
	</body>
</html>