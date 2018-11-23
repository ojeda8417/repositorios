<?php

$archivo = $_FILES["upload"]['name'];
$tamano = $_FILES["upload"]['size'];
$tipo = $_FILES["upload"]['type'];


 if ($archivo != "") 
 {
        // guardamos el archivo a la carpeta files
         $destino =  "xls/".$archivo;
        if (copy($_FILES['upload']['tmp_name'],$destino)) 
		{
            $status = "Archivo subido: <b>".$archivo."</b>";
		?>
        <script language='JavaScript'>
       alert("ARCHIVO SUBIDO CON EXITO");
       //Mensaje de error
       window.location = "conf_uf.php"
       //redireccionamos
       </script>
		<?php	
        } 
		else {
            $status = "Error al subir el archivo";
        }
 
 }
 else 
 {
 $status = "Error al subir archivo";
 }

?>