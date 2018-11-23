	$(document).ready(function(){
		$(".SelectAjax").SelectAjax();
		$(".SelectAjaxTipo").SelectAjax();

		var urlExportXLS = base_url + "assets/extensiones/reportes_xls/formato_reporte_ventas.php";
		var urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_ventas.php";

		var VenTiendasOptions = {
		"aoColumns":[
				{ "mDataProp": "cVentaFecReg"},
				{ "mDataProp": "Vendedor"},
				{ "mDataProp": "Cliente"}, 
				{ "mDataProp": "tipo_pago"},
				{ "mDataProp": "SubTotal"} ,
				{ "mDataProp": "Descuento"}, 
				{ "mDataProp": "TipoIGV"} ,
				{ "mDataProp": "Total"} ,
				{ "mDataProp": "Acuenta"} ,
				{ "mDataProp": "Saldo"},
				{ "mDataProp": "Estado"}
				],
		"sDom":"t<'row'<'col-lg-6'i><'col-lg-6'p>>",		
	};

	VenTiendaTable = createDataTable2('ventas_table',VenTiendasOptions);

	$("#buscarfecha").click(function(event){
		var datosReporteVentas = getAjaxObjectPost($("#RepVentasForm").attr("action-1"),prepararDatospost());
		VenTiendaTable.fnClearTable();
		//console.log(datosReporteVentas);
		if (datosReporteVentas.length > 0);
			VenTiendaTable.fnAddData(datosReporteVentas);
	});	

	var prepararDatospost = function()
	{
		date1 = new Date($("#date01").datepicker("getDates"));
		date2 = new Date($("#date02").datepicker("getDates"));
		vendedor= $("#vendedor").val();
		cliente=$("#cliente").val();
		tipo=$("#selectTipoPag").val();
		estado=$("#estado").val();
		var datosventa = {
			date1:fechaFormatoSQL(date1),
			date2:fechaFormatoSQL(date2),
			vendedor: vendedor,
			cliente: cliente,
			tipo: tipo,
			estado: estado,
		}
		return datosventa;
	}


	/********************************************/
	var VenZonasOptions = {
		"aoColumns":[
				{ "mDataProp": "FecReg"},
				{ "mDataProp": "Tienda"},
				{ "mDataProp": "Cliente"}, 
				{ "mDataProp": "Cliente"},
				{ "mDataProp": "Cliente"},
				{ "mDataProp": "Cliente"},
				{ "mDataProp": "Cliente"},
				{ "mDataProp": "Cliente"},
				{ "mDataProp": "Cliente"},
				{ "mDataProp": "Cliente"} 
				],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",		
	};

	VenZonasTable = createDataTable2('ventas_table_zona',VenZonasOptions);

	$("#buscarfechazona").click(function(event){
		var datosReporteZonas = getAjaxObjectPost($("#RepVentasZonasForm").attr("action-1"),prepararDatospost());
		VenZonasTable.fnClearTable();
		console.log(datosReporteZonas);
		if (datosReporteZonas.length > 0);
			VenZonasTable.fnAddData(datosReporteZonas);
	});	

	var prepararDatosZona = function()
	{
		date1 = new Date($("#date01zona").datepicker("getDates"));
		date2 = new Date($("#date02zona").datepicker("getDates"));
		vendedor= $("#vendedorZona").val();
		cliente=$("#clienteZona").val();
		tipo=$("#selectTipoPag_byZona").val();
		estado=$("#estadoZona").val();
		var datoszona = {
			date1:fechaFormatoSQL(date1),
			date2:fechaFormatoSQL(date2),
			vendedor: vendedor,
			cliente: cliente,
			tipo: tipo,
			estado: estado,
		}
		return datoszona;
	}
	
	//REPORTES
		$("#btn-rpt-tienda").click(function(){
			var table_venta = toHTML(crearTablaToArray("tventas",
			['FECHA REGISTRO','VENDEDOR','CLIENTE','TIPO PAGO','SUB TOTAL','DESCUENTO','TIPO IGV','TOTAL','ACUENTA','SALDO','ESTADO'],
			[	'style="width: 10%;" class="head" ','style="width: 7%;" class="head" ','style="width: 10%;" class="head" ',
			'style="width:10%;" class="head" ','style="width: 10%;" class="head" ','style="width: 6%;" class="head" ',
			'style="width: 11%;" class="head" ','style="width: 8%;" class="head" ','style="width: 9%;" class="head" ','style="width: 8%;" class="head" ','style="width: 10%;" class="head" '],
			['cVentaFecReg','Vendedor','Cliente','tipo_pago','SubTotal','Descuento','TipoIGV','Total','Acuenta','Saldo','Estado'],
			[	'style="width: 10%;" ','style="width: 7%;" ','style="width: 10%;" ',
			'style="width: 10%;" ','style="width: 10%;" ','style="width: 6%;" ',
			'style="width: 11%;" ','style="width: 8%;" ','style="width: 9%;" ',
			'style="width: 8%;" ','style="width: 10%;" '],
			VenTiendaTable.fnGetData()));

			$("#title").val("REPORTE DE VENTAS DE TIENDA");
			$("#table_venta").val(table_venta);
			$("#exportmodal").modal('show');	
	});

	//REPORTE ZONAS
		$("#btn-rpt-zona").click(function(){
			var table_venta = toHTML(crearTablaToArray("tventas",
			['FECHA REGISTRO','TIENDA','CLIENTE','PRODUCTO','SERIE','CANT','DESCRIPCION','P COSTO','P VENTA CONTADO','P VENTA CREDITO'],
			[	'style="width: 8%;" class="head" ','style="width: 7%;" class="head" ','style="width: 14%;" class="head" ',
			'style="width:14%;" class="head" ','style="width: 10%;" class="head" ','style="width: 6%;" class="head" ',
			'style="width: 11%;" class="head" ','style="width: 11%;" class="head" ','style="width: 9%;" class="head" ',
			'style="width: 10%;" class="head" '],
			['FecReg','Tienda','Cliente','Producto','Serie','Cant','Desct','PrecioCosto','PrecioVentaContado','PrecioVentaCredito'],
			[	'style="width: 8%;" ','style="width: 7%;" ','style="width: 14%;" ',
			'style="width: 14%;" ','style="width: 10%;" ','style="width: 6%;" ',
			'style="width: 11%;" ','style="width: 11%;" ','style="width: 9%;" ',
			'style="width: 10%;" '],
			VenZonasTable.fnGetData()));

			$("#title").val("REPORTE DE VENTAS DE ZONA");
			$("#table_venta").val(table_venta);
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