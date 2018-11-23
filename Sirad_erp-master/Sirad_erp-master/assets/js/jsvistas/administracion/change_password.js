$(document).ready(function(){
	$("#ProductoForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var badrequest = function()
	{
		location.reload();
	}

	var successpassword = function()
	{
		location.reload();
	}

	$("#btn-guardar").click(function(event){
		event.preventDefault();
		enviar($("#ChangePasswordForm").attr("action-1"),{formulario:$("#ChangePasswordForm").serializeObject()}, successpassword, badrequest);
	});
});