$(document).ready(function(){
	$("#IngresoProductosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var SelectProductosData = new Array();
	var DataToSend = {};
	//CREAR EL DATATABLE DE ORDEN DE compra
	var SelectDetalleCompraData = new Array();
	var BuscarDetOrCompOptions = {
	"aoColumns":[
				  { "mDataProp": "cOrdComDocSerie"}, //serie numero
	              { "mDataProp": "cProductoDesc"},
	              { "mDataProp": "cPersonalNom"},
	              { "mDataProp": "OrdComFecReg"},
	              { "mDataProp": "nDetCompraCant"},	          
	              { "mDataProp": "nDetCompraImporte"}	
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectDetalleCompraData)
	};
	BuscarDetIngTable = createDataTable2('select_ordped_table',BuscarDetOrCompOptions);

	//CREAR EL DATATABLE DE PRODUCTOS
	var BuscarSelectProductosData = new Array();

	var BuscarProOptions = {
		"aoColumns":[
		              { "mDataProp": "cProductoCodBarra"},
		              { "mDataProp": "cProductoDesc"},
		              { "mDataProp": "nProductoStock"},
		              { "mDataProp": "nProductoPCosto"},
		              { "mDataProp": "nProductoUnidMedida"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductosData)
	};
	BuscarProductoTable = createDataTable2('select_producto_table',BuscarProOptions);

	//DATA TABLE DETALLE DE ORDEN DE COMPRAS
	var OrdenComprasActions = new DTActions({
	'conf': '001',
	'DropFunction': function(nRow, aData, iDisplayIndex) {
				var index = $(OrdenCompraTable.fnGetData()).getIndexObj(aData,'nProducto_id');
				OrdenCompraTable.fnDeleteRow(index); 
		}
	});

	DetIngProduOptions = {
	"aoColumns":[
		{ "mDataProp": "cOrdComDocSerie"},
		{ "mDataProp": "cProductoDesc"},
		{ "mDataProp": "nDetIngProdCant"},
		{ "mDataProp": "nDetIngProdPrecUnt"},
		{ "mDataProp": "nDetIngProdTot"},			
	              ],
	"fnCreatedRow":OrdenComprasActions.RowCBFunction
	};
	OrdenCompraTable = createDataTable2('productos_table',DetIngProduOptions);

	/*******************************************/
	//llamar al modal pedido
	$('#btn-reg').click(function(e){
		e.preventDefault();
		$('#modalBuscarOrdPed').modal('show');
	});
	//llamar al modal producto
	$('#btn-producto').click(function(e){
		e.preventDefault();
		$('#modalBuscarProducto').modal('show');
	});
	//MOSTRAR PROVEEDOR AL SELECCIONAR EN EL MODAL
	$('#select_producto').click(function(event){
		event.preventDefault();
		$('#producto').val(SelectProductosData[0].cProductoDesc);
		$('#importe').val(SelectProductosData[0].nProductoPCosto);
		$('#modalBuscarProducto').modal('hide');
	});

	$('#select_ordped').click(function(event){
		event.preventDefault();
		$('#ordped').val(SelectDetalleCompraData[0].cProductoDesc);
		$('#cantidadd').val(SelectDetalleCompraData[0].nDetCompraCant);
		$('#modalBuscarOrdPed').modal('hide');
	});

	//agregar al detalle
	//	Agregar a la tabla
	$('#agregar_producto').click(function(event){
		event.preventDefault();
		SelectProductosData[0].cOrdComDocSerie = 0;
		SelectProductosData[0].nDetOrdCompra = 0;
		SelectProductosData[0].cProductoDesc = $("#producto").val();
		SelectProductosData[0].nDetIngProdCant = $("#cantidad").val();
		SelectProductosData[0].nDetIngProdPrecUnt = 	$("#importe").val()/ $("#cantidad").val();
		SelectProductosData[0].nDetIngProdTot = $("#importe").val();
		SelectProductosData[0].OrdComFecReg = fechanow() ;
		OrdenCompraTable.fnAddData(SelectProductosData);
		$("#cantidad").val("");
		$("#precio_uni").val("");
		$("#producto").val("");
		$("#idProducto").val("");
		$("#importe").val("");
	});
	//	Agregar a la tabla
	$('#agregar_detalle').click(function(event){
		event.preventDefault();
		SelectDetalleCompraData[0].nDetOrdCompra = SelectDetalleCompraData[0].nDetCompra_id;
		SelectDetalleCompraData[0].cProductoDesc = $("#ordped").val();
		SelectDetalleCompraData[0].nDetIngProdCant = $("#cantidadd").val();
		SelectDetalleCompraData[0].nDetIngProdPrecUnt = $("#imported").val()/ $("#cantidadd").val();
		SelectDetalleCompraData[0].nDetIngProdTot = $("#imported").val();		
		OrdenCompraTable.fnAddData(SelectDetalleCompraData);
		$('#id_pedido').val("");
		$('#ordped').val("");
		$('#imported').val("");
		$('#cantidadd').val("");
	});

	var OfertaProductoActions = new DTActions({
	'conf': '001',
	'DropFunction': function(nRow, aData, iDisplayIndex) {
				var index = $(IngresoProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
				IngresoProductosTable.fnDeleteRow(index); 
		}
	});

	var prepararDatos = function()
	{
		var datosingreso = {
			formulario:$("#IngresoProductosForm").serializeObject(),
			tabla: CopyArray(OrdenCompraTable.fnGetData(),["nDetOrdCompra","nDetIngProdCant","nDetIngProdTot","nDetIngProdPrecUnt","nProducto_id"])
		}
		return datosingreso;
	}
	var successIngresoProductos = function(){
		$.unblockUI({
            onUnblock: function(){
	            $(location).attr("href",base_url+"logistica/views/cons_ingresoproductos"); 
            } 
        });
	}

	$("#enviar_ingreso_producto").click(function(event){
	event.preventDefault();
	if(OrdenCompraTable.fnSettings().fnRecordsTotal() > 0)
	{
		if($("#IngresoProductosForm").validationEngine('validate'))			
			$.blockUI({ 
				onBlock: function()
				{ 
					enviar($("#IngresoProductosForm").attr("action-1"),prepararDatos(), successIngresoProductos, null);
		
				}
    		});	
	}
		else
			$("#agregarproductos").modal("show");
	});

});