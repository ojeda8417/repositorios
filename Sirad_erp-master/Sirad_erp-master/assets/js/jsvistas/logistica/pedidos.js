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
		

		$('.btn-datos').attr('href',"logistica_pedidos_ver.html");
		$('.btn-danger').click(function(){
			$("#EliminarPedidoAlert").modal('show');
		});

		$(document).ready(function(){

		var OrdenPedidoTA = new DTActions({
		'conf': '100',
		'idtable': 'ingreso_productos_table',
		//'EditFunction': function(nRow, aData, iDisplayIndex) {
			//location.href = $("#IngProductosForm").attr("action-2")+aData.nOferta_id;
		//	location.href = $("#IngProductosForm").attr("action-2")+"/"+aData.nIngProd_id;
			
		//},
		'ViewFunction':function(nRow, aData, iDisplayIndex){
			location.href = $("#PedidoForm").attr("action-1")+"/"+aData.nOrdPed_id;
		}
	});

	OrdenPedidoRowCBF = function(nRow, aData, iDisplayIndex){
		OrdenPedidoTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var UrlaDTable = $("#pedidos_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "15%","mDataProp": "nomape"},
		              { "sWidth": "10%","mDataProp": "nOrdPed_id"},
		              { "sWidth": "20%","mDataProp": "dOrdPedFecReg"},
		              { "sWidth": "20%","mDataProp": "dOrdePedFecEnt"},
		              { "sWidth": "10%","mDataProp": "cLocalDesc"},
		              ];

	OrdenPedidoTable = createDataTable('pedidos_table',UrlaDTable,FormatoDTable,null, OrdenPedidoRowCBF);
});