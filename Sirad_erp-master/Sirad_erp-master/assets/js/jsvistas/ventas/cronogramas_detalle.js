$(document).ready(function(){

	var urlExportXLS = base_url+"assets/extensiones/reportes_xls/formato_reporte_cronpago.php";
	var urlExportPDF = base_url+"assets/extensiones/reportes_pdf/formato_reporte_cronpago.php";

	function CalcularPago(){
		CloneAttrTable(CronoTable,'cmonto',3);
		$(CronoTable.fnGetData()).AddAttr('band',0);
		var Array = CronoTable.fnGetData();
		var Monto = parseFloat($("#monto").val());
		var total = 0;

		$(Array).each(function(index){
			var deudacuota = parseFloat(this.nCronPagoMonCouApg - this.nCronPagoMonCouApl);
			if(deudacuota != 0){
				var aplicado = 0 ;
				Monto-=deudacuota;
				if(Monto <= 0){
					aplicado = parseFloat(this.nCronPagoMonCouApl) + (Monto) + deudacuota;
					total = parseFloat(total)+(Monto) + deudacuota;
					Monto = 0;
				}
				else{
					aplicado = parseFloat(this.nCronPagoMonCouApg);
					total = total + parseFloat(this.nCronPagoMonCouApg - this.nCronPagoMonCouApl);				
				}
				CronoTable.fnUpdate(aplicado.toFixed(2),index,3);
				this.band= 1;
			}
			return (Monto != 0);
		});
		$("#montoapg").val(total.toFixed(2));
	};

	var prepararDatos = function(CronogramaReport){
		var tabladetalle = toHTML(crearTablaToArray("tdetalle",
				['Producto','Cantidad', 'Precio Credito','Total'],
				['style="width: 45%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 20%;" class="prodth" ','style="width: 20%;" class="prodth" '],
				['Producto','cant_prod','nDetVentaPrecUnt','Total'],
				['style="width: 45%;" class="izquierda"','style="width: 15%;"','style="width: 20%;"','style="width: 20%;"'],
				CronogramaReport.detventas));

		var tablacronograma = toHTML(crearTablaToArray("tcronograma",
				['Cuota','Fecha Vencimiento', 'Deuda','Monto Pagado','Saldo','Estado'],
				['style="width: 16%;" class="prodth" ','style="width: 18%;" class="prodth" ','style="width: 16%;" class="prodth" ','style="width: 16%;" class="prodth" ','style="width: 16%;" class="prodth" ','style="width: 18%;" class="prodth" '],
				['NroCuota','FecVenc','Deuda','MontoPagado','Saldo','Estado'],
				['style="width: 16%;" class="izquierda"','style="width: 18%;"','style="width: 16%;"','style="width: 16%;"','style="width: 16%;"','style="width: 18%;" '],
				CronogramaReport.cuotas));
		
		resumen = [	{'td1':'CLIENTE:','td2': CronogramaReport.cliente,'td3':'VENDEDOR:','td4':CronogramaReport.vendedor},
		           	{'td1':'','td2': '','td3':'','td4':''},
		           	{'td1':'FECHA REGISTRO CREDITO:','td2': CronogramaReport.fecreg,'td3':'MONTO TOTAL DEUDA:','td4':CronogramaReport.monto}];

		tablaresumen = toHTML(crearTablaToArray("resume",null,null,['td1','td2','td3','td4'],['style="width: 25%;" class="impar" ','style="width:25%;" ','style="width: 25%;" class="impar" ','style="width: 25%;" '],resumen));

		$('#nombrearchivo').val(CronogramaReport.nVenta_id);
		$('#tdetalle').val(tabladetalle);
		$('#tcronograma').val(tablacronograma);
		$('#tresumen').val(tablaresumen);
	}

	var CreditosDetalleOptions = {
		"aoColumns":[
				{ "sWidth": "10%","mDataProp": "fechaVenta"},
				{ "sWidth": "8%","mDataProp": "montoTotal"},
				{ "sWidth": "9%","mDataProp": "montoPagado"}, 
				{ "sWidth": "8%","mDataProp": "cuotas"},
				{ "sWidth": "6%","mDataProp": "estadolabel"},
				{ "sWidth": "10%","mDataProp": "btnpagar"},
				{ "sWidth": "15%","mDataProp": "btnreporte"}    
				],
		"fnCreatedRow":function(nRow, aData, iDisplayIndex)
		{
			$(nRow).find(".btn-pagar").click(function(e){
				e.preventDefault();
				CronoTable.fnReloadAjax(base_url + "ventas/servicios/get_cronogramabyCredito/" + aData.id_credito);
				$('#modalCuotas').modal('show');
			});
			$(nRow).find('.btn-cronograma').click(function(e){
				e.preventDefault();
				$('#vercronograma').modal('show');
				prepararDatos(getAjaxObject(base_url+"ventas/servicios/get_cronpago_venta/"+aData.id_venta));
				$("#nVenta_id").val(aData.id_venta);
				$("#idcredito").val(aData.id_credito);
			});
		}
	};

	CreditosDetalleTable = createDataTable2('creditos_table',CreditosDetalleOptions);


	var CronoOptions = {
		"aoColumns":[
			{ "sWidth": "15%","mDataProp": "nCronPagoFecPago"},
			{ "sWidth": "15%","mDataProp": "nCronPagoNroCuota"},
			{ "sWidth": "15%","mDataProp": "nCronPagoMonCouApg"},
			{ "sWidth": "15%","mDataProp": "nCronPagoMonCouApl"}   
				],
		
		"sDom": "<r>t<'row-fluid'>",
		"fnCreatedRow": function( nRow, aData, iDisplayIndex ) {
						aData.band = 1;
						aData.cmonto = aData.nCronPagoMonCouApl;
		              },
	};

	$("#pagar").click(function(e){
		e.preventDefault();
		CalcularPago();
	});

	$("#guardar_pago").click(function(e){
		e.preventDefault();
		CalcularPago();
		var datostosend = {
			formulario:$("#PagarCuotasForm").serializeObject(),
			cronogramas:CopyArray(CronoTable.fnGetData(),["nCronograma_id","nCronPagoMonCouApl","band"])
		}
		//console.log(datostosend);
		enviar($("#PagarCuotasForm").attr("action-1"),datostosend,logdata,null);
	});

	$("#pdfbutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportPDF);
		$("#CreatePDFForm").submit();
		$('#vercronograma').modal('hide');
	});
	
	$("#xlsutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportXLS);
		$("#CreatePDFForm").submit();
		$('#vercronograma').modal('hide');
	});

	CronoTable = createDataTable2('cuotas_table',CronoOptions);
	
});