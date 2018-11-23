<?php
/**
 * Created by PhpStorm.
 * User: LuchinDows
 * Date: 25/03/14
 * Time: 15:37
 */

/* Replace the data in these two lines with data for your db connection */
$connection = mysql_connect("localhost","root","");
mysql_select_db("sintaxis",$connection);

if(isset($_GET['getClientId'])){
    $res = mysql_query("select dv_p, razon_s from Proveedores where rut_p='".$_GET['getClientId']."'") or die(mysql_error());
    if($inf = mysql_fetch_array($res)){
        echo "formObj.nom_pr.value = '".$inf[1]."';\n";
        echo "formObj.dv.value = '".$inf["0"]."';\n";
        /*
        echo "formObj.address.value = '".$inf["address"]."';\n";
        echo "formObj.zipCode.value = '".$inf["zipCode"]."';\n";
        echo "formObj.city.value = '".$inf["city"]."';\n";
        echo "formObj.country.value = '".$inf["country"]."';\n";
        */
    }else{
        echo "formObj.nom_pr.value = '';\n";
        /*
        echo "formObj.lastname.value = '';\n";
        echo "formObj.address.value = '';\n";
        echo "formObj.zipCode.value = '';\n";
        echo "formObj.city.value = '';\n";
        echo "formObj.country.value = '';\n";
        */
    }
}
?>