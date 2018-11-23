$(document).ready(function(){
	var urlExportXLS = base_url + "assets/extensiones/reportes_xls/formato_reporte_logistica.php";
	var urlExportPDF = base_url + "assets/extensiones/reportes_pdf/formato_reporte_logistica.php";
	var totalprod = 0;
	var DetalleRCBF = function(nRow, aData, iDisplayIndex)
	{
		totalprod +=parseInt(aData.DetSalProdCant);
		$("#totalprod").text(totalprod);
	};

	BuscarSalidaProductosdOptions = {
	"aoColumns":[
		{ "sWidth": "12%","mDataProp": "cProductoDesc"},
		{ "sWidth": "12%","mDataProp": "DetSalProdCant"}
	              ],
	"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
	"fnCreatedRow":DetalleRCBF
	};
	DetalleProductosTable = createDataTable2('salida_productos_table',BuscarSalidaProductosdOptions);

	$("#pdfgen").click(function(){

		total = [	{'td1':'CANT. TOTAL:','td2':totalprod}	];

		resumen = [	{'td1':'REGISTRADOR:','td2':$("#registrador").text(),'td3':'ORDEN:','td4':$("#serie_nro").text(),},
		           	{'td1':'TIENDA:','td2': $("#local").text(),'td3':'FECHA DE EMISIÓN:','td4':$("#fec_reg").text(),},
		           	{'td1':'OBSERVACIONES:','td2': $("#observacion").text(),'td3':'MOTIVO:','td4':$("#motivo").text(),}	];
		
		
		tablaresumen = toHTML(crearTablaToArray("resume",null,null,
				['td1','td2','td3','td4'],
				['style="width: 25%;" class="impar" ','style="width:25%;" ','style="width: 25%;" class="impar" ','style="width: 25%;" '],
				resumen));

		tabladetalle = toHTML(crearTablaToArray("tproductos",
				['Producto','Cantidad'],
				['style="width: 80%;" class="prodth" ','style="width: 20%;" class="prodth" '],
				['cProductoDesc','DetSalProdCant'],
				['style="width: 80%;" class="izquierda"','style="width: 20%;"'],
				DetalleProductosTable.fnGetData()));
		tablatotal = toHTML(crearTablaToArray('total',null,null,
				['td1','td2'],
				['style="width: 80%;" class="upbold" ','style="width: 20%;"  class="verde"'],
				total));

		nombre = $("#serie_nro").text();
		
		$('#nombrearchivo').val("salida_producto_"+nombre+"-");
		$("#title").val("ORDEN DE SALIDA");
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
	
	$("#xlsutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportXLS);
		$("#CreatePDFForm").submit();
		$("#exportmodal").modal('hide');
	});
});