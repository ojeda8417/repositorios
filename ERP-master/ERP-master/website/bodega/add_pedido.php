<?php
/**
 * User: Luis Prieto
 * Date: 29-05-14
 * Time: 12:50 AM
 */
$id=$_POST["id_pro"];
$glosa=$_POST["nom_pro"];
$cant=$_POST["id_pro"];

include("../lib/conexion.php");
$Db=Conectarse();
$det_pedido = array('$id1'=>'$id', '$cant2'=>'$cant2');
foreach( $det_pedido as $pedido => $elemento){
    mysql_query("INSERT INTO det_pedido VALUES('$id','$cant')",$Db);
}


?>