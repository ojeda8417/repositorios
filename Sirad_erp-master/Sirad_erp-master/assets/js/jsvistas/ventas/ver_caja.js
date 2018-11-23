		$(document).ready(function(){

			$("#imprimir").click(function(e){
				e.preventDefault();
				$("#resumen_venta").printThis({
		        	importCSS: true
		         });
			});
		});