$(document).ready(function(){
	$("#OfertasForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var SelectProductoData = new Array();

	var OfertaProductoActions = new DTActions({
		'conf': '001',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
			var index = $(OfertaProductoTable.fnGetData()).getIndexObj(aData,'nProducto_id');				
			switch (parseInt(aData.band)){
				case 0:
					OfertaProductoTable.fnUpdate('<span class="label label-success">Activo</span>',index,6);
					aData.band = 1;
					break;
				case 1:
					OfertaProductoTable.fnUpdate('<span class="label label-danger">Eliminar</span>',index,6);
					aData.band = 0;
					break;
				case 2:
					OfertaProductoTable.fnDeleteRow(index); 
					BuscarProdTable.fnAddData(aData);
					break;
			
			}
			
		}
	});

	var PrepararDatosOferta = function()
	{
		DataToSendOferta = {
			formulario:$("#OfertasForm").serializeObject(),
			tabla: OfertaProductoTable.fnSettings().fnRecordsTotal() > 0 ? CopyArray(OfertaProductoTable.fnGetData(),["nProducto_id","band","nOfertaProducto_id"]) : 0
		}
		return DataToSendOferta;
	};

	var successEditarOferta = function(data){
		$.unblockUI({
		    onUnblock: function(){
            	BuscarProdTable.fnReloadAjax();
				OfertaProductoTable.fnReloadAjax();
	            //$(location).attr("href",base_url+"administracion/views/ofertas"); 
	            $(location).attr("href",base_url+"administracion/views/ofertas"); 
            } 
        });
	}
	

	$('#btn-buscarproducto').click(function(event){
		event.preventDefault();
		$('#modalBuscarProducto').modal('show');
	});

	$('#btn_agregar_prod').click(function(event){
		event.preventDefault();
		$('#modalBuscarProducto').modal('hide');
		$(SelectProductoData).AddAttr("estadolabel", "<span class='label label-success'>Activo</span>");
		$(SelectProductoData).AddAttr("nOfertaProducto_id", 0);
		$(SelectProductoData).AddAttr("band", 2);
		OfertaProductoTable.fnAddData(SelectProductoData);
		SubTablaArray(BuscarProdTable,SelectProductoData,'nProducto_id');
		SelectProductoData.splice(0,SelectProductoData.length);
		UnselectRow("select_producto_table");
	});

	$("#enviar_editar").click(function(event){
	event.preventDefault();	
		if($("#OfertasForm").validationEngine('validate'))			
			$.blockUI({ 
				onBlock: function()
				{
					enviar($("#OfertasForm").attr("action-1"),PrepararDatosOferta(), successEditarOferta, null)
				}
				//$("#OfertasForm").show();
			});	
			
	});

	BuscarProdOptions = {
		"aoColumns":[
			{ "mDataProp": "cProductoCodBarra"},
			{ "mDataProp": "producto"},
			{ "mDataProp": "precio"},
			{ "mDataProp": "cMarcaDesc"},
			{ "mDataProp": "cConstanteDesc"},
			{ "mDataProp": "cCategoriaNom"}
		              ],
		"sDom":"t<'row'<'col-lg-6'i><'col-lg-6'p>>",
		"fnCreatedRow":getMultipleSelectRowCallBack(SelectProductoData)
	};	
	BuscarProdTable = createDataTable2('select_producto_table',BuscarProdOptions);

	OfertaProductosOption = {
		"aoColumns":[
			{ "mDataProp": "cProductoCodBarra"},
			{ "mDataProp": "producto"},
			{ "mDataProp": "precio"},
			{ "mDataProp": "cMarcaDesc"},
			{ "mDataProp": "cCategoriaNom"},
			{ "mDataProp": "cConstanteDesc"},
			{ "mDataProp": "estadolabel"}
		              ],
		"sDom":"t<'row'<'col-lg-6'i><'col-lg-6'p>>",
		"fnCreatedRow":OfertaProductoActions.RowCBFunction
	};
	OfertaProductoTable = createDataTable2('oferta_productos_table',OfertaProductosOption);
});