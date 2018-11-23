$(document).ready(function(){
	var SelectProductoData = new Array();
	var SelectClienteData = new Array();
	var ResumenProductos = null;
	var totalcontado = 0;
	var totalcredito = 0;
	var formapago = null;
	var moneda = getAjaxObject(base_url+"administracion/servicios/getTipoMonedas").aaData;
	var tipoigv = getAjaxObject(base_url+"administracion/servicios/getTipoIGVActivo").aaData;
	//var opcionescredito=getAjaxObject(base_url+"administracion/servicios/getConstantesByClase/11").aaData;
	//var opcionescontado=getAjaxObject(base_url+"administracion/servicios/getConstantesByClase/12").aaData;	
	//var band=true;

	$("#fechaR").text(fechanow());
	
	
	$("#EnviarVentaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	$("#tipo_moneda").SelectAjax(moneda);
	$("#tipo_igv").SelectAjax(tipoigv);

	var  VentaUpdate = function(){	
		var des = $("#descuento").val();
		var current_moneda = $(moneda).getObjectFromIndex("nTipoMoneda", $("#tipo_moneda").val());
		var current_igv = $(tipoigv).getObjectFromIndex("nTipoIGV", $("#tipo_igv").val());
		var montomoneda = parseFloat(current_moneda.nTipoMonedaMont);
		var igv = parseInt(current_igv.nTipoIGVProc);
		var montodesc;
		var montoigv;
		var montoproductos;

		

		formapago = $("#forma_pago").val();	
		/*if(formapago == 1){		
			$("#tipo_doc").SelectAjax(opcionescontado);
		}else{		
			$("#tipo_doc").SelectAjax(opcionescredito);
		}*/
		
		if($("#tipo_moneda").val()==1)
			TipoMoneda = " - s/.";
		else{
			TipoMoneda = " - s/.";
			$("#resumen_dolares").show();
		}

		if(formapago == 1){
			$("#amortizacion").val(0);
			$("#saldo").val(0);
			$("#pagocont_block").show();
			$("#cuotas_block").hide();
			$("#saldo_block").hide();
			$("#resume-credito").hide();
			$("#lblTipoDocumentoContado").show();
			$("#tipo_doc_contado").show();
			$("#tipo_doc_credito").hide();
			$("#lblTipoDocumentoCredito").hide();
			montoproductos = totalcontado;
		}
		else{
			$("#saldo_block").show();
			$("#pagocont_block").hide();
			$("#resume-credito").show();
			$("#tipo_doc").show();
			$("#lblTipoDocumentoContado").hide();
			$("#tipo_doc_contado").hide();
			$("#tipo_doc_credito").show();
			$("#lblTipoDocumentoCredito").show();
			
			if(formapago == 2){
				UnselectRow("select_producto_table");
				$("#cuotas_block").show();
				//$("#tipo_doc").show();
				montoproductos = totalcontado;
			}

			else{
				$("#cuotas_block").hide();
				//$("#tipo_doc").show();
				montoproductos = totalcontado;
			}
		}
		
		montodesc = (montoproductos*des/100).toFixed(2);
		$("#subtotal").val((montoproductos*(100/(igv+100))*(100-des)/100).toFixed(2));
		montoigv = ($("#subtotal").val()*igv/100).toFixed(2);
		$("#total").val(($("#subtotal").val()*(100+igv)/100).toFixed(2));
		$("#saldo").val(($("#total").val() - $("#amortizacion").val()).toFixed(2));
		$("#spandesc").text("% "+TipoMoneda+" "+montodesc);
		$("#spanigv").text("% "+TipoMoneda+" "+montoigv);
		
		$("#spanamort").text(TipoMoneda);
		montocuota = $("#saldo").val()/$("#num_cuotas").val();
		montocuota = Math.ceil(montocuota*100)/100;
		$("#montocuota").val(montocuota);
		$("#spancouota").text("x "+TipoMoneda+" "+montocuota.toFixed(2));

		$("#forma_pagoR").text($("#forma_pago option:selected").text());
		$("#montoR").text(montodesc);
		$("#descuentoR").text(des+$("#spandesc").text());
		$("#subtotalR").text($("#subtotal").val());
		$("#tipo_igvR").text(igv+$("#spanigv").text());
		$("#totalR").text($("#total").val());
		$("#totalDo").text(($("#total").val()/montomoneda).toFixed(2));
		$("#amortizacionR").text($("#amortizacion").val());
		$("#saldoR").text($("#saldo").val());
		total = parseFloat($('#total').val());
		if(formapago == 1)
		{
			$("#importeR").text($("#importe").val());
			$("#vueltoR").text($("#vuelto").val());
			$("#montocuota").val(0);
			if($('#importe').val() >= total)
			{
				$('#vuelto').val(($('#importe').val() - total).toFixed(2));
				$("#amortizacion").val(total);
				$("#saldo").val(0);
			}
				
			else 
				$('#vuelto').val("0");
		}
	}

	var CargarTablaResumen = function(formapago){
		//ResumenProdTable.fnClearTable();
		Auxtable = VentaProdTable.fnGetData();
		ResumenProductos = new Array();
		CloneAttr(Auxtable,'nOfertaProductoPorc','nDetVentaDscto');
		if(formapago == 2)
			CloneAttr(Auxtable,'PrecioContado_Dscto','nDetVentaPrecUnt');
		else
			CloneAttr(Auxtable,'PrecioCredito_Dscto','nDetVentaPrecUnt');
		ResumenProductos  = $(Auxtable).CopyArray(["nProducto_id","cProductoCodBarra","cProductoDesc","nDetVentaCant","nDetVentaPrecUnt","nDetVentaDscto","cDetVentaDesc"]);
		$("#tabla_resumen_productos tbody").html("");
		$(ResumenProductos).each(function(index){
			var tr = "<tr><td>"+this.cProductoCodBarra+"</td><td>"+this.cProductoDesc+"</td><td>"+this.nDetVentaCant+"</td><td>"+this.nDetVentaPrecUnt+"</td></tr>";
			$("#tabla_resumen_productos tbody").append(tr);
		});
	};

	var ResumenRCBF = function(nRow, aData, iDisplayIndex)
	{
		aData.nDetVentaTot = (parseFloat(aData.nDetVentaPrecUnt)*parseFloat(aData.nDetVentaCant)).toFixed(2);
	};

	var VentaProdActions = new DTActions({
		'conf': '001',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
			var index = $(VentaProdTable.fnGetData()).getIndexObj(aData,'nProducto_id');
			VentaProdTable.fnDeleteRow(index);
			$("#total_contado").text(totalcontado = (sumArrayByAttr(VentaProdTable.fnGetData(),'nProductoPVenta','nDetVentaCant')).toFixed(2));
		}
	});

	$('#rootwizard').bootstrapWizard({
		onNext: function(tab, navigation, index) {
			switch (index)
			{
				case 1:
					if(VentaProdTable.fnSettings().fnRecordsTotal() == 0)
					{
						$("#rquiredproducts").modal('show');
						return false;
					}
					else
						VentaUpdate();
					break;
				case 2:
					CargarTablaResumen(formapago);
					if($("#EnviarVentaForm").validationEngine("validate"))
					{
						if(formapago == "1")
						{							
							if(parseFloat($("#total").val())>$('#importe').val())
							{
								$('#importe').validationEngine(
									'showPrompt',
									'El importe debe ser mayor que el total',
									'error',
									"topLeft" ,
									true);
								return false;
							}
						}
						if ((document.getElementById("cliente").value).length == 0)
						{
							$("#rquiredclients").modal('show');
							return false;
						}
					}
					else
						return false;
					break;
			}
		},
		onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
		
			// If it's the last tab then hide the last button and show the finish instead
			if($current >= $total) {
				$('#rootwizard').find('.pager .next').hide();
				$('#rootwizard').find('.pager .finish').show();
				$('#rootwizard').find('.pager .finish').removeClass('disabled');
			} else {
				$('#rootwizard').find('.pager .next').show();
				$('#rootwizard').find('.pager .finish').hide();
			}
		},
		onTabClick: function(tab, navigation, index)
		{
		return false;
		},
	});

    var unlockload = function(data)
    {
    	
    	$.unblockUI({
	    	onUnblock: function(){
	    		$("#view_impri").attr("action",base_url+"ventas/views/ver_ventas/"+data.id); 
    			$("#view_impri").submit();	    		
	            $(location).attr("href",base_url+"ventas/views/cons_ventas"); 
	        	
	        }
	    });
    };

	$(".SelectAjax").SelectAjax();

	var BuscarProdOptions = {
		"aoColumns":[
			{ "mDataProp": "cProductoCodBarra"},
			{ "mDataProp": "cProductoDesc"},
			{ "mDataProp": "nProductoPVenta"},			
			{ "mDataProp": "cMarcaDesc"},
			{ "mDataProp": "cCategoriaNom"},
			{ "mDataProp": "nProductoTipo"},
			{ "mDataProp": "nProductoUnidMedida"},			
			{ "mDataProp": "cDetVentaDesc"},
			{ "mDataProp": "nProductoStock"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductoData)
	};	
	var BuscarProdTable = createDataTable2('select_producto_table',BuscarProdOptions);

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

	var VentaProdOptions = {
		"aoColumns":[
			{ "mDataProp": "cProductoCodBarra"},
			{ "mDataProp": "cProductoDesc"},
			{ "mDataProp": "nDetVentaCant"},
			{ "mDataProp": "nProductoPVenta"}
		              ],		
		"sDom":"t",
		"fnCreatedRow":VentaProdActions.RowCBFunction
	};
	var VentaProdTable = createDataTable2('select_productos_venta',VentaProdOptions);

	var printResumen = function(){		
		$("#resumen_venta").printThis({importCSS: true});
		setTimeout(unlockload(), 2000);
	};

	var volverConsultar = function(){
		$(location).attr(base_url+"ventas/views/ventas");
	};

	var prepararDatos = function()
	{
		var datosVenta = {
			formulario:$("#EnviarVentaForm").serializeObject(),
			productos: CopyArray(ResumenProductos,["nProducto_id","nDetVentaCant","nDetVentaPrecUnt","nDetVentaDscto","nDetVentaTot","cDetVentaDesc"])
		}
		return datosVenta;
	}


	$('.btn-buscarp').click(function(event){
		event.preventDefault();
		$('#modalBuscarProducto').modal('show');
		UnselectRow("select_producto_table");
	});

	$('.btn-buscarc').click(function(event){
		event.preventDefault();
		$('#modalBuscarCliente').modal('show');
		UnselectRow("select_cliente_table");
	});

	$("#select_producto").click(function(event){
		event.preventDefault();
		var data = SelectProductoData[0];
		$('#cantidad').removeClass();
		$('#cantidad').addClass("form-control validate[required,custom[number],min[1],max["+data.nProductoStock+"]]");
		$('#precioventa').removeClass();
		$('#precioventa').addClass("form-control validate[required,custom[number],min[1],max["+data.nProductoPVenta+"]]");
		$('#unidadmedida').removeClass();
		$('#unidadmedida').addClass("form-control validate[required,custom[number],min[1],max["+data.nProductoUnidMedida+"]]");
		$('#producto').val(data.cProductoCodBarra);
		$('#cantidad').val("1");
		$('#modalBuscarProducto').modal('hide');
		$('#precioventa').val(data.nProductoPVenta);
		$('#unidadmedida').val(data.nProductoUnidMedida);
	});

	$("#agregar_producto").click(function(event){
		event.preventDefault();
		if(SelectProductoData.length > 0)
			if(!$("#cantidad").validationEngine("validate") && !$("#precioventa").validationEngine("validate"))
			{
				SelectProductoData[0].nDetVentaCant = $('#cantidad').val();
				SelectProductoData[0].nProductoPVenta = $('#precioventa').val();
				//SelectProductoData[0].PrecioCredito_Dscto = $('#modpcredito').val();
				VentaProdTable.fnAddData(SelectProductoData);
				$('#producto').val("");
				$('#cantidad').val("");
				$('#precioventa').val("");
				$('#unidadmedida').val("");
				SelectProductoData.splice(0,SelectProductoData.length);
				$("#total_contado").text(totalcontado = (sumArrayByAttr(VentaProdTable.fnGetData(),'nProductoPVenta','nDetVentaCant')).toFixed(2));
			}
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

	$("#EnviarVentaForm").change(function(event){
		event.preventDefault();
		VentaUpdate();
	});

	$("#btn-enviar-form").click(function(event){
		event.preventDefault();
		$.blockUI({ 
			onBlock: function() {
				enviar($("#EnviarVentaForm").attr("action-1"),prepararDatos(), unlockload, null);
			}
        });
	});

	$("#seriecommp").val();
});