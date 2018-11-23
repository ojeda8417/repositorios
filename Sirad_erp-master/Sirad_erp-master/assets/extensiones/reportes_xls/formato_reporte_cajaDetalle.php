<?php
$title = $_POST['title'];
$table_caja = $_POST['table_caja'];

header('Content-type: application/x-msdownload; charset=utf-16');
header('Content-Disposition: attachment; filename=reporte_cajaDetalle_'.date("d-m-Y").'.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>
    <html>
    <head>
    <meta charset="utf-8">
    <style type="text/css">
	<!--
	table{
		width: 100%;
	}
	th{
		background: #e7e6e6;
	}
	#divh3{
		background: #e7e6e6;
		text-align: center;
		width: 100%;
	}
	#resume, #total{
		border: #111 1px solid;
		padding: 10px;
	}
	#resume td.impar, .upbold{
		font-weight: bold; 
		text-transform: uppercase;
	}
	#tcaja{
		border-collapse: collapse;
		text-align: center;
	}
	#tcaja td.head{
		background: #e7e6e6;
	}
	#tcaja th, #tcaja td{
		border: black 1px solid;
	}
	#tcaja td.izquierda{
		text-align: left;
		padding-left: 17px;
	}
	.upbold{
		text-align: right;
	}
	-->
	</style>
	</head>
	<body>
		<div id="divh3">
			<h3><?php echo $title ?></h3>
		</div>
		<br>
		Fecha Emision: <?php echo date('d/m/Y'); ?><br>	
		<?php echo $table_caja ?><br>
		<br>
    </body>
    </html>