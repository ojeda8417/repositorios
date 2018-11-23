$(document).ready(function(){
	var SelectPersonalData = new Array();
	var SelectClienteData = new Array();
	//DATATBLE DE PERSON AL
	var BuscarPersonalOptions = {
	"aoColumns":[
	              { "mDataProp": "cPersonalNom"},
	              { "mDataProp": "cPersonalApe"},
	              { "mDataProp": "cPersonalDNI"},
	              { "mDataProp": "cPersonalTelf"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectPersonalData)
	};
	BuscarPersonalTable = createDataTable2('select_trabajador_table',BuscarPersonalOptions);
	//DATATABLE CLIENTES
	var BuscarClientesOptions = {
	"aoColumns":[
	              { "mDataProp": "cClienteNom"},
	              { "mDataProp": "cClienteApe"},
	              { "mDataProp": "cClienteDNI"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectClienteData)
	};
	BuscarClienteTable = createDataTable2('select_cliente_table',BuscarClientesOptions);
	
	//LLAMAR AL MODAL
	$('#buscar-personal').click(function(event){
		event.preventDefault();	
		$('#modalBuscarPersonal').modal('show');
	});
	$('#buscar-cliente').click(function(event){
		event.preventDefault();	
		$('#modalBuscarCliente').modal('show');
	});
	//SELECCIONAR UN PERSONAL
	$('#select_trabajador').click(function(event){
			event.preventDefault();
			$('#fecha').val(fechanow());
			$("#id_personal").val(SelectPersonalData[0].nPersonal_id);
			$('#personal').val(SelectPersonalData[0].cPersonalNom+' '+SelectPersonalData[0].cPersonalApe);
			$('#modalBuscarPersonal').modal('hide');
	});
	$('#select_cliente').click(function(event){
			event.preventDefault();
			$("#id_cliente").val(SelectClienteData[0].nCliente_id);
			$('#cliente').val(SelectClienteData[0].cClienteNom+" "+SelectClienteData[0].cClienteApe);
			$('#modalBuscarCliente').modal('hide');
	});
	var successLineaCredito = function(){
		$("#cliente").val("");
		$("#id_cliente").val("");
		$("#fecha").val("");
		$("#id_personal").val("");
		$("#personal").val("");
		$("#monto").val("");
		}
	//registrar
	$("#btn-reg-lineacreditos").click(function(event){
		event.preventDefault();
		if($("#LineaCreditoForm").validationEngine('validate'))
			enviar($("#LineaCreditoForm").attr("action-1"),{formulario:$("#LineaCreditoForm").serializeObject()}, successLineaCredito, null)
	});

});