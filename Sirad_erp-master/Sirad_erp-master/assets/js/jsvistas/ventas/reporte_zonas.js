$(document).ready(function(){
	var ZonaPersonalTable;
	var ClienteTable;
	
	var RowCallBackFunctionZonaPersonal;
	var tabla_clientes;

	var	urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_clienteZona.php";
	var	urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_clienteZona.php";

	var SelectZona = null;

	var ZonaPersonalOptions = {
		"aoColumns":[
				{ "sWidth": "15%","mDataProp": "cZonaDesc"},
				{ "sWidth": "15%","mDataProp": "persona"},
				{ "sWidth": "15%","mDataProp": "des_ubigeo"}, 
				],
		"fnCreatedRow":function(nRow,aData,iDisplayIndex){
				$(nRow).click( function(e) {
					e.preventDefault();					
					if ( $(this).hasClass('row_selected') ) {
			            $(this).removeClass('row_selected');
			        }
					else {
						$('#zonapersonal_table tr.row_selected').removeClass('row_selected');
			            $(this).addClass('row_selected');
			            ClienteTable.fnReloadAjax(base_url+"ventas/servicios/getClienteZona/"+aData.nZona_id);
			            SelectZona = aData;
			        }
				});
		}
	};

	var ZonaPersonalTable = createDataTable2('zonapersonal_table',ZonaPersonalOptions);

	var ClientesOptions = {
	"aoColumns": [
	              { "sWidth": "15%","mDataProp": "cClienteNom"},
	              { "sWidth": "15%","mDataProp": "cClienteApe"},
	              { "sWidth": "15%","mDataProp": "cClienteDNI"},
	              { "sWidth": "15%","mDataProp": "nClienteLineaOp"}
	              ]
	             };
	ClienteTable = createDataTable2('clientes_table',ClientesOptions);


	$("#pdfgen").click(function(){
			
		resumen = [	{'td1':'NOMBRE ZONA:','td2':SelectZona.cZonaDesc,'td3':'UBIGEO:','td4':SelectZona.des_ubigeo},
					{'td1':'','td2':'','td3':'','td4':''},
		           	{'td1':'ENCARGADO:','td2':SelectZona.persona,'td3':'','td4':''}];

		tabla_clientes = toHTML(crearTablaToArray("tclientes",
				['NOMBRE','APELLIDO','DNI','LINEA OPERATIVA'],
				[	'style="width: 25%;" class="head" ','style="width: 25%;" class="head" ','style="width: 25%;" class="head" ',
					'style="width: 25%;" class="head" '],
				['cClienteNom','cClienteApe','cClienteDNI','nClienteLineaOp'],
				[	'style="width: 25%;" ','style="width: 25%;" ','style="width: 25%;" ',
					'style="width: 25%;" '],
					ClienteTable.fnGetData()));

		tablaresumen = toHTML(crearTablaToArray("resume",null,null,
					['td1','td2','td3','td4'],
					['style="width: 25%;" class="impar" ','style="width:25%;" ','style="width: 25%;" class="impar" ','style="width: 25%;" '],
					resumen));

		$("#title").val("REPORTE ZONAS");
		$("#table_resumen").val(tablaresumen);
		$("#table_clientes").val(tabla_clientes);
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