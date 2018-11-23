$(document).ready(function(){

	var urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_prodminStock.php"
	var table_productos;
	var SelectProductoData = new Array();
	var ProdOptions = {
		"aoColumns":[
		              {"mDataProp": "CodBarra"},
		              {"mDataProp": "Producto"},
		              {"mDataProp": "UnidMedida"},
		              {"mDataProp": "Stock_Actual"},
		              {"mDataProp": "Stock_Minimo"},
		              {"mDataProp": "Stock_Maximo"}
		            ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductoData)
	};
	ProductosTable = createDataTable2('select_producto_table',ProdOptions);
	
	var Trabajadores = (getAjaxObject(base_url+"administracion/servicios/get_trabajadores_activos")).aaData;
	CloneAttr(Trabajadores, "cPersonalEmail", "value" );
	CloneAttr(Trabajadores, "cPersonalNom", "label");
	Trabajadores = CopyArray(Trabajadores, ["value","label"]);


	$('#email_to').tokenfield({
	  autocomplete: {
	    source: Trabajadores,
	    delay: 100
	  },
	  showAutocompleteOnFocus: true
	})


	var prepararDatos = function()
	{
		crearTabla();
		var datosCorreo = {
			table_productos: table_productos,
			trabajadoresId: $('#email_to').tokenfield('getTokensList')
		}
		return datosCorreo;
	}

	$('#btn_enviar_correo').click(function(event){
		event.preventDefault();
		$("#compose-modal").modal('hide');
		enviar($("#EnviarForm").attr("action-1"), prepararDatos(), successProdStock, null)
		console.log(prepararDatos());
	});	


	successProdStock = function(){		
	}	

	$('#select_producto').click(function(event){
		event.preventDefault();
		$("#producto_id").val(SelectProductoData[0].nProducto_id);
		$('#producto').val(SelectProductoData[0].cProductoDesc);		
	});

	var crearTabla = function()
	{
		table_productos = toHTML(crearTablaToArray("tclientes",
				['Código de Barra','Producto','Unidad Medida','Stock Actual','Stock Mínimo','Stock Máximo'],
				[	'style="width: 5%;" class="head" ','style="width: 25%;" class="head" ','style="width: 15%;" class="head" ',
					'style="width: 15%;" class="head" ','style="width: 15%;" class="head" ','style="width: 25%;" class="head" ',],
				['CodBarra','Producto','UnidMedida','Stock_Actual','Stock_Minimo','Stock_Maximo'],
				[	'style="width: 5%;" ','style="width: 25%;" ','style="width: 15%;" ',
					'style="width: 15%;" ','style="width: 15%;" ','style="width: 25%;" '],
					ProductosTable.fnGetData()));
	}

	$("#xlsutton").click(function(){
		
		crearTabla();
		$("#title").val("LISTA DE PRODUCTOS CON MÍNIMO DE STOCK");
		$("#table_productos").val(table_productos);
		$("#exportmodal").modal('show');				
		console.log(table_productos);
	});

	$("#compose-modal").on('hidden.bs.modal', function(){		
		var result = $('#email_to').tokenfield('getTokensList');
		$('#email_to').tokenfield('setTokens', [""]);
	});

	$("#xlsutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportXLS);
		$("#CreatePDFForm").submit();
		
	});



});
