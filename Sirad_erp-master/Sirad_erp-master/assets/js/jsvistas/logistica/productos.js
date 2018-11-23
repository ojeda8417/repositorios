$(document).ready(function(){
	$("#ProductoForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	//CARGAR MARCAS EN EL COMBO BOX	
	$(".SelectAjax").SelectAjax();

	var TipoProdTA = new DTActions({
		'conf': '010',
		'idtable': 'productos_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-prod").hide();
			$("#btn-editar-prod").show();
	  		$('#modalProductos').modal('show');
	  		$("#serie").val(aData.cProductoSerie);
	  		$("#talla").val(aData.cProductoTalla); 
	  		$("#categoria").val(aData.nCategoria_id); 
	  		$("#descripcion").val(aData.cProductoDesc);
	  		$("#tipprod").val(aData.nTipoProducto_id);
	  		$("#preciocosto").val(aData.nProductoPCosto);
	  		$('#precioventa').val(aData.nProductoPVenta);
	  		$("#stockmax").val(aData.nProductoStockMax);
	  		$("#stockmin").val(aData.nProductoStockMin);	
	  		$("#marca").val(aData.nMarca_id);	 		
	  		$("#codigo").val(aData.nProducto_id);
		},
	});	

	TipoProdRowCBF = function(nRow, aData, iDisplayIndex){
		TipoProdTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var ProductosOptions = {
		"aoColumns":[
			 		  { "mDataProp": "cProductoDesc"},
		              { "mDataProp": "cMarcaDesc"},
		              { "mDataProp": "cCategoriaNom"},
		              { "mDataProp": "cTipoProductoNom"},		              
		              { "mDataProp": "nProductoStock"},
		              { "mDataProp": "nProductoPCosto"},
		              { "mDataProp": "nProductoPVenta"},
		              { "mDataProp": "nProductoUnidMedida"},
		              { "mDataProp": "cProductoCodBarra"}
				],
		"fnCreatedRow": TipoProdTA.RowCBFunction
	};
	var TipoProductoTable = createDataTable2('productos_table',ProductosOptions);	              

	var successProducto = function(){
		$.unblockUI({
		    onUnblock: function(){
				//alert("Hola Como estas");
				$('#ProductoForm').reset();
				TipoProductoTable.fnReloadAjax();
			}
		});
	}

	/*function prepararDatos(){
			DataToSend = {
				formulario:$("#ProductoForm").serializeObject(),
				productos:CopyArray(SelectProductosData,["nProducto_id"])
				
				};
		} */


	//Llamar al modal Registrar-Modal
	$('#btn-reg').click(function(e){
	e.preventDefault();
	$('#modalProductos').modal('show');
	});
	//Registrar
	$("#btn-reg-prod").click(function(event){
		event.preventDefault();
		if($("#ProductoForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					//para vefiricar console.log($("#TipoIGV_Registrar").serializeObject());
					$('#modalProductos').modal('hide');
					enviar($("#ProductoForm").attr("action-1"),{formulario:$("#ProductoForm").serializeObject()}, successProducto, logdata);
				}
			});
	});
	//Editar
	$("#btn-editar-prod").click(function(event){
		event.preventDefault();
		if($("#ProductoForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalProductos').modal('hide');
					enviar($("#ProductoForm").attr("action-2"),{formulario:$("#ProductoForm").serializeObject()}, successProducto, logdata); 				}
			});
	});

	//Modal verificar Acciones	
	$('#modalProductos').on('hidden.bs.modal', function(){		
		$("#ProductoForm").reset();
		$("#btn-reg-prod").show();
		$("#btn-editar-prod").hide();
	});


	$("#categoria").change(function()
	{
		var valcar=$('#categoria').val();
		var tipo = getAjaxObject(base_url+"administracion/servicios/get_tipoproducto_bycategoria"+"/"+valcar);
		$("#tipprod").SelectAjax(tipo);
	})
});