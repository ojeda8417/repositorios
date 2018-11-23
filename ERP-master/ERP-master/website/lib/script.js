// JavaScript Document

            $(document).ready(function(){
                fn_dar_eliminar();
				fn_cantidad();
                //$("#cod").validate();
            });
			
			function fn_cantidad(){
				cantidad = $("#grilla tbody").find("tr").length;
				$("#span_cantidad").html(cantidad);
			};
            
            function fn_agregar(){
                cadena = "<tr>";
                cadena = cadena + "<td>" + $("#cod").val() + "</td>";
                cadena = cadena + "<td>" + $("#glosa").val() + "</td>";
                cadena = cadena + "<td>" + $("#cant").val() + "</td>";
                //cadena = cadena + "<td>" + $("#valor_tres").val() + "</td>";
                cadena = cadena + "<td><a class='elimina'><img src='../img/delete.png' /></a></td>";
                $("#grilla tbody").append(cadena);
            /*
           aqui puedes enviar un conjunto de dados ajax para agregar al usuairo
           $.post("add_pedido.php", {id_pro: $("#cod").val(), nom_pro: $("#glosa").val()});
            */
                fn_dar_eliminar();
				fn_cantidad();
                alert("Producto Agregado");
            };
            
            function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    respuesta = confirm("Desea eliminar el producto: " + id);
                    if (respuesta){
                        $(this).parents("tr").fadeOut("normal", function(){
                            $(this).remove();
                            alert("Producto " + id + " eliminado")
                            /*
                                aqui puedes enviar un conjunto de datos por ajax
                                $.post("eliminar.php", {ide_usu: id})
                            */
                        })
                    }
                });
            };

             function fn_add_pedido(){
                 $.post("add_pedido.php", {id_pro: $("#cod").val(), nom_pro: $("#glosa").val(),cant: $("#cant").val()});

                 alert("Requerimiento Grabado en BD");
             };
