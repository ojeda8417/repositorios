var urlES =  "js/es_ES.txt";
	$("#RegistrarPedidoForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var urlExportCierreXLS = "extensiones/reportes_xls/formato_reporte_cuadrecaja.php";
	var urlExportCierrePDF = "extensiones/reportes_pdf/formato_reporte_cuadrecaja.php";

	$('#lanza-cierremes').click(function(e){
		e.preventDefault();
		$('#modalcierremes').modal('show');
	});

	$('#btn-cierremes').click(function(){
		$('#modalcierremes').modal('hide');
		var ajax = $.ajax({
			url: "{{ path('dicars_logistica_servicio_cierremes',{'idlocal':''}) }}/"+2,
			dataType: "json",
			async: false
		});
		ajax.done(function(data){
			$('#aftercierremes').modal('show');
		});
	});
	
	$('#lanza-cuadrecaja').click(function(e){
		e.preventDefault();
		$('#modalcuadrecaja').modal('show');
	});

	$('#pdfcuadrecaja').click(function(e){
		e.preventDefault();
		$("#FormCuadreCaja").attr("action",urlExportCierrePDF);
		$('#FormCuadreCaja').submit();
		$('#table_cuadrecaja').val('');
		$('#modalcuadrecaja').modal('hide');
	});

	$('#xlscuadrecaja').click(function(e){
		e.preventDefault();
		$("#FormCuadreCaja").attr("action",urlExportCierreXLS);
		$('#FormCuadreCaja').submit();
		$('#table_cuadrecaja').val('');
		$('#modalcuadrecaja').modal('hide');
	});
	
	$(document).ready(function(){
		//DATATABLES
		var SelectProductosData = new Array();

		//creamos el datatable de proveedor
		var BuscarProOptions = {
		"aoColumns":[
		              { "sWidth": "5%","mDataProp": "cProductoDesc"},
		              { "sWidth": "5%","mDataProp": "nProductoStock"},
		              { "sWidth": "5%","mDataProp": "nProductoPCosto"}
		              //{ "sWidth": "5%","mDataProp": ""}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductosData)
		};

		ProductosTable = createDataTable2('select_producto_table',BuscarProOptions);
		//DATATABLE DETALLE
		//datatable del detalle de productos
		var DetalleProductosActions = new DTActions({
		'conf': '001',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
					var index = $(DetalleProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
					DetalleProductosTable.fnDeleteRow(index); 
			}
		});

		ProductosdOptions = {
		"aoColumns":[
			{ "sWidth": "12%","mDataProp": "cProductoCodBarra"},
			{ "sWidth": "12%","mDataProp": "cProductoDesc"},
			{ "sWidth": "12%","mDataProp": "nDetOrdPedCant"}
			//{ "sWidth": "12%","mDataProp": "nDetIngProdPrecUnt"}			
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":DetalleProductosActions.RowCBFunction
		};
		DetalleProductosTable = createDataTable2('productos_table',ProductosdOptions);	

		//llamar al modal BUSCAR PRODUCTOS
		$('#btn-productos').click(function(e){
			e.preventDefault();
			$('#modalBuscarProducto').modal('show');
		});
		
	//SELECCIONAR PRODUCTO EN EL MODAL
	$('#select_producto').click(function(event){
		event.preventDefault();
		$("#idProducto").val(SelectProductosData[0].nProducto_id);
		$('#producto').val(SelectProductosData[0].cProductoDesc);
		$('#modalBuscarProducto').modal('hide');
	});

			//agregar a la tabla
	$('#agregar_producto').click(function(event){
		event.preventDefault();
		SelectProductosData[0].nProducto_id = $("#idProducto").val();
		SelectProductosData[0].cProductoDesc = $("#producto").val();
		SelectProductosData[0].nDetOrdPedCant = $("#cantidad").val();
		//SelectProductosData[0].nProducto_id = $("#idProducto").val();
		DetalleProductosTable.fnAddData(SelectProductosData);
		$("#producto").val("");
		$("#idProducto").val("");
		$("#cantidad").val("");
	});

	var successIngresoProductos = function(){

	}

	$("#btn_enviar_pedido").click(function(event){
		event.preventDefault();
		if(DetalleProductosTable.fnSettings().fnRecordsTotal() > 0)
		{
			if($("#RegistrarPedidoForm").validationEngine('validate'))		
			enviar($("#RegistrarPedidoForm").attr("action-1"),{formulario:$("#RegistrarPedidoForm").serializeObject(),
			tabla: CopyArray(DetalleProductosTable.fnGetData(),["nProducto_id","nDetOrdPedCant"])}, successIngresoProductos, null);			
		}
		else
			$("#agregarproductos").modal('show');
	});


});