$(document).ready(function(){

	var urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_logistica.php";
	var urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_logistica.php";

	$("#pdfgen").click(function(){

		resumen = [	{'td1':'REGISTRADOR:','td2':$("#registrador").text(),'td3':'ORDEN:','td4':$("#codigo").text()},
		           	{'td1':'PROVEEDOR:','td2':$("#proveedor").text(),'td3':'FECHA DE EMISIÓN:','td4':$("#fec_reg").text()},
		           	{'td1':'OBSERVACIONES:','td2':$("#observaciones").text(),'td3':'','td4':''}	];
		    
		total = [	{'td1':'SUB TOTAL:','td2':'S/.'+$("#subtotal").text()},
		         	{'td1':'DESCUENTO:','td2':'S/.'+$("#descuento").text()},
		         	{'td1':'IGV:','td2':'S/.'+$("#igv").text()},
		         	{'td1':'','td2':''},
		         	{'td1':'CANT. TOTAL:','td2':'S/.'+$("#total").text()}	
		         ];
		
		tablaresumen = toHTML(crearTablaToArray("resume",null,null,
					['td1','td2','td3','td4'],
					['style="width: 25%;" class="impar" ','style="width:25%;" ','style="width: 25%;" class="impar" ','style="width: 25%;" '],
					resumen));

		tableproductos = toHTML(crearTablaToArray("tproductos",
				['Producto','Cantidad', 'Precio Unitario','Importe'],
				['style="width: 45%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 20%;" class="prodth" ','style="width: 20%;" class="prodth" '],
				['cProductoDesc','nDetCompraCant','nDetCompraPrecUnt','nDetCompraImporte'],
				['style="width: 45%;" class="izquierda"','style="width: 15%;"','style="width: 20%;"','style="width: 20%;"'],
				DetalleProductosTable.fnGetData()));
		
		tablatotal = toHTML(crearTablaToArray('total',null,null,
			['td1','td2'],
			['style="width: 80%;" class="upbold" ','style="width: 20%;"  class="verde"'],
			total));


		nombre = $("#codigo").text();
		$('#nombrearchivo').val("orden_compra_"+nombre);
		$("#title").val("ORDEN DE COMPRA");
		$("#table_resumen").val(tablaresumen);
		$("#table_producto").val(tableproductos);
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
		
		OrdenCompradOptions = {
		"aoColumns":[
			{ "mDataProp": "cProductoDesc"},
			{ "mDataProp": "nDetCompraCant"},
			{ "mDataProp": "nDetCompraPrecUnt"},
			{ "mDataProp": "nDetCompraImporte"},
			{ "mDataProp": "nOrdenCom_id"}					
		              ]
		};
		DetalleProductosTable = createDataTable2('productos_table',OrdenCompradOptions);
});