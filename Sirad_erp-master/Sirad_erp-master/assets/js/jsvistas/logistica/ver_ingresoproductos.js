	
	$(document).ready(function(){
		console.log("Hola");
		//creamos el datable detalle
		var IngProductosDetalleActions = new DTActions({
		'conf': '000',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
					//var index = $(DetalleProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
					//DetalleProductosTable.fnDeleteRow(index);
			/*switch (parseInt(aData.band)){
				case 0:
					DetalleProductosTable.fnUpdate('<span class="label label-success">Activo</span>',index,4);
					aData.band = 1;
					break;
				case 1:
					DetalleProductosTable.fnUpdate('<span class="label label-important">Eliminar</span>',index,4);
					aData.band = 0;
					//console.log(aData);
					break;
				case 2:
					DetalleProductosTable.fnDeleteRow(index); 
					BuscarProductosTable.fnAddData(aData);
					break;
			} */
			}
		});

		BuscarIngresoProductosdOptions = {
		"aoColumns":[
			{ "sWidth": "5%","mDataProp": "Producto"},
			{ "sWidth": "12%","mDataProp": "nDetIngProdCant"},
			{ "sWidth": "12%","mDataProp": "nDetIngProdPrecUnt"},
			{ "sWidth": "12%","mDataProp": "nDetIngProdTot"}			
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		//"fnCreatedRow":IngProductosDetalleActions.RowCBFunction
		};
		DetalleProductosTable = createDataTable2('deting_productos_table',BuscarIngresoProductosdOptions);
	});