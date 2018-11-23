<?php
$title = $_POST['title'];
$movimientotable = $_POST['movimientotable'];

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
		padding: 8px;
	}
	#divh3{
		background: #111;
		color: #fff;
		padding-right: 15px;
		text-align: right;
		text-transform: uppercase;
		width: 80%;
	}
	#tmovimiento{
		border-collapse: collapse;
		text-align: center;
	}
	#tmovimiento td.head{
		background: #111;
		color: #fff;
		text-transform: uppercase;
	}
	#tmovimiento th, #tmovimiento td{
		border: black 1px solid;
	}
	#tmovimiento td.izquierda{
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
			Fecha Emision: <?php echo date('d/m/Y'); ?><br>
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
			<br>
			<?php echo $movimientotable ?><br>
			<br>
		</div>
    </page>
    <?php 
    $content = ob_get_clean();

    require_once(dirname(__FILE__).'/../html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A4','es');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('reporte_movimiento_'.date("d-m-Y").'.pdf');   
?>