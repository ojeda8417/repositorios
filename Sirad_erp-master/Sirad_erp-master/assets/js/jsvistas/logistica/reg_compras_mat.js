$(document).ready(function(){
	$("#RegistrarOrdenMaterialesForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	//creamos el datatable de proveedor
	$(".SelectAjax").SelectAjax();

	function Suma(){
		igv = parseFloat($("#igv").val());
		descuento = parseFloat($("#descuento").val());	
		montototal = sumArraycol(OrdenMaterialesTable.fnGetData(),'nDetCompraImporte');
		
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

//Para Modal Proveedores
	var SelectProveeedoresData = new Array();

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

	$('#btn-reg').click(function(e){
		e.preventDefault();
		$('#modalBuscarProveedor').modal('show');
		//alert("hola");
	});


	$('#select_proveedor').click(function(event){
		event.preventDefault();
		$("#proveedor_id").val(SelectProveeedoresData[0].nProveedor_id);
		$('#proveedor').val(SelectProveeedoresData[0].cProveedorRazSocial);
		$('#modalBuscarProveedor').modal('hide');
	});


//Para Modal Materiales
	var SelectmaterialesData = new Array();

	var BuscarMatOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "nMaterial_id"},
	              { "sWidth": "5%","mDataProp": "cMaterialDesc"},
	              { "sWidth": "5%","mDataProp": "nMaterialCantidad"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectmaterialesData)
	};


	BuscarMaterialesTable = createDataTable2('select_materiales_table',BuscarMatOptions);

	$('#btn-reg-materiales').click(function(e){
			e.preventDefault();
			$('#modalBuscarmateriales').modal('show');
		});

	$('#select_materiales').click(function(event){
		event.preventDefault();
		$("#materiales_id").val(SelectmaterialesData[0].nMaterial_id);
		$('#materiales').val(SelectmaterialesData[0].cMaterialDesc);
		$('#modalBuscarmateriales').modal('hide');
	});

//Agregar a tabla Detalle Compra Materiales
	var OrdenMaterialesActions = new DTActions({
	'conf': '001',
	'DropFunction': function(nRow, aData, iDisplayIndex) {
				var index = $(OrdenMaterialesTable.fnGetData()).getIndexObj(aData,'nProducto_id');
				OrdenMaterialesTable.fnDeleteRow(index); 
		}
	});

	BuscarOrdenMaterialesOptions = {
	"aoColumns":[
		{ "sWidth": "12%","mDataProp": "nMaterial_id"},
		{ "sWidth": "12%","mDataProp": "cMaterialDesc"},
		{ "sWidth": "12%","mDataProp": "nDetCompraCant"},
		{ "sWidth": "12%","mDataProp": "nDetCompraPrecUnt"},
		{ "sWidth": "12%","mDataProp": "nDetCompraImporte"},
		{ "sWidth": "12%","mDataProp": "dOrdPedFecReg"},			
	              ],
	//"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
	"fnCreatedRow":OrdenMaterialesActions.RowCBFunction
	};

	OrdenMaterialesTable = createDataTable2('detalle_materiales_table',BuscarOrdenMaterialesOptions);	

	$('#agregar_producto').click(function(event){
		event.preventDefault();
		SelectmaterialesData[0].nMaterial_id = $("#materiales_id").val();;
		SelectmaterialesData[0].cMaterialDesc = $("#materiales").val();
		SelectmaterialesData[0].nDetCompraCant = $("#cantidad").val();
		SelectmaterialesData[0].nDetCompraPrecUnt = 	$("#importe").val()/ $("#cantidad").val();
		SelectmaterialesData[0].nDetCompraImporte = $("#importe").val();
		SelectmaterialesData[0].dOrdPedFecReg = fechanow() ;
		OrdenMaterialesTable.fnAddData(SelectmaterialesData);
		$("#cantidad").val("");
		$("#precio_uni").val("");
		$("#materiales").val("");
		$("#materiales_id").val("");
		$("#importe").val("");
		Suma();
	});


//REGISTRAR

	var prepararDatos = function()
	{
		var datoscompra = {
			formulario:$("#RegistrarOrdenMaterialesForm").serializeObject(),
			tabla: CopyArray(OrdenMaterialesTable.fnGetData(),["nDetCompraCant","nDetCompraImporte","nDetCompraPrecUnt","nMaterial_id"])
		}
		return datoscompra;
	}

	var successOrdenMateriales = function(){
		$.unblockUI({
            onUnblock: function(){
	            $(location).attr("href",base_url+"logistica/views/cons_ordencompra_mat"); 
            } 
        });
	}

	$("#btn_enviar_ordcom").click(function(event){
		event.preventDefault();
		if ((document.getElementById("proveedor").value).length == 0)
			{
				$("#agregarproveedor").modal('show');
				return false;
			}
		else
		{
			if(OrdenMaterialesTable.fnSettings().fnRecordsTotal() > 0)
			{
				if($("#RegistrarOrdenMaterialesForm").validationEngine('validate'))
					$.blockUI({ 
						onBlock: function()
						{ 
							//console.log($("#RegistrarOrdenMaterialesForm").serializeObject());
							enviar($("#RegistrarOrdenMaterialesForm").attr("action-1"),prepararDatos(), successOrdenMateriales, null);
						}
		        	});				
			}
			else
				$("#agregarproductos").modal("show");
		}
	});

	$('#RegistrarOrdenMaterialesForm').change(function(){Suma();});

});