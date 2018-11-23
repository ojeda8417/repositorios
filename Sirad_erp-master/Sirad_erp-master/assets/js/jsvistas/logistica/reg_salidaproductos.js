$(document).ready(function(){
	$("#RegistrarSalidaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var SelectTrabajadoresData = new Array();
	var SelectProductoData = new Array();
	
	var BuscarTraOptions = {
		"aoColumns":[
		              { "mDataProp": "cPersonalNom"},
		              { "mDataProp": "cPersonalApe"},
		              { "mDataProp": "cPersonalDNI"},
		              { "mDataProp": "cPersonalTelf"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectTrabajadoresData)
	};
	BuscarTrabajadoresTable = createDataTable2('select_trabajador_table',BuscarTraOptions);
	//datatable de productos en la modal

	var BuscarProdOptions = {
		"aoColumns":[
		              {"mDataProp": "cProductoDesc"},
		              {"mDataProp": "nProductoStock"},
		              {"mDataProp": "nProductoPCosto"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductoData)
	};
	BuscarProductosTable = createDataTable2('select_producto_table',BuscarProdOptions);

	//datatable del detalle de productos
	var SalidaProductosActions = new DTActions({
	'conf': '001',
	'DropFunction': function(nRow, aData, iDisplayIndex) {
				var index = $(SalidaProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
				SalidaProductosTable.fnDeleteRow(index); 
		}
	});

	SalidaProductosdOptions = {
		"aoColumns":[
			{"mDataProp": "nProducto_id"},
			{"mDataProp": "cProductoDesc"},
			{"mDataProp": "DetSalProdCant"}
			//{ "sWidth": "12%","mDataProp": "nDetIngProdPrecUnt"}			
		              ],
		"sDom":"t<'row'<'col-lg-6'i><'col-lg-6'p>>",
		"fnCreatedRow":SalidaProductosActions.RowCBFunction
	};
	SalidaProductosTable = createDataTable2('salida_productos_table',SalidaProductosdOptions);	

	//llamar al modal
	$('#btn-trabajador').click(function(e){
		e.preventDefault();
		$('#modalBuscarTrabajador').modal('show');
	});

	//llamar al modal buscar productos
	$('#btn-productos').click(function(e){
		e.preventDefault();
		$('#modalBuscarProducto').modal('show');
	});

	$('#btn-buscar-trabajador').click(function(e){
		e.preventDefault();
		$('#modalBuscarTrabajador').modal('show');
	});

	//seleccionar un trabajador en el modal
	$('#select_trabajador').click(function(event){
		event.preventDefault();
		$("#solicitante_id").val(SelectTrabajadoresData[0].nPersonal_id);
		$('#solicitante').val(SelectTrabajadoresData[0].cPersonalNom+" "+SelectTrabajadoresData[0].cPersonalApe);
		$('#modalBuscarTrabajador').modal('hide');
	});

	$('#select_producto').click(function(event){
		event.preventDefault();
		var data = SelectProductoData[0];
		$('#cantidad').removeClass();
		$('#cantidad').addClass("form-control validate[required,custom[number],min[1],max["+data.nProductoStock+"]]");
		$("#producto_id").val(SelectProductoData[0].nProducto_id);
		$('#producto').val(SelectProductoData[0].cProductoDesc);
		
		$('#modalBuscarProducto').modal('hide');
	});

	//	Agregar a la tabla
	$('#btn-agregar-detalle').click(function(event){
		event.preventDefault();	
		if(!$("#cantidad").validationEngine("validate"))
		{		
			$("#AgregarProductoForm").validationEngine('validate');
			SelectProductoData[0].DetSalProdCant = $("#cantidad").val();
			SalidaProductosTable.fnAddData(SelectProductoData);
			$("#producto").val("");
			$("#producto_id").val("");
			$("#cantidad").val("");
		}
	});

		//
	var successSalidaProductos = function(){
		$.unblockUI({
            onUnblock: function(){
	            $(location).attr("href",base_url+"logistica/views/cons_salidaproductos"); 
            } 
        });
	}


	var prepararDatos = function()
	{
		var datosingreso = {
			formulario: $("#RegistrarSalidaForm").serializeObject(),
			tabla: CopyArray(SalidaProductosTable.fnGetData(),["nProducto_id","DetSalProdCant"])
		}
		return datosingreso;
	}

	$("#enviar_salida_producto").click(function(event){
		event.preventDefault();
		if (SalidaProductosTable.fnSettings().fnRecordsTotal() > 0)
		{
			if($("#RegistrarSalidaForm").validationEngine('validate'))
				$.blockUI({ 
					onBlock: function()
					{ 
						enviar($("#RegistrarSalidaForm").attr("action-1"),prepararDatos(), successSalidaProductos, null)
					}
	    		});	
		}
		else
			$("#agregarproductos").modal("show");
	});

	$('#btn-buscar-trabajador').click(function(e){
		e.preventDefault();
		$('#modalBuscarTrabajador').modal('show');
	});


});

	$(document).ready(function(){

		$('#btn-buscar-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});
	});

