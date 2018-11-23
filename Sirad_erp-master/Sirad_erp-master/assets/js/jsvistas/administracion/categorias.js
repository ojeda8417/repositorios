
$(document).ready(function(){
	$("#EnviarCategoriaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	$("#EnviarTipoForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	$(".SelectAjax").SelectAjax();
	$('#rootwizard').bootstrapWizard({
	});

	var Actions = new DTActions({
		'conf': '010',
		'idtable': 'categorias_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#editar_cat").show();
			$("#registrar_cat").hide();			
	  		$("#nom_categoria").val(aData.cCategoriaNom);
	  		$("#desc_categoria").val(aData.cCategoriaDesc);
	  		$("#selectEstado").val(aData.cCategoriaEst);
	  		$("#idCategoria").val(aData.nCategoria_id);
		},
	});

	RowCBFCategorias = function(nRow, aData, iDisplayIndex){
		Actions.RowCBFunction(nRow, aData, iDisplayIndex);
	};

	var ActionsTipo = new DTActions({
		'conf': '010',
		'idtable': 'tipo_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#editar_tipo").show();
			$("#registrar_tipo").hide();			
			$("#select_cat").val(aData.nCategoria_id);
	  		$("#desc_tipo").val(aData.cTipoProductoDesc);
	  		$("#nom_tipo").val(aData.cTipoProductoNom);
	  		$("#estado_tipo").val(aData.cTipoProductoEst)
	  		$("#idTipo").val(aData.nTipoProducto_id);
		},
	});

	RowCBFTipos = function(nRow, aData, iDisplayIndex){
			ActionsTipo.RowCBFunction(nRow, aData, iDisplayIndex);
		};

	var successCategoria = function(){
		$.unblockUI({
		    onUnblock: function(){
				$("#EnviarCategoriaForm").reset();
				TableCategorias.fnReloadAjax()
			}
		});
	}

	var successTipo = function(){
		$.unblockUI({
		    onUnblock: function(){
				$("#EnviarTipoForm").reset();
				TableTipo.fnReloadAjax()
			}			
		});

	}

	/*$('.btn-editar').click(function(e){
		e.preventDefault();
		$('#modalEditarDatos').modal('show');
	});

	//mostrar Buscar Cliente------------------------------------>
	$('#btn-reg').click(function(e){
		e.preventDefault();
		
	});*/

	//Registrar Categoría
	$("#registrar_cat").click(function(event){
		event.preventDefault();
		if($("#EnviarCategoriaForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{					
					enviar($("#EnviarCategoriaForm").attr("action-1"),{formulario:$("#EnviarCategoriaForm").serializeObject()}, successCategoria, null)
				}
			});
	});

    //Regitrar Tipo
	$("#registrar_tipo").click(function(event){
		event.preventDefault();
		if($("#EnviarTipoForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{

					enviar($("#EnviarTipoForm").attr("action-1"),{formulario:$("#EnviarTipoForm").serializeObject()}, successTipo, null)
				}
			});
	});

	//EDITAR CATEGORIA
	$("#editar_cat").click(function(event){
		event.preventDefault();
		$("#registrar_cat").show();
		$("#editar_cat").hide();
		if($("#EnviarCategoriaForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					enviar($("#EnviarCategoriaForm").attr("action-2"),{formulario:$("#EnviarCategoriaForm").serializeObject()}, successCategoria, null)
				}
			});
	});

	//EDITAR TIPO
	$("#editar_tipo").click(function(event){
		event.preventDefault();
		$("#registrar_tipo").show();
		$("#editar_tipo").hide();
		if($("#EnviarTipoForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					enviar($("#EnviarTipoForm").attr("action-2"),{formulario:$("#EnviarTipoForm").serializeObject()}, successTipo, null)
				}
			});
	});

	//Tabla Tipos
	var TipoOptions = {
		"aoColumns":[
			{ "mDataProp": "cCategoriaNom"},
			{ "mDataProp": "cTipoProductoNom"},
		    { "mDataProp": "cTipoProductoDesc"},
		    { "mDataProp": "estadoLabel"}
		              ],
		"fnCreatedRow": ActionsTipo.RowCBFunction
	};
	var TableTipo = createDataTable2('tipo_table',TipoOptions);
	
	//Tabla Categorias
	var CategoriaOptions = {
		"aoColumns":[
			{ "mDataProp": "cCategoriaNom"},
		    { "mDataProp": "cCategoriaDesc"},
		    { "mDataProp": "estadolabel"}
		              ],
		"fnCreatedRow": Actions.RowCBFunction
	};
	var TableCategorias = createDataTable2('categorias_table',CategoriaOptions);
});