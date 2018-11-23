<?php



function region($cod)
{

if($cod==1)
{
$glosa="REGION DE TARAPACA";
}
if($cod==2)
{
$glosa="REGION DE ANTOFAGASTA";
}
if($cod==3)
{
$glosa="REGION DE ATACAMA";
}
if($cod==4)
{
$glosa="REGION DE COQUIMBO";
}
if($cod==5)
{
$glosa="REGION DE VALPARAISO";
}
if($cod==6)
{
$glosa="REGION DEL LIB BERNARDO OHIGGINS";
}
if($cod==7)
{
$glosa="REGION DEL MAULE";
}
if($cod==8)
{
$glosa="REGION DEL BIO-BIO";
}
if($cod==9)
{
$glosa="REGION DE LA ARAUCANIA";
}
if($cod==10)
{
$glosa="REGION DE LOS LAGOS";
}
if($cod==11)
{
$glosa="REGION DE AYSEN";
}
if($cod==12)
{
$glosa="REGION DE MAGALLANES";
}
if($cod==13)
{
$glosa="REGION METROPOLITANA";
}
if($cod==14)
{
$glosa="REGION DE LOS RIOS";
}
if($cod==15)
{
$glosa="REGION DE ARICA Y PARINACOTA";
}

return $glosa;

}
function valida_rut($rut, $dv){
	
// invertimos el rut
$rutin=strrev($rut);

// contamos la cantidad de numero
$cant=strlen($rutin);	

// iniciamos un contador en cero
$c=0;

/* Creamos un contador con valor inicial cero */
while($c<$cant)
{
$r[$c]=substr($rutin,$c,1);
$c++;
}
$ca=count($r);

$m=2;
$c2=0;
$suma=0;


while($c2<$ca)
{
$suma=$suma+($r[$c2]*$m);
if($m==7)
{
$m=2;
}else{
$m++;
}
$c2++;
}
$resto=$suma%11;

$digito=11-$resto;

if($digito==10)
{
$digito=K;
}else{
if($digito==11)
{
$digito=0;
}
}
if($dv==$digito)
{
?>
<script language='javascript'>
//alert("EL RUT ES VALIDO");
</script>
<!--echo 'Valido';-->
<?php
}
else
{
?>
<script language='javascript'>
alert("EL RUT NO ES VALIDO, FAVOR REVISAR");
window.back();

</script>
<?php
exit;

//echo 'No Valido';
}

}
function sucursal($cod)
{
$Db=Conectarse();
$con_suc = mysql_query("SELECT GLOSA_S FROM sucursales WHERE CODIGO_SUC='$cod'",$Db);
if($row=mysql_fetch_array($con_suc))
{
$glosa_suc=$row[0];
}

return $glosa_suc;

}
function familia($cod)
{
$Db=Conectarse();
$con_f = mysql_query("SELECT GLOSA_F FROM familia WHERE CODIGO_F='$cod'",$Db);
if($row=mysql_fetch_array($con_f))
{
$glosa_f=$row[0];
}

return $glosa_f;

}

function sfamilia($cod1)
{
$Db=Conectarse();
$con_sf = mysql_query("SELECT GLOSA_SF FROM subfamilia WHERE CODIGO_SF='$cod1'",$Db);
if($row=mysql_fetch_array($con_sf))
{
$glosa_sf=$row[0];
}
return $glosa_sf;	
	
}
function usuario($cod)
{
$Db=Conectarse();

//echo $rut_usr;
$con_usr = mysql_query("SELECT CODIGO_P FROM usuario WHERE USUARIO='$cod'",$Db);

if($row=mysql_fetch_array($con_usr))
{
$tip_usr=$row[0];
}

$con_p = mysql_query("SELECT GLOSA_P FROM perfiles WHERE CODIGO_P='$tip_usr'",$Db);

if($row=mysql_fetch_array($con_p))
{
$usr_perf=$row[0];
}
return $usr_perf;
}

function estado($val)
{
if($val==0)
{
$est_p="INACTIVO";
}
if($val==1)
{
$est_p="ACTIVO";
}
return $est_p;
}

function tipo_usuario($val)
{
$Db=Conectarse();
$consulta_usuarios=mysql_query("SELECT * FROM usuario ORDER BY USUARIO ASC",$Db);
while ($row=mysql_fetch_array($consulta_prod))
{
if($row[1]==1)
{
$tip_usr="ADMINISTRADOR";
}
if($row[1]==2)
{
$tip_usr="BODEGUERO";
}
if($row[1]==3)
{
$tip_usr="VENDEDOR";
}
if($row[1]==4)
{
$tip_usr="CAJERO";
}
return $tip_usr;
}
}
function medida_($val)
{
$Db=Conectarse();
$consulta_m=mysql_query("SELECT GLOSA_MEDIDA FROM medidas where COD_MEDIDA='$val'",$Db);
if($row=mysql_fetch_array($consulta_m))
{
$glosa_m=$row[0];
}
return $glosa_m;

}
?>