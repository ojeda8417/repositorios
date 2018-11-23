$(document).ready(function(){

	var UrlaDTable;
	var KardexTable;
	var RowCallBackKardex;
	var tablakardexval;
	var urlExportGenXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_kargexgen.php";
	var urlExportValXLS = base_url+ "assets/extensiones/reportes_xls/formato_reporte_kargexval.php";
	//CREAMOS DATATABLE
	$("#KardexForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
		var KardexTA = new DTActions({
		'conf': '000',
		'idtable': 'kardex_table',
	});

	KardexRowCBF = function(nRow, aData, iDisplayIndex){
	if(aData.TipoIngreso == "Saldo Inicial")
			$(nRow).css("background-color","#FFFF99"); 	
	};

	var KardexOptions = {
		"aoColumns":[
		              { "sWidth": "10%","mDataProp": "Anio"},
		              { "sWidth": "10%","mDataProp": "Mes"},
		              { "sWidth": "25%","mDataProp": "Producto"},
		              { "sWidth": "10%","mDataProp": "cMarcaDesc"},
		              { "sWidth": "10%","mDataProp": "Tipo_Producto"},
		              { "sWidth": "15%","mDataProp": "TipoIngreso"},
		              { "sWidth": "10%","mDataProp": "Cantidad"},
		              { "sWidth": "15%","mDataProp": "PrecUnit"},
		              { "sWidth": "15%","mDataProp": "PrecTot"}
		              ],
		"fnCreatedRow":KardexRowCBF,
		"sDom": "t<'row'<'col-xs-6'i><'col-xs-6'p>>"
		};

		KardexTable = createDataTable2('kardex_table',KardexOptions);
	
	$("#buscarfecha").click(function(e){
		e.preventDefault();		
		date1 = new Date($("#date01").datepicker("getDates"));
		KardexTable.fnReloadAjax($("#KardexForm").attr("action-1")+"/"+fechaFormatoSQL(date1));
		KardexTable.reloadSigleFilter();
	});

	function prepararGenDatos(){
	var tablakardex = toHTML(crearTablaToArray("tdetalle",
			['Año','Mes', 'Documento','Producto','Marca','Tipo Producto','Detalle','Tipo de Ingreso','Cantidad','Prec. Unitario s/.','Prec. Total s/.'],
			['class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" '],
			['Anio','Mes','Documento','Producto','cMarcaDesc','cMarcaDesc','Detalle','TipoIngreso','Cantidad','PrecUnit','PrecTot'],
			['style="width: 15%;"','style="width: 15%;"','style="width: 25%;"','style="width: 15%;"','style="width: 15%;"','style="width: 15%;"','style="width: 15%;"','style="width: 15%;"'],
			KardexTable.fnGetData()));

	var titulo = "Kardex General ";
   	
	$('#table_kardexgen').val(tablakardex);
	$('#titulo').val(titulo);
}
	//BOTON REPORTE RESUMEN
	$("#xlsresumengen").click(function(e){
		e.preventDefault();
		prepararGenDatos();
		$("#CreateXLSGenForm").attr("action",urlExportGenXLS);
		$("#CreateXLSGenForm").submit();
	});
	//BOTON REPORTE VALORIZADO
	$("#xlsvalorizadogen").click(function(e){
		e.preventDefault();
		date02 = new Date($("#date01").datepicker("getDates"));
		tablakardexval = $.ajax({
	        url: base_url+"logistica/servicios/get_kardex_rptvalorizado/"+fechaFormatoSQL(date02),
	        async: false
	    }).responseText;

		$('#table_kardexgenval').val(tablakardexval);
		$('#local').val('Local de Inicio de Sesión');
		$("#CreateXLSValForm").attr("action",urlExportValXLS);		
		$('#CreateXLSValForm').submit();
		$('#table_kardexgenval').val('');
	});
	
});