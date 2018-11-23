$(document).ready(function(){
	$("#RegistrarOrdenCompraForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var SelectProveeedoresData = new Array();
	
	$(".SelectAjax").SelectAjax();
	
	function Suma(){
		igv = parseFloat($("#igv").val());
		descuento = parseFloat($("#descuento").val());	
		montototal = sumArraycol(OrdenCompraTable.fnGetData(),'nDetCompraImporte');
		
		subtotal = montototal * 100/(100 + igv);
		montodescuento = subtotal * descuento/100;
		subtdesc = subtotal - montodescuento;
		montoigv = subtdesc*(igv)/100;
		total = montoigv + subtdesc;
		$('#subtotal').val(subtotal.toFixed(2));
		$('#total').val(total.toFixed(2));
		$('#spanigv').text(montoigv.toFixed(2));
		$('#spandesc').text(-montodescuento.toFixed(2));
	}

	//creamos el datatable de proveedor
	var BuscarProOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "nProveedor_id"},
	              { "sWidth": "5%","mDataProp": "cProveedorRazSocial"},
	              { "sWidth": "5%","mDataProp": "cProveedorRuc"},
	              { "sWidth": "5%","mDataProp": "cProveedorTel"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectProveeedoresData)
	};


	BuscarProveedoresTable = createDataTable2('select_proveedor_table',BuscarProOptions);
	
	//CREAR EL DATATABLE DE ORDEN DE PEDIDO
	var SelectOrdenPedidoData = new Array();
	var BuscarOPOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "cProductoDesc"},
	              { "sWidth": "5%","mDataProp": "nomape"},
	              { "sWidth": "5%","mDataProp": "nDetOrdPedCant"},
	              { "sWidth": "5%","mDataProp": "nDetOrdPedCantAcept"},
	              { "sWidth": "5%","mDataProp": "CantFalta"},
	              { "sWidth": "5%","mDataProp": "dOrdPedFecReg"},
	              { "sWidth": "5%","mDataProp": "cProductoCodBarra"}	
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectOrdenPedidoData)
	};


	BuscarOrdenPedidoTable = createDataTable2('select_ordped_table',BuscarOPOptions);

	//CREAR EL DATATABLE DE PRODUCTOS
	var SelectProductosData = new Array();

	var BuscarProOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "nProducto_id"},
	              { "sWidth": "5%","mDataProp": "cProductoDesc"},
	              { "sWidth": "5%","mDataProp": "nProductoStock"}
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

	BuscarOrdenPedidodOptions = {
	"aoColumns":[
		{ "sWidth": "12%","mDataProp": "nOrdPed_id"},
		{ "sWidth": "12%","mDataProp": "cProductoDesc"},
		{ "sWidth": "12%","mDataProp": "nDetCompraCant"},
		{ "sWidth": "12%","mDataProp": "PrecioUnitario"},
		{ "sWidth": "12%","mDataProp": "nDetCompraImporte"},
		{ "sWidth": "12%","mDataProp": "dOrdPedFecReg"},			
	              ],
	//"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
	"fnCreatedRow":OrdenComprasActions.RowCBFunction
	};
	OrdenCompraTable = createDataTable2('productos_table',BuscarOrdenPedidodOptions);	

	/*******************************************/
	//llamar al modal proveedor
	$('#btn-reg').click(function(e){
		e.preventDefault();
		$('#modalBuscarProveedor').modal('show');
	});
	//llamar al modal pedido
	$('#btn-pedido').click(function(e){
		e.preventDefault();
		$('#modalBuscarOrdPed').modal('show');
	});
	//llamar al modal producto
	$('#btn-reg-producto').click(function(e){
		e.preventDefault();
		$('#modalBuscarProducto').modal('show');
	});
	//MOSTRAR PROVEEDOR AL SELECCIONAR EN EL MODAL
	$('#select_proveedor').click(function(event){
		event.preventDefault();
		$("#proveedor_id").val(SelectProveeedoresData[0].nProveedor_id);
		$('#proveedor').val(SelectProveeedoresData[0].cProveedorRazSocial);
		$('#modalBuscarProveedor').modal('hide');
	});

	//MOSTRAR PROVEEDOR AL SELECCIONAR EN EL MODAL
	$('#select_producto').click(function(event){
		event.preventDefault();
		$("#producto_id").val(SelectProductosData[0].nProducto_id);
		$('#producto').val(SelectProductosData[0].cProductoDesc);
		$('#modalBuscarProducto').modal('hide');
	});
	$('#select_producto').click(function(event){
		event.preventDefault();
		$("#producto_id").val(SelectProductosData[0].nProducto_id);
		$('#producto').val(SelectProductosData[0].cProductoDesc);
		$('#modalBuscarProducto').modal('hide');
	});
	$('#select_ordped').click(function(event){
		event.preventDefault();
		//$("#producto_id").val(SelectProductosData[0].nProducto_id);
		$('#id_pedido').val(SelectOrdenPedidoData[0].nOrdPed_id);
		$('#ordped').val(SelectOrdenPedidoData[0].cOrdPedSerie+" "+SelectOrdenPedidoData[0].cOrdPedNro+" - "+SelectOrdenPedidoData[0].cProductoDesc);
		$('#cantidadd').val(SelectOrdenPedidoData[0].nDetOrdPedCant);
		$('#modalBuscarOrdPed').modal('hide');
	});
	//agregar al detalle
	//	Agregar a la tabla
	$('#agregar_producto').click(function(event){
		event.preventDefault();
		SelectProductosData[0].nOrdPed_id = 0;
		SelectProductosData[0].cProductoDesc = $("#producto").val();
		SelectProductosData[0].nDetCompraCant = $("#cantidad").val();
		SelectProductosData[0].PrecioUnitario = 	$("#importe").val()/ $("#cantidad").val();
		SelectProductosData[0].nDetCompraImporte = $("#importe").val();
		SelectProductosData[0].dOrdPedFecReg = fechanow() ;
		OrdenCompraTable.fnAddData(SelectProductosData);
		$("#cantidad").val("");
		$("#precio_uni").val("");
		$("#producto").val("");
		$("#idProducto").val("");
		$("#importe").val("");
		Suma();
	});
	//	Agregar a la tabla
	$('#agregar_detalle').click(function(event){
		event.preventDefault();
		SelectOrdenPedidoData[0].nOrdPed_id = $("#id_pedido").val();
		SelectOrdenPedidoData[0].cProductoDesc = $("#ordped").val();
		SelectOrdenPedidoData[0].nDetCompraCant = $("#cantidadd").val();
		SelectOrdenPedidoData[0].PrecioUnitario = $("#imported").val()/ $("#cantidadd").val();
		SelectOrdenPedidoData[0].nDetCompraImporte = $("#imported").val();
		//SelectOrdenPedidoData[0].dOrdPedFecReg = fechanow() ;
		OrdenCompraTable.fnAddData(SelectOrdenPedidoData);
		//$("#cantidad").val("");
		//$("#precio_uni").val("");
		//$("#producto").val("");
		//$("#idProducto").val("");
		//$("#importe").val("");
		//console.log(IngresoProductosTable.fnGetData());
	});

	var prepararDatos = function()
	{
		var datoscompra = {
			formulario:$("#RegistrarOrdenCompraForm").serializeObject(),
			tabla: CopyArray(OrdenCompraTable.fnGetData(),["nDetOrdOrdPed","nDetCompraCant","nDetCompraImporte","nDetCompraPrecUnt","nProducto_id"])
		}
		return datoscompra;
	}

	var successOrdenCompra = function(){
		$.unblockUI({
            onUnblock: function(){
	            $(location).attr("href",base_url+"logistica/views/cons_ordencompra"); 
            } 
        });
	}

	//REGISTRAR ORDEN DE COMPRA
	$("#btn_enviar_ordcom").click(function(event){
		event.preventDefault();
		if ((document.getElementById("proveedor").value).length == 0)
			{
				$("#agregarproveedor").modal('show');
				return false;
			}
		else
			{
			if(OrdenCompraTable.fnSettings().fnRecordsTotal() > 0)
			{
				if($("#RegistrarOrdenCompraForm").validationEngine('validate'))
					$.blockUI({ 
						onBlock: function()
						{ 
							enviar($("#RegistrarOrdenCompraForm").attr("action-1"),prepararDatos(), successOrdenCompra, null);
						}
		        	});				
			}
			else
				$("#agregarproductos").modal("show");
		}

	});

	var urlExportCierreXLS = "extensiones/reportes_xls/formato_reporte_cuadrecaja.php";
	var urlExportCierrePDF = "extensiones/reportes_pdf/formato_reporte_cuadrecaja.php";

	$('#RegistrarOrdenCompraForm').change(function(){Suma();});

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

});