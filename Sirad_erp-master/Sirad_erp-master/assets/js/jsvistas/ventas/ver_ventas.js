$(document).ready(function(){

	$("#imprimir").click(function(e){
		e.preventDefault();
		$("#resumen_venta").printThis({
        	importCSS: true
         });
	});

	var successVentas = function(data)
	{
		console.log(data);
	};

	$('#btn_enviar_correo').click(function(event){
		event.preventDefault();
		$("#compose-modal").modal('hide');	
		enviar($("#EnviarForm").attr("action-1"),$("#EnviarForm").serializeObject(),successVentas,null);	
	});	
	
});