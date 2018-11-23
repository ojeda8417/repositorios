$(document).ready(function(){

	$(".SelectAjax").SelectAjax();

	$('#btn-reg').click(function(e){
		e.preventDefault();
		$('#modalMateriales').modal('show');
	});

	//DATATABLE MATERIAL
	var Actions = new DTActions({
		'conf': '010',
		'idtable': 'materiales_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-mat").hide();
			$("#btn-editar-mat").show();
	  		$("#modalMateriales").modal('show');
	  		$("#precio").val(aData.nMaterialPCosto);
	  		$("#cantidad").val(aData.nMaterialCantidad);
	  		$("#descripcion").val(aData.cMaterialDesc);
	  		$("#categoria").val(aData.nCategoria_id);
	  		$("#unimedida").val(aData.nMaterialUnidMedida);
	  		$("#marca").val(aData.nMarca_id);
	  		$("#codigo").val(aData.nMaterial_id);
	  		$("#estado").val(aData.cMaterialEst);
		},
	});

	var MaterialOptions = {
		"aoColumns":[
			{ "mDataProp": "cMaterialDesc"},
			{ "mDataProp": "cMarcaDesc"},
			{ "mDataProp": "cCategoriaNom"},
			{ "mDataProp": "nMaterialCantidad"},
			{ "mDataProp": "nMaterialPCosto"},
		    { "mDataProp": "cConstanteDesc"}
				],
		"fnCreatedRow": Actions.RowCBFunction
	};
	var MaterialTable = createDataTable2('materiales_table',MaterialOptions);


	var successMaterial = function(){
		$.unblockUI({
		    onUnblock: function(){
				MaterialTable.fnReloadAjax()
				$("#MaterialForm").reset();
			}
		})
	}


	$("#btn-reg-mat").click(function(event){
		event.preventDefault();
		if($("#MaterialForm").validationEngine('validate'))
			// para vefiricar console.log($("#CargoForm").serializeObject());
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalMateriales').modal('hide');
					enviar($("#MaterialForm").attr("action-1"),{formulario:$("#MaterialForm").serializeObject()}, successMaterial, null)
			//$.blockUI({onOverlayClick: $.unblockUI}); 
				}
			});
	});

	//editar
	$("#btn-editar-mat").click(function(event){
		event.preventDefault();
		if($("#MaterialForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalMateriales').modal('hide');
					enviar($("#MaterialForm").attr("action-2"),{formulario:$("#MaterialForm").serializeObject()}, successMaterial, null)
				}
			});
	});

});