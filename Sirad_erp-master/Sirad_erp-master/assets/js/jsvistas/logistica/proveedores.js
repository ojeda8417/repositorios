$(document).ready(function(){
	$("#ProveedorForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	$(".SelectAjax").SelectAjax();
		var TipoProveedorTA = new DTActions({
		'conf': '010',
		'idtable': 'proveedores_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-proveedor").hide();
			$("#btn-editar-proveedor").show();
	  		$('#modalProveedores').modal('show');
	  		$("#ruc").val(aData.cProveedorRuc);
	  		$("#razonsocial").val(aData.cProveedorRazSocial);
	  		$("#telefono").val(aData.cProveedorTel);
	  		$("#email").val(aData.cProveedorEmail);
	  		$("#paginaweb").val(aData.cProveedorSitioWeb);
	  		$("#direccion").val(aData.cProveedorDirec);
	  		$("#ccorriente").val(aData.cProveedorCCorriente);
	  		$("#dirfiscal").val(aData.cProveedorDireccionFiscal);
	  		$("#fecInscripcion").val(aData.dProveedorFechaInscripcion);
	  		$("#inicioActividades").val(aData.dProveedorFechaInicioActividades);
	  		$("#comprobantePago").val(aData.nProveedorComprobantePago);
	  		//$("#stockmin").val(aData.nProductoStockMin);
	  		$("#codigo").val(aData.nProveedor_id);
		},
	});		


		TipoProveedorRowCBF = function(nRow, aData, iDisplayIndex){
		TipoProveedorTA.RowCBFunction(nRow, aData, iDisplayIndex);	
		};

		var ProveedoresOptions = {
		"aoColumns":[
			 		  { "mDataProp": "cProveedorRuc"},
		              { "mDataProp": "cProveedorRazSocial"},
		              { "mDataProp": "cProveedorDireccionFiscal"},
		              { "mDataProp": "cProveedorTel"},
		              { "mDataProp": "cProveedorEmail"},
		              { "mDataProp": "estadolabel"}
				],
		"fnCreatedRow": TipoProveedorTA.RowCBFunction
	};
	var TipoProveedorTable = createDataTable2('proveedores_table',ProveedoresOptions);

	var successProveedor = function(){
		$.unblockUI({
		    onUnblock: function(){
				//alert("Hola Como estas");
				$("#ProveedorForm").reset();
				TipoProveedorTable.fnReloadAjax()
			}
		});
	}

	$('#btn-reg').click(function(e){
	e.preventDefault();
	$('#modalProveedores').modal('show');
	});

	//validar ruc
	$(".btn-validar").click(function(e){
		e.preventDefault();
		ruc = $("#ruc").val();
		//alert(ruc);
		var datos=getAjaxObject(base_url+"logistica/servicios/getdata_from_ruc/"+ruc)
		if(datos.valido==1){
			$("#razonsocial").val(datos.nombre);
			$("#dirfiscal").val(datos.direccion);
			var tipo=datos.tipo;
			if(tipo=="SOCIEDAD ANONIMA CERRADA"){
				//$("#tipContribuyente").val(tipo);
				tipContribuyente[0].selected = true;
			}else{
				tipContribuyente[1].selected=true;
			}
			var estado=datos.estado;
		}
		else
		{
			$("#razonsocial").val("");
			$("#dirfiscal").val("");
			$('#ruc').validationEngine(
				'showPrompt',
				'Ruc Invalido',
				'error',
				"topLeft" ,
				true);

		}
		
		
	});

	//Registrar
	$("#btn-reg-proveedor").click(function(event){
		event.preventDefault();
		if($("#ProveedorForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalProveedores').modal('hide');
					//para vefiricar console.log($("#TipoIGV_Registrar").serializeObject());
					enviar($("#ProveedorForm").attr("action-1"),{formulario:$("#ProveedorForm").serializeObject()}, successProveedor, null)
				}
			});
	});
	$("#btn-editar-proveedor").click(function(event){
		event.preventDefault();
		if($("#ProveedorForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalProveedores').modal('hide');
					enviar($("#ProveedorForm").attr("action-2"),{formulario:$("#ProveedorForm").serializeObject()}, successProveedor, null)
				}
			});
	});

	//Modal verificar Acciones	
	$('#modalProveedores').on('hidden.bs.modal', function(){		
		$("#ProveedorForm").reset();
		$("#btn-reg-proveedor").show();
		$("#btn-editar-proveedor").hide();
	});


});