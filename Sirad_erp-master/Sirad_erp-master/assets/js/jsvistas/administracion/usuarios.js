$(document).ready(function(){
	var SelectUsuarioData = new Array();
	var DataToSend = {};

	var SelectUsuarioData = new Array();
	var isEdit = false;
	var validate = true;
	var current_user = null
	var checkboxs = $('#rootwizard input:checkbox');

	$("#UsuarioForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000, promptPosition : "centerRight"});

	$('#rootwizard').bootstrapWizard({
		onTabClick: function(tab, navigation, index)
		{
		return false;
		},
		onNext: function(tab, navigation, index) 
		{
			if(!$("#UsuarioForm").validationEngine("validate"))
			{
				return false;
			}
		},
		onTabShow: function(tab, navigation, index){
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard').find('.bar').css({width:$percent+'%'});
			if($current >= $total)
			{
				$('#rootwizard').find('.pager .next').hide();
				$('#rootwizard').find('.pager .current').show();
				$('#rootwizard').find('.pager .current').removeClass('disabled');
			} 
			else 
			{
				$('#rootwizard').find('.pager .next').show();
				$('#rootwizard').find('.pager .finish').hide();
			}
		}
	});

	var UsuariosDTA = new DTActions({
		'conf': '011',
		'idtable': 'marcas_table',
		'EditFunction': function(nRow, aData, iDisplayIndex)
		{			
			clearForm();
			$('#btn-update-usuario').addClass("current");
			$('#btn-reg-usuario').removeClass("current");
			$("#btn-trabajador").hide();
			var groups = getAjaxObject(base_url+"administracion/servicios/get_groupsbyUser/"+aData.id);
			$(groups).each(function(index){
				$("#group"+this.id).iCheck('check');					
			});

			var locales = getAjaxObject(base_url+"administracion/servicios/get_LocalbyUser/"+aData.id);
			$(locales).each(function(index){
				$("#local"+this.nLocal_id).iCheck('check');					
			});

			$("#username").attr('readonly','true');
			$("#username").removeClass("validate[required]");
			$("#username").val(aData.username);
			$("#nombre_trabajador").val(aData.nomape);
			$("#nombre_trabajador").removeClass("validate[required]");
			$("#password").removeClass("validate[required]");
			$("#user_id").val(aData.id);
		},
		'DropFunction':function(nRow, aData, iDisplayIndex)
		{
			if(aData.active == "1")
			{
				$("#show_user").text(aData.nomape);
				current_user = aData.id;
				$("#comfir_desactivar").modal("show");
			}
			else
			{
				enviar($("#UsuarioForm").attr("action-3"),{user_id:aData.id}, successUsuario, null);
			}
		}
	});

	var successUsuario = function(data){
		console.log("hola");
		$.unblockUI({
		    onUnblock: function(){	
				UsuariosTable.fnReloadAjax();
				BuscarPersonalTable.fnReloadAjax();		
				$('#btn-reg-usuario').addClass("current");			
				$('#btn-update-usuario').removeClass("current");
				clearForm();
			}
		});
	};

	var successDesactive = function(data){
		UsuariosTable.fnReloadAjax();
		BuscarPersonalTable.fnReloadAjax();		
		$('#btn-reg-usuario').addClass("current");			
		$('#btn-update-usuario').removeClass("current");		
		clearForm();
		if(data.is_admin)
			$("#is_admin").modal("show");
	};

	var clearForm = function(data){			
		$('#rootwizard').bootstrapWizard('show',0);
		$("#UsuarioForm").reset();
		checkboxs.removeAttr('checked');
		checkboxs.iCheck('destroy');
		checkboxs.iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
	    });
		$("#username").removeAttr('readonly');
		$("#btn-trabajador").show();
		$("#username").addClass("validate[required]");
		$("#nombre_trabajador").addClass("validate[required]");
		$("#password").addClass("validate[required]");
	};


	$("#btn_cancelar").click(function(event){
		event.preventDefault();			
		$('#btn-reg-usuario').addClass("current");			
		$('#btn-update-usuario').removeClass("current");
		clearForm();
	});
	$("#btn_drop_usuario").click(function(event){
		event.preventDefault();
		enviar($("#UsuarioForm").attr("action-4"),{user_id:current_user}, successDesactive, null);
	});


	$('#select_trabajador').click(function(event){
		event.preventDefault();
		$("#trabajador").val(SelectUsuarioData[0].nPersonal_id);
		$("#email").val(SelectUsuarioData[0].cPersonalEmail);
		$('#nombre_trabajador').val(SelectUsuarioData[0].cPersonalNom+" "+SelectUsuarioData[0].cPersonalApe);
		$('#modalBuscarTrabajador').modal('hide');
	});
	//LLAMAR AL MODAL
	$('#btn-trabajador').click(function(event){
		event.preventDefault();
		$('#modalBuscarTrabajador').modal('show');
	});

	$('#btn-reg-usuario').click(function(event){
		event.preventDefault();
		if($("#UsuarioForm").validationEngine("validate"))
			$.blockUI({ 
				onBlock: function()
				{
					enviar($("#UsuarioForm").attr("action-1"),{formulario:$("#UsuarioForm").serialize()}, successUsuario, null);
				}
			});
	});

	$('#btn-update-usuario').click(function(event){
		event.preventDefault();
		if($("#UsuarioForm").validationEngine("validate"))
			$.blockUI({ 
				onBlock: function()
				{
					enviar($("#UsuarioForm").attr("action-2"),{formulario:$("#UsuarioForm").serialize()}, successUsuario, null);
				}
			});
	});

	var BuscarPersonalOptions = {
	"aoColumns":[
	              { "mDataProp": "cPersonalNom"},
	              { "mDataProp": "cPersonalApe"},
	              { "mDataProp": "cPersonalDNI"},
	              { "mDataProp": "cPersonalTelf"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectUsuarioData)
	};
	BuscarPersonalTable = createDataTable2('select_trabajador_table',BuscarPersonalOptions);

	var UsuarioOptions = {
	"aoColumns":[
				  {"mDataProp": "username"},	
	              {"mDataProp": "nomape"},		             
	              {"mDataProp": "ultimologin"},
	              {"mDataProp": "estadolabel"}
	              ],
	"fnCreatedRow":UsuariosDTA.RowCBFunction
	};
	UsuariosTable = createDataTable2('usuarios_table',UsuarioOptions);

});
	