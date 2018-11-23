
$(document).ready(function(){
	$("#SalProductosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var SalidaProductosTA = new DTActions({
		'conf': '100',
		'idtable': 'ingreso_productos_table',
		//'EditFunction': function(nRow, aData, iDisplayIndex) {
			//location.href = $("#IngProductosForm").attr("action-2")+aData.nOferta_id;
			//location.href = $("#IngProductosForm").attr("action-2")+"/"+aData.nIngProd_id;
			
		//},
		'ViewFunction':function(nRow, aData, iDisplayIndex){
			location.href = base_url+"logistica/Views/ver_salidaproductos/"+aData.nSalProd_id;
		}
	});
	SalidaProductosRowCBF = function(nRow, aData, iDisplayIndex){
		SalidaProductosTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	SalProdOptions = {
	"aoColumns":[
					  { "mDataProp": "SerieNum"},
		              { "mDataProp": "dSalProdFecReg"},
		              { "mDataProp": "registrador"},
		              { "mDataProp": "solicitante"},
		              { "mDataProp": "DescMotivo"},
		              { "mDataProp": "cSalProdObsv"},
		              { "mDataProp": "cLocalDesc"}
		              ],
	"fnCreatedRow":SalidaProductosTA.RowCBFunction,
	"sDom": "t<'row'<'col-xs-6'i><'col-xs-6'p>>"
	
	};
	SalidaProductosTable = createDataTable2('salida_prod_table',SalProdOptions);

	$("#buscarfecha").click(function(event){
		date1 = new Date($("#date01").datepicker("getDates"));
		date2 = new Date($("#date02").datepicker("getDates"));
		SalidaProductosTable.fnReloadAjax(base_url+"logistica/servicios/get_log_salprod/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2));
		SalidaProductosTable.reloadSigleFilter();
	});
});