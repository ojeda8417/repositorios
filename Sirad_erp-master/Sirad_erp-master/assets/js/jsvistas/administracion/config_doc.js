$(document).ready(function(){

	$(".SelectAjax").SelectAjax();

	$('#btn-reg').click(function(e){
		e.preventDefault();
		$('#modalConfigDoc').modal('show');
	});

	//DATATABLE CONFIGURACION DE DOCUMENTOS
	var Actions = new DTActions({
		'conf': '010',
		'idtable': 'configdoc_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-confdoc").hide();
			$("#btn-editar-confdoc").show();
	  		$("#modalConfigDoc").modal('show');
	  		$("#NumSerie").val(aData.cDocNumSerie);
	  		$("#TipDoc").val(aData.tipoComprobantes);
	  		$("#NumComp").val(aData.cDocNumComprobante);
	  		$("#estado").val(aData.cDocEstado);
	  		$("#codigo").val(aData.nConfDoc);
		},
	});

	var ConfDocOptions = {
		"aoColumns":[
			{ "mDataProp": "tipoComprobante"},
			{ "mDataProp": "cDocNumSerie"},
			{ "mDataProp": "cDocNumComprobante"},
		    { "mDataProp": "estadoLabel"}
				],
		"fnCreatedRow": Actions.RowCBFunction
	};
	var ConfDocTable = createDataTable2('configdoc_table',ConfDocOptions);


	var successConfDoc = function(){
		$.unblockUI({
		    onUnblock: function(){
				ConfDocTable.fnReloadAjax()
				$("#ConfigDocForm").reset();
			}
		})
	}


	$("#btn-reg-confdoc").click(function(event){
		event.preventDefault();
		if($("#ConfigDocForm").validationEngine('validate'))
			// para vefiricar console.log($("#CargoForm").serializeObject());
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalConfigDoc').modal('hide');
					enviar($("#ConfigDocForm").attr("action-1"),{formulario:$("#ConfigDocForm").serializeObject()}, successConfDoc, null)
			//$.blockUI({onOverlayClick: $.unblockUI}); 
				}
			});
	});

	//editar
	$("#btn-editar-confdoc").click(function(event){
		event.preventDefault();
		if($("#ConfigDocForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalConfigDoc').modal('hide');
					enviar($("#ConfigDocForm").attr("action-2"),{formulario:$("#ConfigDocForm").serializeObject()}, successConfDoc, null)
				}
			});
	});

});