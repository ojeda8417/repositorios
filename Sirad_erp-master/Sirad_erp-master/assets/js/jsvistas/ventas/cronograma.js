$(document).ready(function(){
	var ClientesOptions = {
		"aoColumns":[
				{ "mDataProp": "cClienteNom"},
				{ "mDataProp": "cClienteApe"},
				{ "mDataProp": "cClienteDNI"}, 
				{ "mDataProp": "nClienteLineaOp"},
				{ "mDataProp": "boton"}   
				],
		//"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",		
	};

	ClientesTable = createDataTable2('clientes_table',ClientesOptions);

	//CLIEN EN VER CREDITOS
	$('#btn-vercreditos').click(function(event){
	
	});
});