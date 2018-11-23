var urlES =  "js/es_ES.txt";

var urlExportCierreXLS = "extensiones/reportes_xls/formato_reporte_cuadrecaja.php";
var urlExportCierrePDF = "extensiones/reportes_pdf/formato_reporte_cuadrecaja.php";

$('#lanza-cierremes').click(function(e){
	e.preventDefault();
	$('#modalcierremes').modal('show');
});

$('#btn-cierremes').click(function(){
	$('#modalcierremes').modal('hide');
	var ajax = $.ajax({
		url: "{{ path('dicars_logistica_servicio_cierremes',{'idlocal':''}) }}/"+2,
		dataType: "json",
		async: false
	});
	ajax.done(function(data){
		$('#aftercierremes').modal('show');
	});
});

$('#lanza-cuadrecaja').click(function(e){
	e.preventDefault();
	$('#modalcuadrecaja').modal('show');
});

$('#pdfcuadrecaja').click(function(e){
	e.preventDefault();
	$("#FormCuadreCaja").attr("action",urlExportCierrePDF);
	$('#FormCuadreCaja').submit();
	$('#table_cuadrecaja').val('');
	$('#modalcuadrecaja').modal('hide');
});

$('#xlscuadrecaja').click(function(e){
	e.preventDefault();
	$("#FormCuadreCaja").attr("action",urlExportCierreXLS);
	$('#FormCuadreCaja').submit();
	$('#table_cuadrecaja').val('');
	$('#modalcuadrecaja').modal('hide');
});