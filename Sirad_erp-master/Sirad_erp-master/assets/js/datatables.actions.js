function DTActions(options)
{
	var divaction = $("<div class='actions'>");
	var divbubble = $("<div class='action-bubble'>");
	var divcontainer = $("<div class='action_container'>");
	var ul = $(getButtons(options));

	divaction.append(divbubble);
	divbubble.append(divcontainer);
	divcontainer.html(ul);

	var count = ul.find("li").length;

	switch(count)
	{
		case 1:
			divcontainer.css("height","28px");
			divbubble.css("height","36px");
			break;
		case 2:
			divcontainer.css("height","56px");
			divbubble.css("height","64px");
			break;
		case 3:
			divcontainer.css("height","86px");
			divbubble.css("height","94px");
			break;
	}

	this.RowCBFunction = function( nRow, aData, iDisplayIndex )
	{
    	$(nRow).click( function(e)
    	{
    		e.preventDefault();
    		var tr = $(this);
    		var tabla = $(tr.closest('table'));
    		divaction.find('.btn-action').tooltip('destroy');
    		divaction.find(".tooltip").remove();		
			if ( tr.hasClass('row_selected') ) {
	            tr.removeClass('row_selected');
	            divaction.remove();	            
	            IdReservaSelected = null;
	        }
			else {
				divaction.show();
				var tds = $(this).find("td");
				$(tabla.dataTable().fnGetNodes()).removeClass('row_selected');
	            tr.addClass('row_selected');
	            $(tds[tds.length-1]).append(divaction);

	            tr.find("button").removeAttr("disabled");

	            if( typeof options.view_condition != "undefined")
	            	if(!options.view_condition(nRow, aData, iDisplayIndex))
	            		ul.find(".btn-view").attr("disabled",true)

	            if( typeof options.edit_condition != "undefined")
	            	if(!options.edit_condition(nRow, aData, iDisplayIndex))
	            		ul.find(".btn-edit").attr("disabled",true)

	            if( typeof options.drop_condition != "undefined")
	            	if(!options.drop_condition(nRow, aData, iDisplayIndex))
	            		ul.find(".btn-drop").attr("disabled",true)

				ul.find(".btn-view").click(function(e){
					e.preventDefault();
					$(this).tooltip('destroy');
					options.ViewFunction(nRow, aData, iDisplayIndex);
				});
				ul.find(".btn-edit").click(function(e){
					e.preventDefault();				
					$(this).tooltip('destroy');
					options.EditFunction(nRow, aData, iDisplayIndex);	
				});
				ul.find(".btn-drop").click(function(e){	
					e.preventDefault();			
					$(this).tooltip('destroy'); 
					options.DropFunction(nRow, aData, iDisplayIndex);	
				});
				tr.find('[data-toggle="tooltip"]').tooltip({"placement":"top",delay: { show: 400, hide: 1 }});
        	}
		});
    };

}

function getButtons(options){
	actions = "<ul>";
	var view_tooltip = "Ver";
	var edit_tooltip = "Editar";
	var drop_tooltip = "Deshabilitar";
	var report1_icon = "glyphicon glyphicon-eye-open";
	var report2_icon = "glyphicon glyphicon-pencil"


	if(typeof options.view_tooltip != "undefined")
	view_tooltip = options.view_tooltip;

	if(typeof options.edit_tooltip != "undefined")
	edit_tooltip = options.edit_tooltip;

	if(typeof options.drop_tooltip != "undefined")
	drop_tooltip = options.drop_tooltip;

	if(typeof options.report1_icon != "undefined")
	report1_icon = options.report1_icon;

	if(typeof options.report2_icon != "undefined")
	report2_icon = options.report2_icon;

	if(options.conf.substring(0,1)==1)
	actions += '<li><button class="btn btn-default btn-sm btn-action btn-view" data-toggle="tooltip" data-placement="top" title="'+view_tooltip+'"><i class="'+report1_icon+'"></i></button></li>';
	if(options.conf.substring(1,2)==1)
	actions += '<li><button class="btn btn-default btn-sm btn-action btn-edit" data-toggle="tooltip" data-placement="top" title="'+edit_tooltip+'"><i class="'+report2_icon+'"></i></button></li>';
	if(options.conf.substring(2,3)==1)
	actions += '<li><button class="btn btn-default btn-sm btn-action btn-drop" data-toggle="tooltip" data-placement="top" title="'+drop_tooltip+'"><i class="glyphicon glyphicon-trash"></i></button></li>';
	actions += '<ul>';
	return actions;
}