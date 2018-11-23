$(document).ready(function(){
	$("#OfertasForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	//mostrar Registrar Trabajador------------------------------------>
	$('#btn-reg').click(function(event){
		event.preventDefault();
		$('#OfertaModal').modal('show');
	});
	//mostrar Editar Trabajador------------------------------------>
	$('#enviar_oferta_btn').click(function(event){
		event.preventDefault();
		if($("#OfertasForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#OfertaModal').modal('hide');	
					enviar($("#OfertasForm").attr("action-1"),{formulario:$("#OfertasForm").serializeObject()}, successOferta, null)
				}
			});
	});

	var Actions = new DTActions({
		'conf': '010',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			location.href = $("#OfertasForm").attr("action-2")+aData.nOferta_id;
		}
	});

	var successOferta = function(){
		$.unblockUI({
		    onUnblock: function(){
				$('#OfertasForm').reset();
				OfertasTable.fnReloadAjax();
			}
		});
	}

	OfertaOptions = {
		"aoColumns":[
		              { "mDataProp": "dOfertaFecVigente"},
		              { "mDataProp": "cOfertaDesc"},
		              { "mDataProp": "nOfertaPorc"},
		              { "mDataProp": "dOfertaFecVencto"},
		              { "mDataProp": "estadolabel"}
		              ],
		"sDom":"t<'row'<'col-xs-12'i><'col-xs-12 center'p>>",
		"fnCreatedRow":Actions.RowCBFunction
	};
	OfertasTable = createDataTable2('ofertas_table',OfertaOptions);
	
});