$(document).ready(function(){
	$("#IngresosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var TotalIngresos = 0;
	var TotalEgresos = 0;
	var TotalGeneral = 0;

	urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_ingresoegreso.php";
	urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_ingresoegreso.php";

	var Reporte_IngOptions = {
		"aoColumns":[
				{ "mDataProp": "Id"},
				{ "mDataProp": "CantVendida"},
				{ "mDataProp": "MontoFacturado"},
				{ "mDataProp": "MontoCobrado"},
				{ "mDataProp": "TipoVenta"},
				{ "mDataProp": "Concepto"},	
				{ "mDataProp": "Vendedor"},				    	  
				],

	"fnCreatedRow":function(nRow, aData, iDisplayIndex)
		{
			TotalIngresos += parseFloat(aData.MontoCobrado);
			$("#TotalIngresos").text(TotalIngresos);			
			$("#TotalGeneral").text(TotalIngresos - TotalEgresos);
		}
	};

	var Reporte_IngTable = createDataTable2('ingresos_table',Reporte_IngOptions);
	
	var Reporte_EgreOptions = {
		"aoColumns":[
				{ "mDataProp": "Id"},
				{ "mDataProp": "MontoCobrado"},
				{ "mDataProp": "TipoVenta"}, 
				{ "mDataProp": "Concepto"},
				{ "mDataProp": "Vendedor"},	    	  
				],	

	"fnCreatedRow":function(nRow, aData, iDisplayIndex)
		{
			TotalEgresos += parseFloat(aData.MontoCobrado);
			$("#TotalEgresos").text(TotalEgresos);
			//console.log(TotalEgresos);
			$("#TotalGeneral").text(TotalIngresos - TotalEgresos);
		}		
	};
	var Reporte_EgrTable = createDataTable2('egresos_table',Reporte_EgreOptions);
	
	$("#buscarfecha").click(function(event){
		event.preventDefault();
		TotalIngresos = 0;
		TotalEgresos = 0;		
		$("#TotalIngresos").text(0);
		$("#TotalGeneral").text(0);
		$("#TotalEgresos").text(0);
		date1 = new Date($("#date01").datepicker("getDates"));
		Reporte_IngTable.fnReloadAjax(base_url+"ventas/servicios/get_reporteIngEgre_byfecha/1/"+fechaFormatoSQL(date1));
		Reporte_EgrTable.fnReloadAjax(base_url+"ventas/servicios/get_reporteIngEgre_byfecha/0/"+fechaFormatoSQL(date1));
	});


	$("#pdfgen").click(function(){		
	
		table_ingresos = toHTML(crearTablaToArray("treporte",
			['ID','CANTIDAD VENDIDA','MONTO FACTURADO','MONTO COBRADO','TIPO VENTA','DESCRIPCION','VENDEDOR'],
			[	'style="width: 15%;" class="head" ','style="width: 14%;" class="head" ','style="width: 14%;" class="head" ','style="width: 14%;" class="head" ','style="width: 14%;" class="head" ',
				'style="width: 14%;" class="head" ','style="width: 15%;" class="head" '],
			['Id','CantVendida','MontoFacturado','MontoCobrado','TipoVenta','Concepto','Vendedor'],
			[	'style="width: 14%;" ','style="width: 14%;" ','style="width: 14%;" ',
				'style="width: 14%;" ','style="width: 14%;"','style="width: 14%;"','style="width: 15%;"'],
				Reporte_IngTable.fnGetData()));	

		tableegresos = toHTML(crearTablaToArray("treporte",
			['ID','MONTO COBRADO','TIPO VENTA','DESCRIPCION','VENDEDOR'],
			[	'style="width: 20%;" class="head" ','style="width: 20%;" class="head" ','style="width: 20%;" class="head" ',
				'style="width: 20%;" class="head" ','style="width: 20%;" class="head" '],
			['Id','MontoCobrado','TipoVenta','Concepto','Vendedor'],
			[	'style="width: 20%;" ','style="width: 20%;" ','style="width: 20%;" ',
				'style="width: 20%;" ','style="width: 20%;" '],
				Reporte_EgrTable.fnGetData()));

		total = 
			[				
				{'td1':'INGRESOS:','td2':$("#TotalIngresos").text()}, 
				{'td1':'EGRESOS:','td2':$("#TotalEgresos").text()},
				{'td1':'TOTAL:','td2':$("#TotalGeneral").text()}];		

		tablatotal = toHTML(crearTablaToArray("treporte",
				['DESCRIPCIÓN','MONTO'],
				['style="width: 20%;" class="head" ','style="width: 20%;" class="head" '],					
				['td1','td2'],						
				['style="width: 50%;" class="impar" ','style="width:50%;" '],
			total));

		$("#title").val("REPORTE INGRESOS/EGRESOS POR DÍA");
		$("#table_ingresos").val(table_ingresos);
		$("#table_egresos").val(tableegresos);	
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