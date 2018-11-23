$(document).ready(function(){
	var deudoresdetallados;
	var DeudoresTable;
	var urlExportXLS = base_url+ 'assets/extensiones/reportes_xls/formato_reporte_deudores.php';
	var urlExportPDF = base_url+'assets/extensiones/reportes_pdf/formato_reporte_deudores.php';


	var SelectCliMorososData = new Array();
		
	//Creamos datatable de el modal para buscar productos
	var CliMorososOptions = {
		"aoColumns":[
		              { "mDataProp": "id"},
		              { "mDataProp": "Cliente"},
		              { "mDataProp": "DNI"},
		              { "mDataProp": "Zona"},
		              { "mDataProp": "Direccion"},
		              { "mDataProp": "TotalCredito"},
		              { "mDataProp": "TotalPagoRealizado"},
		              { "mDataProp": "Saldo"},
		              { "mDataProp": "Estado"},
		              { "mDataProp": "Responsable"}
		              ],
		//"fnCreatedRow":getSimpleSelectRowCallBack(SelectCliMorososData)
		};

		ClientesMorososTable = createDataTable2('deudores_table',CliMorososOptions);
		
		deudoresdetallado = getAjaxObject(base_url + "ventas/Servicios/get_clientemorosos_detallado").aaData;
		//PREPARAR DATOS
			$("#pdfgen").click(function(){
				var tabla_clientes = toHTML(crearTablaToArray("tclientes",
				['ID','NOMBRE','DNI','ZONA','DIRECCIÓN','TOTAL CRÉDITO','TOTAL PAGO REALIZADO','SALDO','ESTADO','RESPONSABLE'],
				[	'style="width: 5%;" class="head" ','style="width: 20%;" class="head" ','style="width: 10%;" class="head" ',
				'style="width: 10%;" class="head" ','style="width: 10%;" class="head" ','style="width: 10%;" class="head" ',
				'style="width: 10%;" class="head" ','style="width: 5%;" class="head" ','style="width: 10%;" class="head" ',
				'style="width: 10%;" class="head" '],
				['id','Cliente','DNI','Zona','Direccion','TotalCredito','TotalPagoRealizado','Saldo','Estado','Responsable'],
				['style="width: 5%;" ','style="width: 20%;" ','style="width: 10%;" ',
				'style="width: 10%;" ','style="width: 10%;" ','style="width: 10%;" ',
				'style="width: 10%;" ','style="width: 5%;" ','style="width: 10%;" ',
				'style="width: 10%;" '],
				ClientesMorososTable.fnGetData()));

				$('#nombrearchivo').val("reporte_clientes_deudores_gen_");

				$("#title").val("LISTA DE CLIENTES DEUDORES GENERAL");
				$("#table_clientes").val(tabla_clientes);
				$("#exportmodal").modal('show');

			});

			//reporte detallado
				$("#pdfdet").click(function(){
					var tabla_clientes = toHTML(crearTablaToArray("tclientes",
					['NOMBRE','ID','FEC CRÉDITO','MONTO CRÉDITO OTORGADO','TOTAL PAGO REALIZADO','SALDO','FECHA FINALIZACIÓN','ESTADO','RESPONSABLE'],
					[	'style="width: 20%;" class="head" ','style="width: 10%;" class="head" ','style="width: 10%;" class="head" ',
					'style="width: 10%;" class="head" ','style="width: 10%;" class="head" ','style="width: 10%;" class="head" ',
					'style="width: 10%;" class="head" ','style="width: 10%;" class="head" ','style="width: 10%;" class="head" '	],
					['Cliente','id','FecVenta','TotalCredito','TotalPagoRealizado','Saldo','FecFinalizacion','Estado','Responsable'],
					[	'style="width: 20%;" ','style="width: 10%;" ','style="width: 10%;" ',
					'style="width: 10%;" ','style="width: 10%;" ','style="width: 10%;" ',
					'style="width: 10%;" ','style="width: 10%;" ','style="width: 10%;" '	],
					deudoresdetallado));

					$('#nombrearchivo').val("reporte_clientes_deudores_det_");

					$("#title").val("LISTA DE CLIENTES DEUDORES DETALLADO");
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