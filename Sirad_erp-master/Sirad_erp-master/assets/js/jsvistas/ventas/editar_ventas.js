$(document).ready(function(){
	var saldo = parseFloat($("#saldo_rest").text());

	var successPago = function(data)
	{
		console.log(data);
	};

	$("#pagar").click(function(e){
		e.preventDefault();
		var pago = parseFloat($("#amortizacion").val());
		var monto = 0;
		var saldoT = saldo - pago;
		if(saldoT < 0)
			monto = saldo;
		else
			monto = pago;
		$("#pagofinal").val(monto);
		$("#mensaje_pago").text("Desea realizar el pago de: S/."+monto);
		$("#PagarModal").modal('show');
	});

	$("#btn_enviar").click(function(e){
		e.preventDefault();
		$.blockUI({ 
	    	message: "Registrando...",
	    	css: { padding: '10px' }, 
	    	timeout:   2000, 
			onBlock: function() {
				enviar($("#PagarForm").attr("action-1"),{"formulario":$("#PagarForm").serializeObject()},successPago,null);
				$("#PagarModal").modal('hide');
        	}
		});
	});
});