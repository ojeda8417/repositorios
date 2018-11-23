var urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_saldos.php";
$(document).ready(function(){
	//CREAMOS DATATABLE
	$("#SaldoInicialForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});	
	$("#SaldoActualForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var SaldoIniOptions = {
		"aoColumns": [
		              { "mDataProp": "Producto"},
		              { "mDataProp": "cMarcaDesc"},
		              { "mDataProp": "cCategoriaNom"},
		              { "mDataProp": "cConstanteDesc"},
		              { "mDataProp": "Stock"},
		              { "mDataProp": "PrecUnit"},
		              { "mDataProp": "PrecTotal"}
		              ],
		"sDom": "t<'row'<'col-xs-6'i><'col-xs-6'p>>"
	};
	var SaldoInicialTable = createDataTable2('saldoini_table',SaldoIniOptions);

	//creamos datatable de saldo actual
	var SaldoActOptions = {
		"aoColumns": [
		              { "mDataProp": "Producto"},
		              { "mDataProp": "cMarcaDesc"},
		              { "mDataProp": "cCategoriaNom"},
		              { "mDataProp": "cConstanteDesc"},
		              { "mDataProp": "Stock"},
		              { "mDataProp": "PrecUnit"},
		              { "mDataProp": "PrecTot"}
		              ],
		"sDom": "t<'row'<'col-xs-6'i><'col-xs-6'p>>"
	};
	var SaldoActualTable = createDataTable2('saldoactual_table',SaldoActOptions);

	//REPOTE INICIAL
	function prepararIniDatos(){
	var tablasaldos = toHTML(crearTablaToArray("tdetalle",
			['Año','Mes', 'Producto','Cantidad','Prec. Unitario','Prec. Total'],
			['style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 25%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" '],
			['Anio','Mes','Producto','Stock','PrecUnit','PrecTotal'],
			['style="width: 15%;"','style="width: 15%;"','style="width: 25%;"','style="width: 15%;"','style="width: 15%;"','style="width: 15%;"'],
			SaldoInicialTable.fnGetData()));

	var titulo = "Saldos Iniciales " + fechanow();

	var date01 = $("#fecSalInicial").val().split('/');
	var fecha = date01[2]+'-'+date01[1]+'-'+date01[0];
	
	$('#nombrearchivo').val('saldo_inicial_'+fecha);
	
	$('#tsaldos').val(tablasaldos);
	$('#titulo').val(titulo);
	}
	function prepararActDatos(){
	var tablasaldos = toHTML(crearTablaToArray("tdetalle",
			['Año','Mes', 'Producto','Cantidad','Prec. Unitario','Prec. Total'],
			['style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 25%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" '],
			['Anio','Mes','Producto','Stock','PrecUnit','PrecTot'],
			['style="width: 15%;"','style="width: 15%;"','style="width: 25%;"','style="width: 15%;"','style="width: 15%;"','style="width: 15%;"'],
			SaldoActualTable.fnGetData()));

	var titulo = "Saldos Actuales " + fechanow();
	
	var date02 = $("#date02").val().split('/');
	var fecha = date02[2]+'-'+date02[1]+'-'+date02[0];
	$('#nombrearchivo').val('saldo_actual_'+fecha);
	
	$('#tsaldos').val(tablasaldos);
	$('#titulo').val(titulo);
	}

		//Mandar la fecha
		$("#buscarfecha").click(function(event){
			dateSalInicial = new Date($("#fecSalInicial").datepicker("getDates"));
			SaldoInicialTable.fnReloadAjax($("#SaldoInicialForm").attr("action-1")+"/"+fechaFormatoSQL(dateSalInicial))
		});
		//Mandar la fecha
		$("#buscarfecha2").click(function(event){
			date2 = new Date($("#date02").datepicker("getDates"));
			SaldoActualTable.fnReloadAjax($("#SaldoActualForm").attr("action-1")+"/"+fechaFormatoSQL(date2))
		});

	//REPORTE DE SALDO INICIAL
		$("#xlsinigen").click(function(e){
			e.preventDefault();
			prepararIniDatos();
			$("#CreateXLSForm").attr("action",urlExportXLS);
			$("#CreateXLSForm").submit();
		});
		
		$("#xlsactualgen").click(function(e){
			e.preventDefault();
			prepararActDatos();
			$("#CreateXLSForm").attr("action",urlExportXLS);
			$("#CreateXLSForm").submit();
		});	

});