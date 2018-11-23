$(document).ready(function(){
	var nVenta_id = 0;

	$('.btn-elim').click(function(e){
		$('#modalAnular').modal('show');
	});
	$('#modal_caja').click(function(e){
		$('#rquiredproducts').modal('show');
	});

	$("#buscarfecha").click(function(event){
		event.preventDefault();
		date1 = new Date($("#date01").datepicker("getDates"));
		date2 = new Date($("#date02").datepicker("getDates"));
		VentasTable.fnReloadAjax(base_url + "ventas/servicios/getventas/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2));
		VentasTable.reloadSigleFilter();
	});

	var success = function(data){
		if(data.estadoCaja===1){
			VentasTable.fnReloadAjax();	
		}else{
			//$('#modal_caja').modal('show');
		}
	}

	var VentaActions = new DTActions({
		'conf': '111',
		'edit_condition':  function(nRow, aData, iDisplayIndex) {
			return aData.cVentaEst == "3";
		},
		'drop_condition':  function(nRow, aData, iDisplayIndex) {
			return aData.cVentaEst != "0";
		},
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			location.href = base_url+"ventas/views/editar_ventas/"+aData.nVenta_id;
		},
		'ViewFunction':function(nRow, aData, iDisplayIndex){
			location.href = base_url+"ventas/views/ver_ventas/"+aData.nVenta_id;
		},
		'DropFunction': function(nRow, aData, iDisplayIndex) {
			nVenta_id = aData.nVenta_id;
			$("#modalAnular").modal("show");
		},
		"edit_tooltip":"Pagar Separacion",
		"drop_tooltip": "Anular"
	});

	$("#btn-anular-venta").click(function(event){
		event.preventDefault();
		enviar(base_url+"ventas/ventas/anular",{"nVenta_id":nVenta_id},success,null);		
		$("#modalAnular").modal("hide");
	});

	var VentasOptions = {
		"aoColumns":[
			{ "mDataProp": "cVentaFecReg"},
			{ "mDataProp": "cClienteNom"},
			{ "mDataProp": "cPersonalNom"},
			{ "mDataProp": "tipo_pago"},
			{ "mDataProp": "cant_prod"},
			{ "mDataProp": "VentaTotal"},
			{ "mDataProp": "estadolabel"}
				],
		"fnCreatedRow": VentaActions.RowCBFunction,
		"sDom": "t<'row'<'col-xs-6'i><'col-xs-6'p>>"
	};
	var VentasTable = createDataTable2('ventas_table',VentasOptions);

});