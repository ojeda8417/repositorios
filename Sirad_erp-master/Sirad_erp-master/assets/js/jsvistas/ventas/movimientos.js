$(document).ready(function(){
	$("#MovimientosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	$(".SelectAjax").SelectAjax();
	var TablaIngresos = new Array();
	var TablaSalidas = new Array();

	var urlExportXLS = null;
	var urlExportPDF = null;

	var urlExportXLS = null;
	var urlExportPDF = null;

	var MovimientosOptions = {
		"aoColumns":[
				{ "mDataProp": "dMovimientoFecReg"},
				{ "mDataProp": "personal"},
				{ "mDataProp": "cMovimientoConcepto"}, 
				{ "mDataProp": "nMovimientoMonto"},
				{ "mDataProp": "nMovimientoTip"},	    	              
				{ "mDataProp": "nMovimientoTipPag"},
				],
		"sDom":"t<'row'<'col-lg-6'i><'col-lg-6'p>>",		
	};

	var MovimientosTable = createDataTable2('movimientos_table',MovimientosOptions);

	var successMovimiento = function(){
		$.unblockUI({
		    onUnblock: function(){
				date1 = new Date($("#date01").datepicker("getDates"));
				date2 = new Date($("#date02").datepicker("getDates"));
				$('#MovimientoForm').reset();
				MovimientosTable.fnReloadAjax(base_url+"ventas/servicios/getMovimientos/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2));
				MovimientosTable.reloadSigleFilter();
			}
		});
	}

	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalMov').modal('show');
	});
	$('#modal_caja').click(function(e){
		e.preventDefault();
		$('#rquiredproducts').modal('show');
	});

	$("#btn-reg-movimiento").click(function(event){
		event.preventDefault();
		if($("#MovimientoForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalMov').modal('hide');
					enviar($("#MovimientoForm").attr("action-1"),{formulario:$("#MovimientoForm").serializeObject()}, successMovimiento, null)
					//console.log($("#MovimientoForm").serializeObject());
				}
			});
	}); 

	//buscar pr fechas
	$("#buscarfecha").click(function(event){
		event.preventDefault();
		date1 = new Date($("#date01").datepicker("getDates"));
		date2 = new Date($("#date02").datepicker("getDates"));
		MovimientosTable.fnReloadAjax(base_url+"ventas/servicios/getMovimientos/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2));
		MovimientosTable.reloadSigleFilter();
	});

	//Reportes

	$("#pdfgen").click(function(){		
		urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_movimiento.php";
		urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_movimiento.php";


	    var movimientotable = toHTML(crearTablaToArray("tmovimiento",
				['FECHA REGISTRO','PERSONAL','CONCEPTO','MONTO','TIPO MOV','TIPO PAGO'],
				[	'style="width: 16%;" class="head" ','style="width: 16%;" class="head" ','style="width: 16%;" class="head" ',
					'style="width: 16%;" class="head" ','style="width: 16%;" class="head" ','style="width: 16%;" class="head" '],
				['dMovimientoFecReg','personal','cMovimientoConcepto','nMovimientoMonto','nMovimientoTip','nMovimientoTipPag'],
				[	'style="width: 16%;" ','style="width: 16%;" ','style="width: 16%;" ',
					'style="width: 16%;" ','style="width: 16%;" ','style="width: 16%;" '],
					MovimientosTable.fnGetData()));
		$("#title").val("REPORTE DE MOVIMIENTOS");
		$("#movimientotable").val(movimientotable);
		$("#exportmodal").modal('show');
	});

	var PrepareData = function ()
	{
		var MovimientoArray = MovimientosTable.fnGetData();
		Total = 0;
		TablaIngresos = new Array();
		TablaSalidas = new Array();
		$(MovimientoArray).each(function(index){
			if(this.cConstanteValor==1){
				TablaSalidas.push(this);
				Total -= parseFloat(this.nMovimientoMonto);
			}else if(this.cConstanteValor==2){
				TablaIngresos.push(this);
				Total += parseFloat(this.nMovimientoMonto);
			}
		});
	}

	$("#pdfdet").click(function(){
		urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_movimientodet.php";
		urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_movimientodet.php";

		PrepareData();		
		var tableingresos = toHTML(crearTablaToArray("tmovimiento",
			['FECHA','PERSONAL','CONCEPTO','MONTO','TIPO MOVIMIENTO','FORMA DE PAGO'],
			[	'style="width: 20%;" class="head" ','style="width: 20%;" class="head" ','style="width: 10%;" class="head" ',
				'style="width: 10%;" class="head" ','style="width: 20%;" class="head" ','style="width: 20%;" class="head" '],
			['dMovimientoFecReg','personal','cMovimientoConcepto','nMovimientoMonto','nMovimientoTip','nMovimientoTipPag'],
			[	'style="width: 20%;" ','style="width: 20%;" ','style="width: 10%;" ',
				'style="width: 10%;" ','style="width: 20%;" ','style="width: 20%;" '],
				TablaIngresos));

		var tablesalidas = toHTML(crearTablaToArray("tmovimiento",
			['FECHA','PERSONAL','CONCEPTO','MONTO','TIPO MOVIMIENTO','FORMA DE PAGO'],
			[	'style="width: 20%;" class="head" ','style="width: 20%;" class="head" ','style="width: 10%;" class="head" ',
				'style="width: 10%;" class="head" ','style="width: 20%;" class="head" ','style="width: 20%;" class="head" '],
			['dMovimientoFecReg','personal','cMovimientoConcepto','nMovimientoMonto','nMovimientoTip','nMovimientoTipPag'],
			[	'style="width: 20%;" ','style="width: 20%;" ','style="width: 10%;" ',
				'style="width: 10%;" ','style="width: 20%;" ','style="width: 20%;" '],
				TablaSalidas));		
		$("#title").val("REPORTE DE MOVIMIENTOS");
		$("#table_ingresos").val(tableingresos);
		$("#table_salidas").val(tablesalidas);
		$("#total").val(Total);
		$("#exportmodal").modal('show');
	});
	
	$("#pdfbutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportPDF);
		$("#CreatePDFForm").submit();
		$("#exportmodal").modal('hide');
	});
		
	$("#xlsutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportXLS);
		$("#CreatePDFForm").submit();
		$("#exportmodal").modal('hide'); 
	});

});