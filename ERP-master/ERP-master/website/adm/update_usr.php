<?php
$rut_edita= $_POST["rut"];
$clave_edita= $_POST["clave"];
$t_usr_edita= $_POST["sel_usr"];
$est_usr_edita= $_POST["sel_estado"];

include("../lib/conexion.php");
$Db=Conectarse();
// Updateamos en la BD usuario:

if ($est_usr_edita==9999){
$fec_baja= date("d/m/Y");
mysql_query("update usuario set fecha_baja='$fec_baja',estado='999' where usuario ='$rut_edita'",$Db);
mysql_close();
    ?>
    <script language='JavaScript'>
        //Mensaje de exito
        alert("BAJA DE USUARIO EXITOSA");
        //redireccionamos
        window.location = "man_usr.php"
    </script>
<?php

}
else{
$pass_usr= sha1($clave_edita);
mysql_query("update usuario set codigo_p='$t_usr_edita',password='$pass_usr',estado='$est_usr_edita' where usuario ='$rut_edita'",$Db);
mysql_close();
?>
<script language='JavaScript'>
    alert("ACTUALIZACION DE USUARIO EXITOSA");
    //Mensaje de exito
    window.location = "man_usr.php"
    //redireccionamos
</script>
<?php

}
?>
