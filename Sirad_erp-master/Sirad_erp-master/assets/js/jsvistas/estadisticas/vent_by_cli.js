		
		 google.load("visualization", "1", {packages:["corechart"]});
	     google.setOnLoadCallback(drawChart);
	     var datos=getAjaxObject(base_url+"estadisticas/servicios/getVentas_ByClientes/");
	     console.log(datos);

	     function drawChart(datos) {
	     	
	        // Create the data table.
	        var data = new google.visualization.DataTable();
	        data.addColumn('string', 'Topping');
	        data.addColumn('number', 'Slices');
	        data.addRows([
	          [datos.cliente, datos.monto]									    
	        ]);
	        var options = {'title':'Ventas por Clientes',
	                       'width':600,
	                       'height':500};

	       var chart = new google.visualization.PieChart(document.getElementById('piechart'));
	       chart.draw(data, options);
	     }
$(document).ready(function(){		   

	     

      		    

});