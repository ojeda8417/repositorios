$(document).ready(function(){
	
	var successCuadreCaja = function(){
		//location.reload(true);
		$.unblockUI({
		    onUnblock: function(){
				$("#CuadreCajaForm").reset();
				$("#saldo").val("");	
				//location.reload(true);			
				
			}
		})
	};

	$("#Cuadrar_caja").click(function(event){
		event.preventDefault();
		if($("#CuadreCajaForm").validationEngine('validate'))
			// para vefiricar console.log($("#CargoForm").serializeObject());
			$.blockUI({ 
				onBlock: function()
				{
					enviar($("#CuadreCajaForm").attr("action-1"),{formulario:$("#CuadreCajaForm").serializeObject()}, successCuadreCaja, null)
					
				}
			});
	});


});