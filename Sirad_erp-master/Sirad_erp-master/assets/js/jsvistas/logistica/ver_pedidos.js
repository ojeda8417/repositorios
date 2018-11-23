	var urlES =  "js/es_ES.txt";

		var urlExportCierreXLS = base_url +"extensiones/reportes_xls/formato_reporte_logistica.php";
		var urlExportCierrePDF = base_url +"extensiones/reportes_pdf/formato_reporte_logistica.php";
		
		var totalprod = 0;		
		var DetalleRCBF = function(nRow, aData, iDisplayIndex)
		{
			totalprod +=parseInt(aData.nDetOrdPedCant);
			$("#totalprod").text(totalprod);
		};
		

		$(document).ready(function(){
			var urlExportXLS = base_url + "assets/extensiones/reportes_xls/formato_reporte_logistica.php";
			var urlExportPDF = base_url + "assets/extensiones/reportes_pdf/formato_reporte_logistica.php";

			var OrdPedidoActions = new DTActions({
		'conf': '000',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
			}
		});
		PedidoOptions = {
		"aoColumns":[
			{ "sWidth": "15%","mDataProp": "cProductoDesc"},
			{ "sWidth": "15%","mDataProp": "nDetOrdPedCant"},
			{ "sWidth": "15%","mDataProp": "nDetOrdPedCantAcept"},
			{ "sWidth": "15%","mDataProp": "estadolabel"}				
		              ],
		"fnCreatedRow":DetalleRCBF
		};
		PedidosTable = createDataTable2('productos_table',PedidoOptions);
		////////////////////////////////////////GENERAR REPORTES//////////////////////////////////////
		//llamamos a la modal para exportar
		$('#pdfgen').click(function(e){
		total = [	{'td1':'CANT. TOTAL:','td2':totalprod}	];

		resumen = [	{'td1':'N° PEDIDO:','td2':$("#codigo").text(),'td3':'REGISTRADOR:','td4':$("#registrador").text(),},
		           	{'td1':'FECHA PEDIDO:','td2': $("#fechapedido").text(),'td3':'FECHA DE ENTREGA:','td4':$("#fechaentrega").text(),},
		           	{'td1':'TIENDA:','td2': $("#tienda").text(),'td3':'OBSERVACIONES:','td4':$("#observaciones").text(),}	];
		
		tablaresumen = toHTML(crearTablaToArray("resume",null,null,
				['td1','td2','td3','td4'],
				['style="width: 25%;" class="impar" ','style="width:25%;" ','style="width: 25%;" class="impar" ','style="width: 25%;" '],
				resumen));
		tabladetalle = toHTML(crearTablaToArray("productos_table",
				['Producto','Cantidad Total'],
				['style="width: 80%;" class="prodth" ','style="width: 20%;" class="prodth" '],
				['cProductoDesc','nDetOrdPedCant'],
				['style="width: 80%;" class="izquierda"','style="width: 20%;"'],
				PedidosTable.fnGetData()));
		tablatotal = toHTML(crearTablaToArray('total',null,null,
				['td1','td2'],
				['style="width: 80%;" class="upbold" ','style="width: 20%;"  class="verde"'],
				total));
		nombre = $("#nombrearchivo").text();
		$('#nombrearchivo').val("orden_pedido_"+nombre);
		$("#title").val("ORDEN DE PEDIDO");
		$("#table_resumen").val(tablaresumen);
		$("#table_producto").val(tabladetalle);
		$("#table_total").val(tablatotal);
		$("#exportmodal").modal('show');
			});

	$("#pdfbutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportPDF);
		$("#CreatePDFForm").submit();
		$("#exportmodal").modal('hide');
	});
	
	$("#xlsbutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportXLS);
		$("#CreatePDFForm").submit();
		$("#exportmodal").modal('hide');
	});


		});