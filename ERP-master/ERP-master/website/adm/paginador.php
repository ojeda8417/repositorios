<link href="menu.css" rel="stylesheet" type="text/css" />
<?php
require('conexion.php');

$RegistrosAMostrar=10;

//estos valores los recibo por GET
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
	
}
echo "<table border='0px' id='gradient-style'>";
echo "<tr>";
	echo "<th>Fecha</th>";
	echo "<th>Valor</th>";
	echo "</tr>";
$Resultado=mysql_query("SELECT * FROM uf ORDER BY fecha LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$con);

while($MostrarFila=mysql_fetch_array($Resultado)){
	echo "<tr>";
	echo "<td>".$MostrarFila[0]."</td>";
	echo "<td>".$MostrarFila[1]."</td>";
	//echo "<td>".$MostrarFila['sueldo']."</td>";
	echo "</tr>";
}
echo "</table>";
//******--------determinar las páginas---------******//

$NroRegistros=mysql_num_rows(mysql_query("SELECT * FROM uf",$con));

$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevará decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
echo "<a onclick=\"Pagina('1')\">Primero</a> ";
if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\">Anterior</a> ";
echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">Siguiente</a> ";
echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
?>
