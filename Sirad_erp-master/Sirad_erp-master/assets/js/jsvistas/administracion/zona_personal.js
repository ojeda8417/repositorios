$(document).ready(function(){
	$("#ZonapersonalForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var Ubigeos = getAjaxObject($("#ZonapersonalForm").attr("data-source"));	
	cargarUbigeo(Ubigeos,"dist", "prov", "dep");

	var SelectZonaData = new Array();
	var SelectTrabajadorData = new Array();
	var DataToSend = {};

	//---btn de html
		$('.btn-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});

		$('.btn-zona').click(function(e){
			e.preventDefault();
			$('#modalBuscarZona').modal('show');
		}); 

		$('#btn-regreso').click(function(e){			
			$("#btn-trabajador").show();
			$("#btn-reg-usuario").show();
			$("#btn-editar-zona").hide();
		}); 

		$('#btn-reg-usuario').click(function(e){
			$("#ZonapersonalForm").reset();
		});
	
		$('#btn-editar-zona').click(function(e){
			$("#ZonapersonalForm").reset();
		});

    // fin de botones	

		$('#select_trabajador').click(function(event){
			event.preventDefault();
			$("#nombre_trabajador").val(SelectTrabajadorData[0].cPersonalNom+" "+ SelectTrabajadorData[0].cPersonalApe);
			$("#id_trabajador").val(SelectTrabajadorData[0].nPersonal_id);
			$('#modalBuscarTrabajador').modal('hide');
		});

		$('#select_zona').click(function(e){
			e.preventDefault();
			$("#nombre_zona").val(SelectZonaData[0].cZonaDesc);
			$("#id_zona").val(SelectZonaData[0].nZona_id);
			$('#modalBuscarZona').modal('hide');
		});


//---Inicio de Zonas
	var BuscarZOptions = {
		"aoColumns":[
		    { "sWidth": "40%","mDataProp": "cZonaDesc"},
		    { "sWidth": "30%","mDataProp": "des_ubigeo"}
		],
			"fnCreatedRow":getSimpleSelectRowCallBack(SelectZonaData)
	};
	
	BuscarZonasTable = createDataTable2('select_zona_table',BuscarZOptions);

    //Fin de Zonas
    function prepararDatos(){
			DataToSend = {
				formulario:$("#ZonapersonalForm").serializeObject(),
				zonas:CopyArray(SelectZonaData,["nZona_id"])
		};
	}


    //---Inicio de Trabajadores
	    var BuscarTOptions = {
			"aoColumns":[
			              { "sWidth": "12%","mDataProp": "cPersonalNom"},
			              { "sWidth": "12%","mDataProp": "cPersonalApe"},
			              { "sWidth": "12%","mDataProp": "cPersonalDNI"},
			              { "sWidth": "12%","mDataProp": "cPersonalTelf"}
			              ],
			"fnCreatedRow":getSimpleSelectRowCallBack(SelectTrabajadorData)
		};
		BuscarTrabajadorTable = createDataTable2('select_trabajador_table',BuscarTOptions);




  	var ZonPerTA = new DTActions({
		'conf': '011',
		'idtable': 'zonapersonal_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {		
			$("#btn-reg-usuario").hide();
			$("#btn-editar-zona").show();	
			$("#btn-regreso").show();
			$("#btn-trabajador").hide();
			$("#btn-cancelar").hide();
			$("#btn-eliminar").hide();
			$("#nombre_trabajador").val(aData.persona);
			$("#id_trabajador").val(aData.nPersonal_id);
			//$("#nombre_zona").val(aData.cZonaDesc);			
			$("#id_zona").val(aData.nZona_id);
	  		$("#idZonapersonal").val(aData.nZonaPersonal_id);
		},
		'DropFunction': function(nRow, aData, iDisplayIndex) {
			$('#modalEliminar').modal('show');						
	  		$("#idZonapersonal").val(aData.nZonaPersonal_id);
		} 

	}); 

	var successZonaPersonal = function(){
		$('#modalEliminar').modal('hide');
		ZonasPersonalTable.fnReloadAjax()
	}

  	$("#btn-reg-usuario").click(function(event){
		event.preventDefault();	
		if($("#ZonapersonalForm").validationEngine('validate'))
			enviar($("#ZonapersonalForm").attr("action-1"),{formulario:$("#ZonapersonalForm").serializeObject()}, successZonaPersonal, null)
	});

	$("#btn-editar-zona").click(function(event){
		event.preventDefault();
		if($("#ZonapersonalForm").validationEngine('validate'))
			enviar($("#ZonapersonalForm").attr("action-2"),{formulario:$("#ZonapersonalForm").serializeObject()}, successZonaPersonal, null)
	});

	$("#btn-eliminar-todo").click(function(event){
		event.preventDefault();
		if($("#ZonapersonalForm").validationEngine('validate'))
			enviar($("#ZonapersonalForm").attr("action-3"),{formulario:$("#ZonapersonalForm").serializeObject()}, successZonaPersonal, null)
	});

	

  	ZonPersRowCBF = function(nRow, aData, iDisplayIndex){
		ZonPerTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

  	var UrlaDTable = $("#zonapersonal_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "25%","mDataProp": "cZonaDesc"},
		              { "sWidth": "30%","mDataProp": "persona"},
		              { "sWidth": "45%","mDataProp": "des_ubigeo"},	    	              
		
		              ];

    ZonasPersonalTable = createDataTable('zonapersonal_table',UrlaDTable,FormatoDTable,null, ZonPersRowCBF);	       
	 
});
