
$(document).ready(function(){

	$("#date01,#date02").val(fechaAhora());

	$('.btn-danger').click(function(){
		$("#EliminarOrdCompraAlert").modal('show');
	});
});