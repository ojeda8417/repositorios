$(document).ready(function(){

    var SelectClienteData = new Array();
    
	ClienteOptions = {
		"aoColumns":[
			{ "mDataProp": "name"},
			{ "mDataProp": "cClienteRuc"},
			{ "mDataProp": "cClienteTel"},		              
			{ "mDataProp": "cClienteDNI"}
		],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectClienteData)
	};
	var ClienteTable = createDataTable2('select_cliente_table',ClienteOptions);

	$('.btn-buscarc').click(function(event){
		event.preventDefault();
		$('#modalBuscarCliente').modal('show');
		UnselectRow("select_cliente_table");
	});

	$("#btn-select-cliente").click(function(event){
		event.preventDefault();
		var data = SelectClienteData[0];
		$('#cliente').val(data.name);
		$('#cliente_id').val(data.nCliente_id);
		$('#clienteR').text(data.name);
		$('#direccionR').text(data.cClientecDir);
		$('#rucR').text(data.cClienteRuc);
		$('#modalBuscarCliente').modal('hide');		
	});


});