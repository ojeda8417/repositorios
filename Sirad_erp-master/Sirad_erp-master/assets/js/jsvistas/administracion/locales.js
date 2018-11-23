$(document).ready(function(){
	$("#LocalesForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var Ubigeos = getAjaxObject($("#LocalesForm").attr("data-source"));
	cargarUbigeo(Ubigeos,"dist", "prov", "dep");

	$(".SelectAjax").SelectAjax();

	var TipoLocalesTA = new DTActions({
		'conf': '010',
		'idtable': 'locales_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-local").hide();
			$("#btn-editar-local").show();
	  		$('#modalLocales').modal('show');
	  		$("#regLocal").hide();	
	  		$("#editLocal").show();
	  		$("#nombre_tienda").val(aData.cLocalDesc);
	  		$("#direccion").val(aData.cLocalDirec);
	  		$("#telefono").val(aData.cLocalTelf);
	  		$("#estado").val(aData.nLocalEst);
	  		$("#tiprub").val(aData.nLocalTipRub);
	  		$("#idlocal").val(aData.nLocal_id);	  		
	  		cargarUbigeo(Ubigeos,"dist", "prov", "dep",aData.nUbigeo_id);
		},
	});

	TipoLocalesRowCBF = function(nRow, aData, iDisplayIndex){
		TipoLocalesTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var LocalOptions = {
		"aoColumns":[
			{ "mDataProp": "cLocalDesc"},		       
		    { "mDataProp": "cLocalTelf"},
		    { "mDataProp": "cLocalDirec"},
		    { "mDataProp": "cConstanteDesc"},
		   	{ "mDataProp": "estadolabel"}
				],
		"fnCreatedRow": TipoLocalesTA.RowCBFunction
	};
	var TipoLocalTable = createDataTable2('locales_table',LocalOptions);

		//mostrar Registrar Cliente------------------------------------>
	$('#btn-reg').click(function(e){
		e.preventDefault();
		$('#modalLocales').modal('show');
		$("#regLocal").show();	
		$("#editLocal").hide();
	});

	var successLocales = function(){
		//alert("Hola Como estas");
		$.unblockUI({
		    onUnblock: function(){
				$("#LocalesForm").reset();
				TipoLocalTable.fnReloadAjax()
			}
		});
	}

	//Registrar
	$("#btn-reg-local").click(function(event){
		event.preventDefault();
		if($("#LocalesForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
			//para vefiricar console.log($("#TipoIGV_Registrar").serializeObject());
					$('#modalLocales').modal('hide');
					enviar($("#LocalesForm").attr("action-1"),{formulario:$("#LocalesForm").serializeObject()}, successLocales, null)
				}
			});
	});

	//Editar
	$("#btn-editar-local").click(function(event){
		event.preventDefault();
		if($("#LocalesForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalLocales').modal('hide');
					enviar($("#LocalesForm").attr("action-2"),{formulario:$("#LocalesForm").serializeObject()}, successLocales, null)
				}
			});
	});

	//Modal verificar Acciones	
	$('#modalLocales').on('hidden.bs.modal', function(){		
		$("#LocalesForm").reset();
		$("#btn-reg-local").show();
		$("#btn-editar-local").hide();
	});

	});