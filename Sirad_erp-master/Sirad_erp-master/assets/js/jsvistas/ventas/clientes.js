$(document).ready(function(){
$(".SelectAjax").SelectAjax();
$("#ClienteForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
$("#ClienteForm1").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var Ubigeos = getAjaxObject($("#ClienteForm").attr("data-source"));
	cargarUbigeo(Ubigeos,"dist", "prov", "dep");

	var urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_clientes.php"
	var urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_clientes.php";

    //selector por clase 
	/*$(".ubigeo").change(function(){
		cargarZonas();
	});*/

	/*var cargarZonas = function(){
		var zonas=getAjaxObject(base_url+"administracion/servicios/get_ZonaByUbigeo/"+$("#dist").val());
		cargarSelect(zonas.aaData,"zonas","nZona_id","cZonaDesc");
	};
	cargarZonas();*/

	//tipo_contribuyente = $("#etipCont").val();	
		
		
	var ClientesTA = new DTActions({
	'conf': '010',
	'idtable': 'clientes_table',
	'EditFunction': function(nRow, aData, iDisplayIndex) {				
			$("#form_cliente").show();
			$("#form_empresa").hide();
			$("#btn-reg-clientes").hide();		
			$("#btn-editar-clientes").show();
			$('#modalClientes').modal('show');
			$("#regClien").hide();	
			$("#editClien").show();	
			$("#tipo_cliente").hide();
			$("#tipCliente").hide();
			$("#ruc").val(aData.cClienteRuc);
			$("#nombres").val(aData.cClienteNom);	
			$("#apellidos").val(aData.cClienteApe);
			$("#dni").val(aData.cClienteDNI);	
			$("#telefono").val(aData.cClienteTel);		
			$("#direccion").val(aData.cClientecDir);
			$("#referencia").val(aData.cClienteRef);
			$("#ocupacion").val(aData.cClienteOcup);	
			//$("#eruc").val(aData.cClienteRuc);
			//$("#erazonSocial").val(aData.cClienteRazonSocial);
			//$("#etelefono").val(aData.cClienteTel);
			//$("#edirfiscal").val(aData.cClientecDir);
			//$("#etipCont").val(aData.cClienteTipoContribuyente);
			$("#zonas").val(aData.nZona_id);	
			$("#lineaop").val(aData.nClienteLineaOp);	
			$("#idClientes").val(aData.nCliente_id);
			
			cargarUbigeo(Ubigeos,"dist", "prov", "dep",aData.nUbigeo_id);

		},
	});

 	var EmpresaTA = new DTActions({
 		'conf':'010',
 		'idtable' : 'empresa_table',
 		'EditFunction': function(nRow, aData,iDisplayIndex){
			$("#form_empresa").show();
			$("#form_cliente").hide();
			$("#btn-reg-empresa").hide();
			$("#btn-editar-empresa").show();
			$('#modalClientes').modal('show');
			$("#regClien").hide();	
			$("#editClien").show();
			$("#tipo_cliente").hide();
			$("#tipCliente").hide();
			$("#ruc").val(aData.cClienteRuc);
			$("#nombres").val(aData.cClienteNom);	
			$("#apellidos").val(aData.cClienteApe);
			$("#dni").val(aData.cClienteDNI);	
			$("#telefono").val(aData.cClienteTel);		
			$("#direccion").val(aData.cClientecDir);
			$("#referencia").val(aData.cClienteRef);  
			$("#ocupacion").val(aData.cClienteOcup);	
			$("#eruc").val(aData.cClienteRuc);
			$("#erazonsocial").val(aData.cClienteRazonSocial);
			$("#etelefono").val(aData.cClienteTel);
			$("#edirfiscal").val(aData.cClientecDir);
			$("#etipCont").val(aData.cClienteTipoContribuyentes);
			$("#zonas").val(aData.nZona_id);	
			$("#lineaop").val(aData.nClienteLineaOp);	
			$("#idEmpresa").val(aData.nCliente_id);
			cargarUbigeo(Ubigeos,"dist", "prov", "dep",aData.nUbigeo_id);
			//cargarZonas();
 		},

 	});	

   	ClientesRowCBF = function(nRow, aData, iDisplayIndex){
		ClientesTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var ClientesOptions = {
		"aoColumns":[
			{ "mDataProp": "cClienteNom"},
			{ "mDataProp": "cClienteApe"},
			{ "mDataProp": "cClienteDNI"},	
			{ "mDataProp": "cClienteTel"}
				],
		"fnCreatedRow": ClientesTA.RowCBFunction
	};
	var ClientesTable = createDataTable2('clientes_table',ClientesOptions);

	ClientesRowCBF = function(nRow, aData, iDisplayIndex){
		EmpresaTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var EmpresaOptions = {
		"aoColumns":[
			{ "mDataProp": "cClienteRuc"},
			{ "mDataProp": "cClienteRazonSocial"},
			{ "mDataProp": "cClientecDir"},	
			{ "mDataProp": "cClienteTipoContribuyente"}
				],
		"fnCreatedRow": EmpresaTA.RowCBFunction
	};
	var EmpresaTable = createDataTable2('empresa_table',EmpresaOptions);


	//--funcion de los botones

	$('#modalClientes').on('hidden.bs.modal', function(){		
		$("#ClienteForm").reset();
		$("#btn-reg-clientes").show();
		$("#btn-editar-clientes").hide();
	});

	$("#btn-reg-clientes").click(function(event){
		event.preventDefault();
		if($("#ClienteForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalClientes').modal('hide');
					enviar($("#ClienteForm").attr("action-1"),{formulario:$("#ClienteForm").serializeObject()}, successClientes, null);
				}
			});
	});

	$('#modalClientes').on('hidden.bs.modal', function(){		
		$("#ClienteForm1").reset();
		$("#btn-reg-empresa").show();
		$("#btn-editar-empresa").hide();
	});

	$("#btn-reg-empresa").click(function(event){
		event.preventDefault();
		if($("#ClienteForm1").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalClientes').modal('hide');
					enviar($("#ClienteForm1").attr("action-1"),{formulario:$("#ClienteForm1").serializeObject()}, successClientes, null);
				}
			});
	});


	$("#btn-editar-clientes").click(function(event){
		event.preventDefault();
		if($("#ClienteForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalClientes').modal('hide');
					enviar($("#ClienteForm").attr("action-2"),{formulario:$("#ClienteForm").serializeObject()}, successClientes, null);
				}
			});
	});

	$("#btn-editar-empresa").click(function(event){
		event.preventDefault();
		if($("#ClienteForm").validationEngine('validate'))
			$.blockUI({ 
				onBlock: function()
				{
					$('#modalClientes').modal('hide');
					enviar($("#ClienteForm1").attr("action-2"),{formulario:$("#ClienteForm1").serializeObject()}, successClientes, null);
					//console.log($("#ClienteForm1").serializeObject());
				}
			});
	});

	var successClientes = function(){
		$.unblockUI({
		    onUnblock: function(){
		    	$('#ClienteForm1').reset();
				EmpresaTable.fnReloadAjax();
				$('#ClienteForm').reset();
				ClientesTable.fnReloadAjax();
				//alert("HOLA");
			}
		});
	}

	//codigo del php anterior
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalClientes').modal('show');
		$('#form_cliente').show();
		$("#tipo_cliente").show();	
		$("#tipCliente").show();
		$("#regClien").show();
		tipo_cliente[0].selected = true;
		$("#editClien").hide();	
		$("#form_empresa").hide();
	});

	$("#pdfgen").click(function(){

	//ClientesRowCBF = function (){
		table_clientes = toHTML(crearTablaToArray("tclientes",
				['NOMBRE','APELLIDO','RUC','TELEFONO','DNI'],
				[	'style="width: 20%;" class="head" ','style="width: 20%;" class="head" ',
					'style="width: 20%;" class="head" ','style="width: 20%;" class="head" ','style="width: 20%;" class="head" ',],
				['cClienteNom','cClienteApe','cClienteRuc','cClienteTel','cClienteDNI'],
				[	'style="width: 20%;" ','style="width: 20%;" ',
					'style="width: 20%;" ','style="width: 20%;" ','style="width: 20%;" '],
					ClientesTable.fnGetData()));

		table_Empresas = toHTML(crearTablaToArray("tempresa",
				['RUC','RAZON SOCIAL','DIRECCION FISCAL','TIPO CONTRIBUYENTE','TELEFONO'],
				[	'style="width: 20%;" class="head" ','style="width: 20%;" class="head" ','style="width: 20%;" class="head" ',
					'style="width: 20%;" class="head" ','style="width: 20%;" class="head" '],
				['cClienteRuc','cClienteRazonSocial','cClientecDir','cClienteTipoContribuyente','cClienteTel'],
				[	'style="width: 20%;" ','style="width: 20%;" ','style="width: 20%;" ',
					'style="width: 20%;" ','style="width: 20%;" '],
					EmpresaTable.fnGetData()));
		//};
		$("#title").val("LISTA DE CLIENTES");
		$("#table_clientes").val(table_clientes);
		$("#table_empresas").val(table_Empresas);
		$("#exportmodal").modal('show');	
		console.log(table_clientes);
	});

	
	$("#pdfbutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportPDF);
		$("#CreatePDFForm").submit();
		$("#exportmodal").modal('hide');
	});

	$("#xlsutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportXLS);
		$("#CreatePDFForm").submit();
		$("#exportmodal").modal('hide');
	});
	  // fin

	  //validar ruc
	$("#btn_validar_cliente").click(function(e){
		e.preventDefault();
		ruc = $("#ruc").val();
		//alert(ruc);
		var datos=getAjaxObject(base_url+"logistica/servicios/getdata_from_ruc/"+ruc)
		if(datos.valido==1){
			$("#refRUC").val(datos.nombre);
			$("#direccion").val(datos.direccion);
			$("#estado").val(datos.estado);
			$("#nombres").val(datos.nombre);
			$("#direccion").val(datos.direccion);
			var tipo=datos.tipo;
			/*if(tipo=="SOCIEDAD ANONIMA CERRADA"){
				//$("#tipContribuyente").val(tipo);
				tipContribuyente[0].selected = true;
			}else{
				tipContribuyente[1].selected=true;
			}
			var estado=datos.estado;*/
		}
		else
		{

			$("#refRUC").val("");
			$("#nombres").val("");
			$("#direccion").val("");
			$('#ruc').validationEngine(
				'showPrompt',
				'Ruc Invalido',
				'error',
				"topLeft" ,
				true);
		}
	});


	$("#btn_validar_empresa").click(function(e){
		e.preventDefault();
		ruc = $("#eruc").val();
		//alert(ruc);
		var datos=getAjaxObject(base_url+"logistica/servicios/getdata_from_ruc/"+ruc)
		if(datos.valido==1){
			$("#erazonsocial").val(datos.nombre);
			$("#edirfiscal").val(datos.direccion);
			$("#eestado").val(datos.estado);
			$("#etipCont").val(datos.tipo);
			var tipo=datos.tipo;
			/*if(tipo=="SOCIEDAD ANONIMA CERRADA"){
				//$("#tipContribuyente").val(tipo);
				tipContribuyente[0].selected = true;
			}else{
				tipContribuyente[1].selected=true;
			}*/
			//var estado=datos.estado;
		}
		else
		{
			$("#erazonsocial").val("");
			$("#edirfiscal").val("");
			$("#etipCont").val("");
			$("#eestado").val("");
			//$("#eruc").val("");
			$('#ruc').validationEngine(
				'showPrompt',
				'Ruc Invalido',
				'error',
				"topLeft" ,
				true);
		}
	});

	$( "#tipo_cliente").change(function () {
  		if($("#tipo_cliente").val()==1){			
			$("#form_cliente").show();
			$("#form_empresa").hide();
		}
		else{
			$("#form_empresa").show();
			$("#form_cliente").hide();
			
			
		}

	});
     
	
});
