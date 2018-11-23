$(document).ready(function(){
	$("#TipoMonedaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var TipoMonedaTA = new DTActions({
		'conf': '010',
		'idtable': 'tipomoneda_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-tipomoneda").hide();
			$("#btn-editar-tipomoneda").show();
	  		$('#modalTipoMoneda').modal('show');
	  		$("#desc_tipomoneda").val(aData.cTipoMonedaDesc);
	  		$("#monto").val(aData.nTipoMonedaMont);
	  		$("#selectEstado").val(aData.cTipoMonedaEst);
	  		$("#idTipoMoneda").val(aData.nTipoMoneda);
		},
	});

	TipoMonedaRowCBF = function(nRow, aData, iDisplayIndex){
		TipoMonedaTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};


	var TipoMonedaOptions = {
		"aoColumns":[
			{ "mDataProp": "cTipoMonedaDesc"},
		    { "mDataProp": "nTipoMonedaMont"},
		    { "mDataProp": "estadolabel"}
				],
		"fnCreatedRow": TipoMonedaTA.RowCBFunction
	};
	var TipoMonedaTable = createDataTable2('tipomoneda_table',TipoMonedaOptions);

    

 	var successTipoMoneda = function(){
 		$.unblockUI({
		    onUnblock: function(){
				$("#TipoMonedaForm").reset();
				TipoMonedaTable.fnReloadAjax()
			}
		});
	}


	$('#modalTipoMoneda').on('hidden.bs.modal', function(){		
		$("#TipoMonedaForm").reset();
		$('#modalTipoMoneda').modal('hide');
		$("#btn-reg-tipomoneda").show();
		$("#btn-editar-tipomoneda").hide();
	});

	$('#btn-reg').click(function(e){
		e.preventDefault();
		$('#modalTipoMoneda').modal('show');
	});

	$("#btn-reg-tipomoneda").click(function(event){
		event.preventDefault();
		if($("#TipoMonedaForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalTipoMoneda').modal('hide');
					enviar($("#TipoMonedaForm").attr("action-1"),{formulario:$("#TipoMonedaForm").serializeObject()}, successTipoMoneda, null)
				}
			});
	});
	$("#btn-editar-tipomoneda").click(function(event){
		event.preventDefault();
		if($("#TipoMonedaForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalTipoMoneda').modal('hide');
					enviar($("#TipoMonedaForm").attr("action-2"),{formulario:$("#TipoMonedaForm").serializeObject()}, successTipoMoneda, null)
				}
			});	
	})

	 
});