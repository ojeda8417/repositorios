$(document).ready(function(){

	var OrdenMaterialTA = new DTActions({
	'conf': '100',
	'idtable': 'ordmat_table',
	'ViewFunction':function(nRow, aData, iDisplayIndex){
		location.href = $("#OrdCompraMaterialesForm").attr("action-2")+"/"+aData.nOrdenComMat_id;
	}
	});

	OrdenMaterialRowCBF = function(nRow, aData, iDisplayIndex){
		OrdenMaterialTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var OrdMaterialOptions = {
		"aoColumns":[
			 		  { "mDataProp": "serieNummeroOrdMat"},
		              { "mDataProp": "OrdComMatFecReg"},
		              { "mDataProp": "cPersonalNom"},
		              { "mDataProp": "cProveedorRazSocial"},
		              { "mDataProp": "nOrdComMatTotal"},
		              { "mDataProp": "estadolabel"}
				],
		"fnCreatedRow": OrdenMaterialTA.RowCBFunction,
		"sDom": "t<'row'<'col-xs-6'i><'col-xs-6'p>>"
	};

	var OrdenMaterialTable = createDataTable2('ordmat_table',OrdMaterialOptions);

	$("#buscarfecha").click(function(event){
		date1 = new Date($("#date01").datepicker("getDates"));
		date2 = new Date($("#date02").datepicker("getDates"));
		OrdenMaterialTable.fnReloadAjax($("#OrdCompraMaterialesForm").attr("action-1")+"/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2));
		OrdenMaterialTable.reloadSigleFilter();
	});
});