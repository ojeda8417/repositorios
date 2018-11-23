$(document).ready(function(){
	$("#IngresoProductosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var SelectProductosData = new Array();
	var SelectDetalleCompraData = new Array();	
	var DataToSend = {};

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
		BuscarProductosTable = createDataTable2('select_producto_table',BuscarProOptions);
		//creamos data table orden pedido
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
		//creamos el datable detalle
		var IngProductosDetalleActions = new DTActions({
		'conf': '001',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
					var index = $(DetalleProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');					
					
					//DetalleProductosTable.fnDeleteRow(index);
			switch (parseInt(aData.band)){
				case 0:
					DetalleProductosTable.fnUpdate('<span class="label label-success">Activo</span>',index,4);
					aData.band = 1;
					break;
				case 1:
					DetalleProductosTable.fnUpdate('<span class="label label-danger">Eliminar</span>',index,4);
					aData.band = 0;
					//console.log(aData);
					break;
				case 2:
					DetalleProductosTable.fnDeleteRow(index); 
					//BuscarProductosTable.fnAddData(aData);
					break;
			} 
			}
		});	

		//para llamar al modal buscar producrtos
			$('#btn-buscar').click(function(e){
				e.preventDefault();
				$('#modalBuscarOrdPed').modal('show');
			});
			$('#btn-buscar-productos').click(function(e){
				e.preventDefault();
				$('#modalBuscarProducto').modal('show');
			});
			//agregar_detalle
		$('#select_ordped').click(function(event){
			event.preventDefault();
			$('#ordped').val(SelectDetalleCompraData[0].cProductoDesc);
			$('#cantidadd').val(SelectDetalleCompraData[0].nDetCompraCant);
			$('#modalBuscarOrdPed').modal('hide');
		});
		//para la seleccion
		$('#select_producto').click(function(event){
			event.preventDefault();
			$("#idProducto").val(SelectProductosData[0].nProducto_id);
			$('#producto').val(SelectProductosData[0].cProductoDesc);
			$('#precio_uni').val(SelectProductosData[0].nProductoPCosto);
			$('#modalBuscarProducto').modal('hide');
		});

	
		BuscarIngresoProductosdOptions = {
			"aoColumns":[
				{ "mDataProp": "nProducto_id"},
				{ "mDataProp": "nDetIngProdCant"},
				{ "mDataProp": "nDetIngProdPrecUnt"},
				{ "mDataProp": "nDetIngProdTot"},
				{ "mDataProp": "estadolabel"},			
		              ],
		"sDom":"t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
		"fnCreatedRow":IngProductosDetalleActions.RowCBFunction
		};
		DetalleProductosTable = createDataTable2('edit_ingresoproductos_table',BuscarIngresoProductosdOptions);
		
		//	Agregar a la tabla
		$('#agregar_producto').click(function(event){
			event.preventDefault();		
			$("#AgregarProductoForm").validationEngine('validate');
			SelectProductosData[0].nDetIngProdCant = $("#cantidad").val();
			SelectProductosData[0].nDetIngProdPrecUnt = $("#precio_uni").val();
			SelectProductosData[0].nDetIngProdTot = $("#cantidad").val() * $("#precio_uni").val();
			$(SelectProductosData).AddAttr("nDetIngProd_id", 0);
			$(SelectProductosData).AddAttr("estadolabel", "<span class='label label-success'>Activo</span>");
			$(SelectProductosData).AddAttr("band", 2);
			DetalleProductosTable.fnAddData(SelectProductosData);
			$("#cantidad").val("");
			$("#precio_uni").val("");
			$("#producto").val("");
			$("#idProducto").val("");		
			//console.log(BuscarProductosTable.fnGetData());
		});	
		$('#agregar_detalle').click(function(event){
			event.preventDefault();
			SelectDetalleCompraData[0].nDetOrdCompra = SelectDetalleCompraData[0].nDetCompra_id;
			SelectDetalleCompraData[0].cProductoDesc = $("#ordped").val();
			SelectDetalleCompraData[0].nDetIngProdCant = $("#cantidadd").val();
			SelectDetalleCompraData[0].nDetIngProdPrecUnt = $("#imported").val()/ $("#cantidadd").val();
			SelectDetalleCompraData[0].nDetIngProdTot = $("#imported").val();
			$(SelectDetalleCompraData).AddAttr("estadolabel", "<span class='label label-success'>Activo</span>");
			$(SelectDetalleCompraData).AddAttr("band", 2);
			$("#ordped").val("");
			$("#imported").val("");
			$("#cantidadd").val("");
			//$("#idProducto").val("");				
			DetalleProductosTable.fnAddData(SelectDetalleCompraData);
		});		

		//
		var successEditarProducto = function(){
		//alert("Hola Como estas");
		//$('#modalProductos').modal('hide');
		$(location).attr("href",base_url+"logistica/views/cons_ingresoproductos"); 
		DetalleProductosTable.fnReloadAjax()
		}
		//refrescar tabla
		var successEditarOferta = function(data){
			BuscarProductosTable.fnReloadAjax();
			DetalleProductosTable.fnReloadAjax();
		};	

		//editar
		$("#btn_enviar_cambios").click(function(event){
			event.preventDefault();
			if($("#RegistrarIngresoForm").validationEngine('validate'))
				enviar($("#RegistrarIngresoForm").attr("action-1"),{formulario:$("#RegistrarIngresoForm").serializeObject(),
				tabla: CopyArray(DetalleProductosTable.fnGetData(),["nProducto_id","nDetIngProdCant","nDetIngProdPrecUnt","nDetIngProdTot","band","nDetIngProd_id"])}, successEditarProducto, null)
				//console.log($("#RegistrarIngresoForm").serializeObject());
		});
});