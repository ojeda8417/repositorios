<?php
$title = $_POST['title'];
$table_clientes = $_POST['table_clientes'];
$table_empresa=$_POST['table_empresas'];

ob_start();
?>
    
    <style type="text/css">
	<!--
	table{
		width: 100%;
	}
	th{
		background: #e7e6e6;
	}
	#header{
		width: 100%;
	}
	#logo{		
		width:20%;
		padding: 9px; 
	}
	#divh3{
		background: #111;
		color: #fff;
		padding-right: 15px;
		text-align: right;
		text-transform: uppercase;
		width: 80%;
	}
	#resume, #total{
		border: #111 1px solid;
		padding: 10px;
	}
	#resume td.impar, .upbold{
		font-weight: bold; 
		text-transform: uppercase;
	}
	#tclientes{
		border-collapse: collapse;
		text-align: center;
	}
	#tclientes td.head{
		background: #111;
		color: #fff;
		text-transform: uppercase;
	}
	#tclientes th, #tclientes td{
		border: black 1px solid;
	}
	#tclientes td.izquierda{
		text-align: left;
		padding-left: 17px;
	}
	#tempresa{
		border-collapse: collapse;
		text-align: center;
	}
	#tempresa td.head{
		background: #111;
		color: #fff;
		text-transform: uppercase;
	}
	#tempresa th, #tempresa td{
		border: black 1px solid;
	}
	#tempresa td.izquierda{
		text-align: left;
		padding-left: 17px;
	}
	.upbold{
		text-align: right;
	}
	-->
	</style>
	<page>
		<div style="border: 2px solid #000;padding:5px; height: 98%; width: 98.5%;">
			<table id="header">
				<tr>
					<td id="logo" rowspan="3">
						<img alt="" src="../../img/siradG2.png">
					</td>
				</tr>
				<tr></tr>
				<tr>
					<td style="height: 20px;"></td>
				</tr>
				<tr>
					<td></td>
					<td id="divh3">
						<h3><?php echo $title ?></h3>
					</td>
				</tr>
				<tr>
					<td style="height: 20px;"></td>
				</tr>
			</table>	
				Fecha Emision: <?php echo date('d/m/Y'); ?><br>
			<br>
		Cliente
		<br>	
		<?php echo $table_clientes ?><br>

		Empresa
		<br>
		<?php echo $table_empresa ?><br>
			<br>
		</div>
    </page>
    <?php 
  	$content = ob_get_clean();

    require_once(dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A4','es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('reporte_clientes_'.date("d-m-Y").'.pdf');
?>