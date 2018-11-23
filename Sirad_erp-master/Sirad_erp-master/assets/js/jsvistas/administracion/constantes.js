$(document).ready(function(){
	$("#ConstanteForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	$(".SelectAjax").SelectAjax();

	var Actions = new DTActions({
		'conf': '010',
		'idtable': 'constantes_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-constante").hide();
			$("#btn-edit-constante").show();
	  		$("#modalConstante").modal('show');
	  		$("#regClase").hide();	
	  		$("#editClase").show();	
	  		$("#clase").val(aData.nConstanteClase);
	  		$("#nom_clase").val(aData.cConstanteDesc);
	  		$("#valor").val(aData.cConstanteValor);
	  		$("#idConstante").val(aData.nConstante_id);
		},
	});
	
	var CategoriasOptions = {
	"aoColumns":[
	              { "mDataProp": "nConstanteClase"},
	              { "mDataProp": "cConstanteDesc"},
	              { "mDataProp": "cConstanteValor"},
	              ],
	"fnCreatedRow":Actions.RowCBFunction
	};

	ConstanteTable = createDataTable2('constantes_table',CategoriasOptions);

		//mostrar Registrar Cliente------------------------------------>
	$('#btn-reg').click(function(e){
		e.preventDefault();
		$('#modalConstante').modal('show');
		$("#regClase").show();	
		$("#editClase").hide();	
	});
	
	var successCategoria = function(){
		$.unblockUI({
		    onUnblock: function(){
				ConstanteTable.fnReloadAjax()
		 	} 
        });
	}

	$('#modalConstante').on('hidden.bs.modal', function() {
		$("#ConstanteForm").reset();
		console.log('hola');
		$("#btn-reg-constante").show();
		$("#btn-edit-constante").hide();
	});

	$("#btn-reg-constante").click(function(event){
		event.preventDefault();
		if($("#ConstanteForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalConstante').modal('hide');
					enviar($("#ConstanteForm").attr("action-1"),{formulario:$("#ConstanteForm").serializeObject()}, successCategoria, null)
				}
			});
	});
	$("#btn-edit-constante").click(function(event){
		event.preventDefault();
		if($("#ConstanteForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalConstante').modal('hide');
					enviar($("#ConstanteForm").attr("action-2"),{formulario:$("#ConstanteForm").serializeObject()}, successCategoria, null)
				}
			});	
	});

	ConstanteTable.fnReloadAjax(base_url+"administracion/servicios/getConstantesByClase/"+$("#claseconstante").val());
	$("#clase").val($("#claseconstante").val());
	$("#claseconstante").change(function()
	{
		ConstanteTable.fnReloadAjax(base_url+"administracion/servicios/getConstantesByClase/"+$(this).val());
		$("#clase").val($("#claseconstante").val());
	})
});

