$(document).ready(function(){
	$("#MarcaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var MarcasTA = new DTActions({
		'conf': '010',
		'idtable': 'marcas_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-marca").hide();
			$("#btn-editar-marca").show();
	  		$('#modalMarca').modal('show');
	  		$("#desc_marca").val(aData.cMarcaDesc);
	  		$("#selectEstado").val(aData.cMarcaEst);
	  		$("#idMarca").val(aData.nMarca_id);
		},
	});

	MarcasRowCBF = function(nRow, aData, iDisplayIndex){
		MarcasTA.RowCBFunction(nRow, aData, iDisplayIndex);
	};

	successMarca = function(){
		$.unblockUI({
		    onUnblock: function(){
		  		
				MarcasTable.fnReloadAjax();
			}
		});
	}
	

	//mostrar Buscar Cliente------------------------------------>
	$('#btn-reg').click(function(e){
		e.preventDefault();
		$('#modalMarca').modal('show');
	});

	var Marcasptions = {
		"aoColumns":[
			 { "mDataProp": "cMarcaDesc"},
	         { "mDataProp": "estadolabel"}
				],
		"fnCreatedRow": MarcasTA.RowCBFunction
	};
	var MarcasTable = createDataTable2('marcas_table',Marcasptions);

	$('#modalMarca').on('hidden.bs.modal', function(){
		$("#MarcaForm").reset();
		$("#btn-reg-marca").show();
		$("#btn-editar-marca").hide();
	});


	$("#btn-reg-marca").click(function(event){
		event.preventDefault();
		if($("#MarcaForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalMarca').modal('hide');
					enviar($("#MarcaForm").attr("action-1"),{formulario:$("#MarcaForm").serializeObject()}, successMarca, null)
				}
			});
	});
	$("#btn-editar-marca").click(function(event){
		event.preventDefault();
		if($("#MarcaForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalMarca').modal('hide');
					enviar($("#MarcaForm").attr("action-2"),{formulario:$("#MarcaForm").serializeObject()}, successMarca, null)
				}
			});
	});
});